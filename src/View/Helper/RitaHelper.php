<?php
namespace Rita\View\Helper;

use Cake\View\Helper;
use \Cake\Utility\Hash;
class RitaHelper extends Helper {

	
	public $helpers = array('Html');

	protected $_assets = [];




	/**
	 * RitaHelper::script()
	 * lt => Layout Top
	 * lb => Layout Bottom
	 * ct => Content Top
	 * cb => Content Bottom 
	 * @param string $type lt,lb,ct,cb 
	 * @return void
	 */
	public function includeJS($type){
		$key = RitaRouter::currentStation() . '.script.' .$type;
		$lists = Hash::get($this->_assets, $key);
		 return $this->Html->script($lists,array('once' => true));
		 
	}


	/**
	 * RitaHelper::includeCSS()
	 * lt => Layout Top
	 * lb => Layout Bottom
	 * ct => Content Top
	 * cb => Content Bottom 
	 * @param string $type lt,lb,ct,cb 
	 * @return void
	 */
	public function css($scope = false){
		$assets = \Cake\Core\Configure::read('assets');
		if(!$scope) {
			$scope = ($this->request->param('prefix')) ? $this->request->param('prefix') : 'front';
		}
		$css = [];
	

		foreach(['base', $scope] as $val ) {
			
			if(!isset($assets[$val])) {
				continue;
			}
			
//		if(if($assets[$val])){
//			$scope = $assets[$scope]; 	
//		}			
//			pr($val);
//			if($val === null){
//				continue;
//			}
//			if(is_string($val)){
//				$val =[$val];
//			}
//			$css = array_m($css, $val);
		}
	//	unset($root,$scope,$prefix,$assets);
		pr($assets);
		exit();
		 return; 		
	}


	/**
	 * RitaHelper::pageTitle()
	 * 
	 * @param mixed $title
	 * @return
	 */
	public function pageTitle($title = null ) {
		
		$title = ($title !== null)? $title : RitaConfig::read('Meta.title');

    		$titleVars = array('titlePlugin', 'titleController', 'titleAction' );
    		$temp = array();
		    $View = $this->_View;
		    foreach($titleVars as $val){
		    	if(is_string($View->get($val)) ){
		    		$temp[] = $View->get($val);	
		    	}
		    	 
		    }
	    $temp = implode(' > ', $temp);
		
    	return $title  . ' | ' . $temp;
 	 }
  
  
/**
 * RitaHelper::getCrumbList()
 * 
 * @param mixed $options
 * @param bool $startText
 * @return void
 */
	public function getCrumbList($options = array(), $startText = false) {
			$panel = $this->request->param('panel');
			$controller = $this->request->param('controller');
			
			$isEmpty = empty($this->Html->_crumbs); 
			if($panel && $controller !== 'doshboards') {
				if($panel == 'rita'){
					$this->Html->firstCrumb('پنل ریتا','cp.'.$panel);
				}
				if($panel == 'services'){
					$this->Html->firstCrumb('پنل سرویس ها','cp.'.$panel);
				}
			}
			if($isEmpty) {
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
 * RitaHelper::metaDescription()
 * 
 * @return
 */
	public function metaDescription() {
		return Configure::read('Rita.Site.description');	
	}

/**
 * RitaHelper::metaKeywords()
 * 
 * @return
 */
	public function metaKeywords() {
		return Configure::read('Rita.Site.description');	
	}



	/**
	 * RitaHelper::action()
	 * 
	 * @param mixed $action
	 * @param mixed $options
	 * @return void
	 */
	public function action( $action,$options = array() ){

		if (is_string($action)){
			$action = RitaConfig::read('Utility.Actions.'.$action);
			if (!empty($options)) {
				$action= Hash::merge($action,$options);
			}
		}
		extract($action);
		$View = $this->_View;
		$title = $this->Html->image($options['icon']);
		unset($options['icon']);
		$options['escape'] = false;
		$options['class'] = 'action ';
		$link = $this->Html->link($title,$url,$options,$confirmMessage);

		$View->prepend('ViewActions',$link);
	}
	
	
	public function beforeRender($viewFile){
		
		$this->_View->Paginator->options(array(
	//	    'update' => '.layout-content-wrapper',
		  //  'model' => 'Language',
		//    'evalScripts' => true,
//			'url' => RitaRouter::getParams(true)
		));	
	} 
	
    
}
