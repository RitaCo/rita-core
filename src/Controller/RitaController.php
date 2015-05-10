<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace Rita\Core\Controller;

use Cake\Controller\Controller as CakeController;
use Cake\Core\Plugin;
use Cake\Event\Event;
use Cake\Event\EventListenerInterface;
use Cake\Event\EventManagerTrait;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class RitaController extends CakeController
{

    
    
    
    public $helpers = [
        'Rita/Tools.Form',
        'Rita/Tools.Html',
        'Rita/Tools.Flash',
        'Rita/Tools.Paginator',
        'Rita/Core.Rita',
        'Time',
        'Text'
    ];
    
    
    
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
         parent::initialize();
        $this->loadComponent('RequestHandler');
        
        $this->loadComponent('Rita/Tools.Flash');
        
        $this->loadComponent('Cookie');
        
        if( Plugin::loaded('Rita/Users')) {
            $this->loadComponent('Rita/Users.User');    
        }
        
        
        
        
         //$this->layout = $this->request->param('prefix');
        

        if (in_array($this->request->param('prefix'), ['admin', 'client'])) {
            $this->theme = 'Rita/Core';
        }

    }
    
    
 
    /**
    * AppController::isAuthorized()
    *
    * @param mixed $user
    * @return
    */
    public function isAuthorized($user = null)
    {
        return $this->User->isAuthorized($user);     
    }
      
      
      
     /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
     

}
