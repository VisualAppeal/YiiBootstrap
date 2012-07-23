<?php 

/**
 * Wrapper for {@link EBootstrapTabNavigation} and {@link EBootstrapTabContentWrapper}
 * This widget is used only if the navigation should not be positioned at the top
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.widgets.tabs
 */
class EBootstrapTabWrapper extends EBootstrapWidget {
	/**
	 * Position of the navigation
	 *
	 * Possible values: bottom|left|right
	 * Default: top
	 */
	public $position = '';
	
	/**
	 * Init widget
	 */
	public function init() {
		parent::init();
		
		if (!empty($this->position)) {
			switch ($this->position) {
				case 'bottom':
					echo EBootstrap::openTag('div', array('class' => 'tabbable tabs-below'));
					break;
				case 'left':
					echo EBootstrap::openTag('div', array('class' => 'tabbable tabs-left'));
					break;
				case 'right':
					echo EBootstrap::openTag('div', array('class' => 'tabbable tabs-right'));
					break;
			}
		}
	}
	
	/**
	 * Render footer
	 */
	public function run() {
		parent::run();
		
		if (!empty($this->position)) {
			echo EBootstrap::closeTag('div');
		}
	}
}


?>