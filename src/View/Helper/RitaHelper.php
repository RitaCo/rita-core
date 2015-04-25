<?php
namespace Rita\Core\View\Helper;

use Cake\View\Helper;
use Cake\Utility\Hash;
use Cake\Core\Plugin;
use Cake\Cache\Cache;
use Cake\Log\Log;
use Rita\Core\View\View;

class RitaHelper extends Helper
{

    
    public $helpers = array('Html');

    protected $_assets = [];

    protected $pageTitle = [];
    protected $pageDescription;
    protected $pageKeyWord;
    
    protected $pageCaption = [];
    protected $pageNote;
    
    private $_prefix;



    /**
     * RitaHelper::__construct()
     * 
     * @param mixed $View
     * @param mixed $config
     * @return void
     */
    public function __construct(View $View, array $config = [])
    {
        parent::__construct($View,$config);
        $this->_prefix = $this->request->param('prefix');
        
        switch($this->_prefix) {
            case 'front':
                    $this->pageCaption[] = __d('rita/core','home');
                break;
            default:
                $this->pageCaption[] = __d('rita/core','dashboard');
        }        

    }

    
    /**
     * RitaHelper::fetchSetting()
     *
     * @return
     */
    protected function fetchSetting()
    {
        
        if (($settings = Cache::read('assets', 'rita')) === false) {
            $settings = $files = [];
            $files[] = CONFIG . 'assets.php';

            foreach (Plugin::loaded() as $plugin) {
                $files[] = Plugin::path($plugin) . 'config' . DS . 'assets.php';
            }

            foreach ($files as $file) {
                if (!file_exists($file)) {
                    continue;
                }
                $temp = require ($file);
                if (is_array($temp)) {
                    $settings[] = $temp;
                }
            }
            
            Cache::write('assets', $settings, 'rita');
        }
        
        return $settings;
    }


    /**
     * RitaHelper::loadingJS()
     *
     * @param bool $scope
     * @return
     */
    public function loadingJS($scope = false)
    {
        $assets = \Cake\Core\Configure::read('assets');
        
        if (!$scope) {
            $scope = ($this->request->param('prefix')) ? $this->request->param('prefix') : 'front';
        }
        
        $all = $this->fetchSetting();
        $css = Hash::extract($all, '{n}.js.base.{n}');
        $css = array_merge($css, Hash::extract($all, "{n}.js.{$scope}.{n}"));
  
        return $this->Html->script($css,['crossorigin'=> 'anonymous']);
    }



    /**
     * RitaHelper::css()
     *
     * @param bool $scope
     * @return
     */
    public function loadingCSS($scope = false)
    {
        $assets = \Cake\Core\Configure::read('assets');
        
        if (!$scope) {
            $scope = ($this->request->param('prefix')) ? $this->request->param('prefix') : 'front';
        }
        
        $all = $this->fetchSetting();
        $css = Hash::extract($all, '{n}.css.base.{n}');
        $css = array_merge($css, Hash::extract($all, "{n}.css.{$scope}.{n}"));

        return $this->Html->css($css,['crossorigin'=> 'anonymous']);
    }


  
    /**
     * RitaHelper::getCrumbList()
     *
     * @param mixed $options
     * @param bool $startText
     * @return void
     */
    public function getCrumbList($options = array(), $startText = false)
    {
        $panel = $this->request->param('panel');
        $controller = $this->request->param('controller');
            
        $isEmpty = empty($this->Html->_crumbs);
        if ($panel && $controller !== 'doshboards') {
            if ($panel == 'rita') {
                $this->Html->firstCrumb('پنل ریتا', 'cp.'.$panel);
            }
            if ($panel == 'services') {
                $this->Html->firstCrumb('پنل سرویس ها', 'cp.'.$panel);
            }
        }
        if ($isEmpty) {
            $plugin = $this->request->param('plugin');
                
            $titlePlugin = $this->getView()->getVar('titlePlugin');
            if (!empty($titlePlugin)) {
                $this->Html->addCrumb($titlePlugin, array('plugin' => $plugin, 'controller' => $plugin));
            }

            $titleController = $this->getView()->getVar('titleController');
            if (!empty($titleController)) {
                $this->Html->addCrumb($titleController, array('plugin' => $plugin, 'controller' => $controller ,'action' => 'index'));
            }
                
            $titleAction = $this->getView()->getVar('titleAction');
            if (!empty($titleAction)) {
                $this->Html->addCrumb($titleAction);
            }
            unset($titleAction, $titleController, $titlePlugin, $controller, $plugin, $panel);
        }
        return $this->Html->getCrumbList(array('separator'=>'<span>/</span>'), array('text' => 'مدیریت','url'=>'doshboard'));
    }




  


    /**
     * RitaHelper::pageDescription()
     * 
     * @param string $text
     * @return
     */
    public function pageDescription($text = '')
    {
        $text = $this->_View->fetch('description', $text);
        
        return $this->Html->meta('description', $text);
    }


    /**
     * RitaHelper::metaKeywords()
     * 
     * @return
     */
    public function pageKeywords()
    {
        $defKeywords = func_get_args();
        
        $keywords =  $this->_View->get('keywords');
        
        if(empty($keywords)){
            $keywords = [];
        }
        
        if (is_string($keywords)) {
            $keywords = explode(',',$keywords);
        }
        
        $keywords = array_merge($keywords,$defKeywords);
        $keywords = implode(', ', $keywords);
        return $this->Html->meta('keywords', $keywords);    
        
    }



    /**
     * RitaHelper::action()
     *
     * @param mixed $action
     * @param mixed $options
     * @return void
     */
    public function action($action, $options = array())
    {

        if (is_string($action)) {
            $action = RitaConfig::read('Utility.Actions.'.$action);
            if (!empty($options)) {
                $action= Hash::merge($action, $options);
            }
        }
        extract($action);
        $View = $this->_View;
        $title = $this->Html->image($options['icon']);
        unset($options['icon']);
        $options['escape'] = false;
        $options['class'] = 'action ';
        $link = $this->Html->link($title, $url, $options, $confirmMessage);

        $View->prepend('ViewActions', $link);
    }
    
    
    public function beforeRender($viewFile)
    {
        
        $this->_View->Paginator->options(array(
    //	    'update' => '.layout-content-wrapper',
       //  'model' => 'Language',
     //    'evalScripts' => true,
//			'url' => RitaRouter::getParams(true)
        ));
    }
    
    /**
     * RitaHelper::setPageTitle()
     * 
     * @param mixed $text
     * @return
     */
    public function setPageTitle($text)
    {
        $this->pageTitle[] = $text;
        if($text === '-') {
            $this->pageTitle = [];     
        }
        return $this;
    }


    /**
     * RitaHelper::getPageTitle()
     * 
     * @param mixed $siteTitle
     * @return
     */
    public function getPageTitle($siteTitle = null)
    {
        $title = null;
       
        $title = implode(': ',$this->pageTitle);
                  
        if(!empty($siteTitle) && !empty($title)) {
            $title =  $siteTitle . ' | '.$title ;
        } else {
            $title = $siteTitle;
        }
        
        return '<title>'.$title . '</title>';
    }    
        
    /**
     * RitaHelper::setCaption()
     * 
     * @param mixed $text
     * @return
     */
    public function setPageCaption($text)
    {
        $this->pageCaption[] = $text;
        if( $this->_prefix !== 'front') {
            $this->setPageTitle($text);
        }
        return $this;
    }

    /**
     * RitaHelper::getCaption()
     * 
     * @return
     */
    public function getPageCaption()
    {
        return implode(' / ',$this->pageCaption);
    }
    
    
    /**
     * RitaHelper::setNote()
     * 
     * @param mixed $text
     * @return
     */
    public function setPageNote($text)
    {
        $this->pageNote = $text;
        return $this;
    }
    
    /**
     * RitaHelper::setNote()
     * 
     * @param mixed $text
     * @return
     */
    public function getPageNote()
    {
        return $this->pageNote;
        
    }            
}
