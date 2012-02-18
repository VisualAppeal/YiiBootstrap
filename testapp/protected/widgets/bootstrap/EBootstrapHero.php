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
		echo EBootstrap::openTag('div', $this->htmlOptions)."\n";

		echo EBootstrap::tag('h1', array(), $this->headline)."\n";
		echo EBootstrap::tag('p', array(), $this->body)."\n";
		if (!empty($this->actions)) {
			echo EBootstrap::openTag('p');
			foreach ($this->actions as $button) {
				echo $button." \n";
			}
			echo "\n";
			echo EBootstrap::closeTag('p')."\n";
		}
		
		
		echo EBootstrap::closeTag('div')."\n";
	}
}

?>