<?php 

Yii::import('zii.widgets.CListView');

/**
 * Wrapper class for CListView
 * Render the ListView. Please refer to {@link EBootstrapListViewItem}
 * 
 * @author Tim Helfensdörfer <tim@visualappeal.de>
 * @version 0.3.0
 * @package bootstrap.yiiwidgets
 */
class EBootstrapListView extends CListView {
	/**
	 * Default pager class
	 */
	public $pagerCssClass = 'pagination';
	
	/**
	 * Do not include the default style
	 *
	 * If it's set unequal false the css file specified will be included
	 */
	public $cssFile = false;
	
	/** 
	 * Align of the pager
	 *
	 * Possible values: centered|right 
	 * Default: left
	 */
	public $pagerAlign = '';
	
	/**
	 * Init the widget
	 */
	public function init() {
		parent::init();
		
		EBootstrap::mergeClass($this->htmlOptions, array('bootstrap-list-view'));
		
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