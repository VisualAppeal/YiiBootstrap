<?php 

/**
 * Triggers a {link @EBootstrapModal}
 * http://twitter.github.com/bootstrap/javascript.html#modals
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.7
 * @package bootstrap.widgets
 */
class EBootstrapModalTrigger extends EBootstrapWidget {
	/**
	 * Kind of HTML element
	 */
	public $element = 'a';
	
	/**
	 * Value of the HTML element
	 */
	public $value = 'Show Modal';
	
	/**
	 * Use a custom HTML trigger, if it's set to false, the element/value is used
	 */
	public $html = false;
	
	/**
	 * ID of EBootstrapModal
	 */
	public $modal = '#';
	
	/**
	 * Init widget
	 */
	public function init() {
		parent::init();
		
		if ($this->html === false) {
			$this->htmlOptions['data-toggle'] = 'modal';
			$this->htmlOptions['href'] = '#'.$this->modal;
		}
	}
	
	/**
	 * Render trigger
	 */
	public function run() {
		parent::run();
		
		if ($this->html === false) {
			echo EBootstrap::tag($this->element, $this->htmlOptions, $this->value);
		}
		else {
			echo $this->html;
		}
	}
}

?>