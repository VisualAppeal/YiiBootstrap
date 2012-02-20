<?php 

/*
 * Wrapper for the tab pages {@link EBootstrapTabContent}
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.widgets.tabs
 */
class EBootstrapTabContentWrapper extends CWidget {
	/*
	 * Render header
	 */
	public function init() {
		parent::init();
		
		echo EBootstrap::openTag('div', array('class' => 'tab-content'));
	}
	
	/*
	 * Render footer
	 */
	public function run() {
		parent::run();
		
		echo EBootstrap::closeTag('div');
	}
}

?>