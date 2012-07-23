<?php 

Yii::import('zii.widgets.CDetailView');

/**
 * Wrapper class for CDetailView
 * Render the DetailView as a bootstrap table
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.yiiwidgets
 */
class EBootstrapDetailView extends CDetailView {
	/**
	 * Do not include the default style
	 *
	 * If it's set unequal false the css file specified will be included
	 */
	public $cssFile = false;
	
	/**
	 * Bordered table
	 */
	public $bordered = false;
	
	/**
	 * Every second row has a darker background
	 */
	public $striped = false;
	
	/**
	 * Smaller table fields to display more content
	 */
	public $condensed = false;
	
	/**
	 * Init the widget
	 */
	public function init() {
		parent::init();
		
		$classes = array('table');
		if ($this->bordered)
			$classes[] = 'table-bordered';
		if ($this->striped)
			$classes[] = 'table-striped';
		if ($this->condensed)
			$classes[] = 'table-condensed';
		
		EBootstrap::mergeClass($this->htmlOptions, $classes);
	}
}

?>