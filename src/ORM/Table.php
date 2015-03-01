<?php
namespace Rita\Core\ORM;

use Cake\ORM\Table as CakeTable;
use Cake\Log\LogTrait;
use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Cake\Event\EventManager;
use Cake\ORM\Query;
use \ArrayObject;

\Cake\Database\Type::map('json', 'Rita\Tools\Database\Type\JsonType');

class Table extends CakeTable
{
  use LogTrait;    
    
    /**
     * Table::__construct()
     * 
     * @param mixed $config
     * @return void
     */
    public function __construct(array $config = [])
    {
        parent::__construct($config);
        $this->ritaInitialize($config);
    }

	/**
	 * Table::ritaInitialize()
	 * 
	 * @param mixed $config
	 * @return void
	 */
	private function ritaInitialize(array $config)
    {
        
        if ($this->hasField('created') || $this->hasField('modified')) {
			$this->addBehavior('Timestamp');
		}
        $this->addBehavior('Rita/Tools.Persian');
          
    }
    
	/**
	 * Return the next auto increment id from the current table
	 * UUIDs will return false
	 *
	 * @return int|bool next auto increment value or False on failure
	 */
	public function getNextAutoIncrement() {
		$query = "SHOW TABLE STATUS WHERE name = '" . $this->table() . "'";
		$statement = $this->_connection->execute($query);
		$result = $statement->fetch();
		if (!isset($result[10])) {
			return false;
		}
		return (int)$result[10];
	}    
    
	/**
	 * truncate()
	 *
	 * @return void
	 */
	public function truncate() {
		$sql = $this->schema()->truncateSql($this->_connection);
		foreach ($sql as $snippet) {
			$this->_connection->execute($snippet);
		}
	}
    
    
    
    /**
     * Table::isOwnedBy()
     * 
     * @param mixed $entityId
     * @param mixed $userId
     * @return
     */
    public function isOwnedBy($entityId, $userId)
    {
        return $this->exists(['id' => $entityId, 'user_id' => $userId]);
    }
    
    public function	beforeFind(Event $event, Query $query, ArrayObject $options, $primary) 
    {
        if ($primary === false) {
            return $query;
        }
        
        
        if ($this->hasField('user_id') ){
            $query->where(['user_id' => \Rita::$user['id']]);
            \Cake\Log\Log::debug([(int)$primary, $options]);    
        }    
        
        
        return $query;
    }    
}