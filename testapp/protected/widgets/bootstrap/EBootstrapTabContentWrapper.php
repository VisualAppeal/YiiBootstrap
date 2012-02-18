<?php 

class EBootstrapTabContentWrapper extends CWidget {
	public function init() {
		parent::init();
		
		echo EBootstrap::openTag('div', array('class' => 'tab-content'));
	}
	
	public function run() {
		parent::run();
		
		echo EBootstrap::closeTag('div');
	}
}

?>