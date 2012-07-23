<?php

/**
 * Render a tab page
 * The pages must be enclosed by one {@link EBootstrapTabContentWrapper} widget
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.widgets.tabs
 */
class EBootstrapTabContent extends EBootstrapWidget {
	/**
	 * ID of the widget
	 *
	 * The ID is important and has to match the id in the url of the {@link EBootstrapTabNavigation}
	 */
	public $id = null;
	
	/**
	 * If this page should be active
	 *
	 * Only one page should be active
	 */
	public $active = false;
	
	/**
	 * Init the widget
	 *
	 * Render header
	 */
	public function init() {
		parent::init();
		
		EBootstrap::mergeClass($this->htmlOptions, array('tab-pane'));
		if ($this->active) {
			EBootstrap::mergeClass($this->htmlOptions, array('active'));
		}
		
		if (is_null($this->id))
			$this->id = $this->getId();
		
		$this->htmlOptions['id'] = $this->id;
		echo EBootstrap::openTag('div', $this->htmlOptions);
	}
	
	/**
	 * Render the footer of the widget
	 */
	public function run() {
		parent::run();
		
		echo EBootstrap::closeTag('div');
	}
}

?>