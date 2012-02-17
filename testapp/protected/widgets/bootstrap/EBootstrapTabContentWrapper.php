<?php 

class EBootstrapTabContentWrapper extends CWidget {
	public function init() {
		parent::init();
		
		echo CHtml::openTag('div', array('class' => 'tab-content'));
	}
	
	public function run() {
		parent::run();
		
		echo CHtml::closeTag('div');
	}
}

?>