<?php
namespace Rita\Core\ORM;

use Cake\ORM\Table as CakeTable;

//use Cake\Database\Schema\Table as Schema;

\Cake\Database\Type::map('json', 'Rita\Tools\Database\Type\JsonType');

class Table extends CakeTable
{
    
    
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
}