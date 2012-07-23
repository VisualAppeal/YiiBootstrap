<?php 

Yii::import('zii.widgets.grid.CGridView');

/**
 * Wrapper class for CGridView
 * Render the GridView as a bootstrap table
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.yiiwidgets
 */
class EBootstrapGridView extends CGridView {
	/**
	 * Do not include the default style
	 *
	 * If it's set unequal false the css file specified will be included
	 * If it's set null the default css file will be included
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
	 * Default css class for the pager
	 */
	public $pagerCssClass = 'pagination';
	
	/** 
	 * Align of the pager
	 *
	 * Possible values: centered|right
	 * Default: left
	 */
	public $pagerAlign = 'centered';
	
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
		EBootstrap::mergeClassString($this->itemsCssClass, $classes);
		
		EBootstrap::mergeClass($this->htmlOptions, array('bootstrap-grid-view'));
		
		switch ($this->pagerAlign) {
			case 'centered':
				EBootstrap::mergeClassString($this->pagerCssClass, array('pagination-centered'));
				break;
			case 'right':
				EBootstrap::mergeClassString($this->pagerCssClass, array('pagination-right'));
				break;
		}
		
		if ($this->cssFile === false) {
			$cssFile = dirname(__FILE__).'/css/bootstrap.css';
			$this->cssFile = Yii::app()->getAssetManager()->publish($cssFile);
			Yii::app()->clientScript->registerCssFile($this->cssFile);
		}
	}
}

?>