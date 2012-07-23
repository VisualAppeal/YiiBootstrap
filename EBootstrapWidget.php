<?php 

/**
 * Base widget
 *
 * This is the parent widget of all bootstrap widgets.
 * It provides some basic functionallity like the collapse option
 * 
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package widgets.bootstrap
 */
class EBootstrapWidget extends CWidget {
	/**
	 * Collapse the widget
	 */
	public $collapse = false;
	
	/**
	 * Show the widget per default
	 *
	 * If it's set to true the widget is per default open
	 */
	public $collapseShow = false;
	
	/**
	 * Default HTML options
	 */
	public $htmlOptions = array();
	
	/**
	 * Javascript file to include for the collapse plugin
	 *
	 * If its set to false, no file will be included
	 */
	public $collapseJsFile = null;
	
	/**
	 * Init the widget
	 */
	public function init() {
		parent::init();
		
		if ($this->collapse) {
			EBootstrap::mergeClass($this->htmlOptions, array('collapse'));
			if ($this->collapseShow)
				EBootstrap::mergeClass($this->htmlOptions, array('in'));
			
			if (is_null($this->collapseJsFile)) {
				$collapseJsFile = dirname(__FILE__).'/js/bootstrap.min.js';
				$this->collapseJsFile = Yii::app()->getAssetManager()->publish($collapseJsFile);
				Yii::app()->clientScript->registerScriptFile($this->collapseJsFile);
			}
			elseif ($this->collapseJsFile !== false) {
				Yii::app()->clientScript->registerScriptFile($this->collapseJsFile);
			}
		}
	}
}

?>