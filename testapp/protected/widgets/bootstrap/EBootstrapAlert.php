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
	
	/* Display the message as a block with actions */
	public $block = false;
	
	public $htmlOptions = array();
	
	public $jsFile = null;
	
	public function init() {
		parent::init();
		
		Yii::app()->clientScript->registerCoreScript('jquery');
		if (is_null($this->jsFile)) {
			$jsFile = dirname(__FILE__).'/js/bootstrap.min.js';
			$this->jsFile = Yii::app()->getAssetManager()->publish($jsFile);
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
	}
	
	public function run() {
		parent::run();
		
		EBootstrap::mergeClass($this->htmlOptions, array('alert', 'fade', 'in'));
		switch ($this->type) {
			case 'error':
			case 'success':
			case 'info':
				EBootstrap::mergeClass($this->htmlOptions, array('alert-'.$this->type));
				break;
		}
		
		if ($this->block)
			EBootstrap::mergeClass($this->htmlOptions, array('alert-block'));
		
		echo EBootstrap::openTag('div', $this->htmlOptions);
		echo EBootstrap::tag('a', array('href' => '#', 'class' => 'close', 'data-dismiss' => 'alert'), "&times;");
		
		if ($this->block)
			echo $this->message;
		else
			echo EBootstrap::tag('p', array(), $this->message);
			
		echo EBootstrap::closeTag('div');
		
	}
}

?>