<?php

namespace Rita\Core\View;


use Cake\Cache\Cache;
use Cake\Core\App;
use Cake\Core\Plugin;
use Cake\Event\EventManager;
use Cake\Event\EventManagerTrait;
use Cake\Log\LogTrait;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\Routing\RequestActionTrait;
use Cake\Routing\Router;
use Cake\Utility\Inflector;
use Cake\View\CellTrait;
use Cake\View\View as CakeView;
use Cake\View\ViewVarsTrait;

use InvalidArgumentException;
use LogicException;
use RuntimeException;

class View extends CakeView
{




    public function __construct(Request $request = null, Response $response = null, EventManager $eventManager = null, array $viewOptions = []) {
        

        parent::__construct($request, $response, $eventManager, $viewOptions);
        
    }
    
    
 
    
    
    /**
     * View::getLayoutID()
     * 
     * @return
     */
    public function getLayoutID(){
        $out = '';
        extract($this->request->params);  
        
        if ($prefix) {
            $out  .= ucfirst($prefix).'-' ; 
        }

        if ($plugin) {
            $out  .= ucfirst($plugin) ; 
        }

        $out .= ucfirst($controller);
        $out .= ucfirst($action);
        
        return  $out;
    }
}