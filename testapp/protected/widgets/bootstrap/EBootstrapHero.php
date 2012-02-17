<?php 

class EBootstrapHero extends CWidget {
	public $headline = '';
	public $body = '';
	public $actions = array();
	
	public $htmlOptions = array();
	
	public function init() {
		parent::init();
	}
	
	public function run() {
		parent::run();
		
		EBootstrap::mergeClass($this->htmlOptions, array('hero-unit'));
		echo CHtml::openTag('div', $this->htmlOptions)."\n";

		echo CHtml::tag('h1', array(), $this->headline)."\n";
		echo CHtml::tag('p', array(), $this->body)."\n";
		if (!empty($this->actions)) {
			echo CHtml::openTag('p');
			foreach ($this->actions as $button) {
				echo $button." \n";
			}
			echo "\n";
			echo CHtml::closeTag('p')."\n";
		}
		
		
		echo CHtml::closeTag('div')."\n";
	}
}

?>