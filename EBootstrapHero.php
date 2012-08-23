<?php 

/**
 * Render a hero element
 * http://twitter.github.com/bootstrap/examples/hero.html
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.widgets
 */
class EBootstrapHero extends EBootstrapWidget {
	/**
	 * Headline
	 */
	public $headline = '';
	
	/**
	 * Body text
	 */
	public $body = '';
	
	/**
	 * Array of actions which will be displayed below the body
	 */
	public $actions = array();
	
	/**
	 * Init the widget
	 */
	public function init() {
		parent::init();
		
		EBootstrap::mergeClass($this->htmlOptions, array('hero-unit'));
	}
	
	/**
	 * Render the hero element
	 */
	public function run() {
		parent::run();

		echo EBootstrap::openTag('div', $this->htmlOptions)."\n";

		echo EBootstrap::tag('h1', array(), $this->headline)."\n";
		echo EBootstrap::tag('div', array(), $this->body)."\n";
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