<?php
namespace Rita\View\Cell;

use Cake\View\Cell;
use Cake\Event\Event;

/**
 * Navigator cell
 */
class NavigatorCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];


    /**
     * Default display method.
     *
     * @return void
     */
    public function display()
    {
            
        $menu = [
        'label' => 'داشبورد',
        'link' => '/admin',
        'icon' => 'icon-homealt'
        ]+$this->fetchItems('admin');
        
          $this->set('items', $menu);
    }
    
    

    /**
     * NavigatorCell::fetchItems()
     *
     * @param mixed $name
     * @return void
     */
    private function fetchItems($name)
    {

        $event = new Event("Navigator.{$name}", $this, []);
        $this->eventManager()->dispatch($event);
        
        return $event->data;
    }
}
