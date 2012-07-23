<?php 

/**
 * Wrapper for the tab pages {@link EBootstrapTabContent}
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.widgets.tabs
 */
class EBootstrapTabContentWrapper extends EBootstrapWidget {
	/**
	 * Render header
	 */
	public function init() {
		parent::init();
		
		EBootstrap::mergeClass($this->htmlOptions, array('tab-content'));
		
		echo EBootstrap::openTag('div', $this->htmlOptions);
	}
	
	/**
	 * Render footer
	 */
	public function run() {
		parent::run();
		
		echo EBootstrap::closeTag('div');
	}
}

?>