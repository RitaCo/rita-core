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

use Cake\Event\Event;
use Cake\Controller\Controller as CakeController;
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
class Controller extends CakeController
{

    
    
    
    public $helpers = [
        'Rita/Tools.Form',
        'Rita/Tools.Html',
        'Rita/Tools.Flash',
        'Rita/Tools.Paginator',
        'Rita/Core.Rita',
        'Session',
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
        $this->loadComponent('Rita/Tools.Flash');
        $this->loadComponent('Rita/Users.User');
        $this->loadComponent('Auth', [
            'authorize' => ['Controller'],
             'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'email', 'password' => 'password'],
                    'contain' => ['Profiles'],
                    'userModel' => 'Rita/Users.Users'
                    
                ]
            ],
             'loginAction' => [
                'prefix'=> false,
                'controller' => 'Users',
                'action' => 'login',
                'plugin' => 'Rita/Users'
            ],
            'authError' => 'دسترسی برای شما مقدور نمی‌باشد',
            'loginRedirect' => '/client',
            'logoutRedirect' => '/'
        ]);

        if ($this->request->param('prefix') == 'admin') {
            $this->theme = 'Rita/Core';
            $this->layout = 'admin';
        }

        if ($this->request->param('prefix') == 'client') {
            $this->theme = 'Rita/Core';
            $this->layout = 'client';
        }
        

    }
    
    
    /**
     * AppController::beforeFilter()
     *
     * @param mixed $event
     * @return void
     */

    
      /**
       * AppController::isAuthorized()
       *
       * @param mixed $user
       * @return
       */
      public function isAuthorized($user = null)
      {
        $isAdmin = ($user['role_id'] === 1) ?  true : false;
        // Any registered user can access public functions
        $prefix = $this->request->param('prefix');

        // Only admins can access admin functions
        if ( $prefix === 'admin' and $isAdmin) {
            return true;
        }
        if ($prefix === 'client' and $isAdmin) {
            //$this->Flash->error('ادمین نمی‌تواند به سطح اعضا دسترسی پیدا کند.');
            //return $this->redirect('/admin/');
            
        }

        if (in_array($user['role_id'], [1,3]) and $prefix === 'client') {
            return true;
        }
        // Default deny
        return false;
      }
}
