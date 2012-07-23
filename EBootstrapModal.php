<?php 

/**
 * Shows a modal popup
 * http://twitter.github.com/bootstrap/javascript.html#modals
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.7
 * @package bootstrap.widgets
 */
class EBootstrapModal extends EBootstrapWidget {
	/**
	 * Javascript file to hide the alert.
	 *
	 * If its set to false, no file will be included
	 */
	public $jsFile = null;
	
	/**
	 * Includes backdrop
	 */
	public $backdrop = true;
	
	/**
	 * Close modal with ESC key
	 */
	public $keyboard = true;
	
	/**
	 * Show the modal on startup
	 */
	public $show = true;
	
	/**
	 * Header
	 */
	public $header = '';
	
	/**
	 * Footer
	 */
	public $footer = array();
	
	/**
	 * Close value
	 */
	public $close = "&times;";
	
	/**
	 * Fade in effect
	 */
	public $fade = true;
	
	/**
	 * Init the widget and render header
	 */
	public function init() {
		parent::init();
		
		if (!isset($this->htmlOptions['id']))
			$this->htmlOptions['id'] = $this->getId();
		
		EBootstrap::mergeClass($this->htmlOptions, array('modal'));
		if (!$this->show)
			EBootstrap::mergeClass($this->htmlOptions, array('hide'));
		if ($this->fade)
			EBootstrap::mergeClass($this->htmlOptions, array('fade'));
		
		Yii::app()->clientScript->registerCoreScript('jquery');
		if (is_null($this->jsFile)) {
			$jsFile = dirname(__FILE__).'/js/bootstrap.min.js';
			$this->jsFile = Yii::app()->getAssetManager()->publish($jsFile);
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
		elseif ($this->jsFile !== false) {
			Yii::app()->clientScript->registerScriptFile($this->jsFile);
		}
		
		$backdrop = ($this->backdrop) ? 'true' : 'false';
		$keyboard = ($this->keyboard) ? 'true' : 'false';
		$show = ($this->show) ? 'true' : 'false';
		
		Yii::app()->clientScript->registerScript('ebootstrap-model-'.$this->htmlOptions['id'], '
		$("#'.$this->htmlOptions['id'].'").modal({
			backdrop: '.$backdrop.',
			keyboard: '.$keyboard.',
			show: '.$show.',
		});
		', CClientScript::POS_READY);
		
		echo EBootstrap::openTag('div', $this->htmlOptions);
		
		echo EBootstrap::openTag('div', array('class' => 'modal-header'));
		echo EBootstrap::tag('a', array('class' => 'close', 'data-dismiss' => 'modal', 'href' => '#'), $this->close);
		echo EBootstrap::tag('h3', array(), $this->header);
		echo EBootstrap::closeTag('div');
		
		echo EBootstrap::openTag('div', array('class' => 'modal-body'));
	}
	
	/**
	 * Render footer
	 */
	public function run() {
		parent::run();
		
		echo EBootstrap::closeTag('div');
		
		echo EBootstrap::openTag('div', array('class' => 'modal-footer'));
		foreach ($this->footer as $action) {
			echo $action." \n";
		}
		echo EBootstrap::closeTag('div');
			
		echo EBootstrap::closeTag('div');
		
	}
}

?>