<?php

class EBootstrapTabContent extends CWidget {
	public $id = null;
	public $active = false;
	
	public $htmlOptions = array();
	
	public function init() {
		parent::init();
		
		EBootstrap::mergeClass($this->htmlOptions, array('tab-pane'));
		if ($this->active) {
			EBootstrap::mergeClass($this->htmlOptions, array('active'));
		}
		
		$this->htmlOptions['id'] = (is_null($this->id)) ? 'test' : $this->id;
		echo CHtml::openTag('div', $this->htmlOptions);
	}
	
	public function run() {
		parent::run();
		
		echo CHtml::closeTag('div');
	}
}

?>