<?php
namespace Rita\Core\Controller\Admin;

use Rita\Core\Controller\AppController;
use Cake\Event\Event;

class DashboardController extends AppController
{
    
     

    public function beforeFilter(Event $event)
    {
          parent::beforeFilter($event);  
    }

    
    public function welcome()
    {
        
    }
}
