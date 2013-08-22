<?php 

/**
 * Render an alert
 * http://twitter.github.com/bootstrap/javascript.html#alerts
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 1.0.0
 * @package bootstrap.widgets
 */
class EBootstrapAlert extends EBootstrapWidget {
	/**
	 * Type of the alert
	 *
	 * Values: warning|danger|success|info
	 */
	public $type = '';
	
	/**
	 * Message to render
	 */
	public $message = '';
	
	/** 
	 * Display the message as a block with actions 
	 */
	public $block = false;
	
	/**
	 * Javascript file to hide the alert.
	 *
	 * If its set to false, no file will be included
	 */
	public $jsFile = null;
	
	/**
	 * User can close the alert
	 */
	public $canClose = true;
	
	/**
	 * Init the widget
	 */
	public function init() {
		parent::init();
		
		Yii::app()->clientScript->registerCoreScript('jquery');
		if (is_null($this->jsFile)) {
			$jsFile = dirname(__FILE__).'/js/bootstrap.min.js';
			$this->jsFile = Yii::app()->getAssetManager()->publish($jsFile);
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
		elseif ($this->jsFile !== false) {
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
	}
	
	/**
	 * Render alert
	 */
	public function run() {
		parent::run();

		if ($this->type == 'error')
			$this->type = 'danger';
		
		EBootstrap::mergeClass($this->htmlOptions, array('alert', 'alert-dismissable', 'fade', 'in'));
		EBootstrap::mergeClass($this->htmlOptions, array('alert-' . $this->type));
		
		echo EBootstrap::openTag('div', $this->htmlOptions);
		
		if ($this->canClose)
			echo EBootstrap::tag('button', array('type' => 'button', 'class' => 'close', 'data-dismiss' => 'alert', 'aria-hidden' => 'true'), "&times;");
		
		if ($this->block)
			echo $this->message;
		else
			echo EBootstrap::tag('span', array(), $this->message);
			
		echo EBootstrap::closeTag('div');
		
	}
}

?>