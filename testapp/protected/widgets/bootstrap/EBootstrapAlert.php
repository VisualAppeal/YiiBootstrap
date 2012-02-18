<?php 

/*
 * Type of alerts:
 *
 * warning = default
 * error
 * success
 * info
 */
class EBootstrapAlert extends CWidget {
	public $type = '';
	public $message = '';
	public $animation = 'slow';
	
	public $htmlOptions = array();
	
	public $jsFile = null;
	
	public function init() {
		parent::init();
		
		if (is_null($this->jsFile)) {
			$jsFile = dirname(__FILE__).'/js/bootstrap-alert.js';
			$this->jsFile = Yii::app()->getAssetManager()->publish($jsFile);
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
	}
	
	public function run() {
		parent::run();
		
		EBootstrap::mergeClass($this->htmlOptions, array('alert'));
		switch ($this->type) {
			case 'error':
			case 'success':
			case 'info':
				EBootstrap::mergeClass($this->htmlOptions, array('alert-'.$this->type));
				break;
		}
		
		echo EBootstrap::openTag('div', $this->htmlOptions);
		echo EBootstrap::tag('a', array('class' => 'close', 'data-dismiss' => 'alert'), '×');
		echo EBootstrap::tag('p', array(), $this->message);
		echo EBootstrap::closeTag('div');
		
	}
}

?>