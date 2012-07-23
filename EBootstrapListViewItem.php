<?php 

Yii::import('zii.widgets.CDetailView');

/**
 * Render a {@link EBootsrapListView} item
 * Include the widget into your view file for the {@link EBootstrapListView}
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.yiiwidgets
 */
class EBootstrapListViewItem extends CDetailView {
	/**
	 * Do not include the default css file
	 *
	 * If its set to false, no file will be included
	 */
	public $cssFile = false;
	
	/**
	 * Do not include the default assets
	 */
	public $baseScriptUrl = false;
	
	/**
	 * Tag to enclose the view
	 */
	public $tagName = 'div';
	
	/**
	 * Template of the items
	 */
	public $itemTemplate = "<div class=\"{class}\"><span class=\"bootstrap-list-view-item-attribute\">{label}:</span> <span class=\"bootstrap-list-view-item-value\">{value}</span></div>\n";
	
	/**
	 * Class of the items
	 */
	public $itemCssClass = array('bootstrap-list-view-item-content');
	
	/**
	 * Init the widget
	 */
	public function init() {
		parent::init();
		
		EBootstrap::mergeClass($this->htmlOptions, array('bootstrap-list-view-item'));
	}
}

?>