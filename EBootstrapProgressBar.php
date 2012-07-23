<?php 

/**
 * Render a progress bar
 * http://twitter.github.com/bootstrap/components.html#progress
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.5
 * @package bootstrap.widgets
 */
class EBootstrapProgressBar extends EBootstrapWidget {
	/**
	 * Type of the progress bar
	 *
	 * Possible values: info|success|danger
	 *
	 * Default: info
	 */
	public $type = 'info';
	
	/**
	 * Striped progress bar
	 */
	public $striped = true;
	
	/**
	 * Animated
	 */
	public $active = false;
	
	/**
	 * Width in %
	 */
	public $width = 0;
	
	/**
	 * Init the widget
	 */
	public function init() {
		parent::init();
		
		EBootstrap::mergeClass($this->htmlOptions, array('progress', 'progress-'.$this->type));
		if ($this->striped)
			EBootstrap::mergeClass($this->htmlOptions, array('progress-striped'));
		if ($this->active)
			EBootstrap::mergeClass($this->htmlOptions, array('active'));
	}
	
	/**
	 * Render progress bar
	 */
	public function run() {
		parent::run();
		
		echo EBootstrap::openTag('div', $this->htmlOptions);
		echo EBootstrap::openTag('div', array('class' => 'bar', 'style' => 'width: '.$this->width.'%;'));
		echo EBootstrap::closeTag('div');
		echo EBootstrap::closeTag('div');
	}
}

?>