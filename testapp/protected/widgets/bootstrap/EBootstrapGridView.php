<?php 

Yii::import('zii.widgets.grid.CGridView');

class EBootstrapGridView extends CGridView {
	public $cssFile = false;
	
	public $bordered = false;
	public $striped = false;
	public $condensed = false;
	
	public $pagerCssClass = 'pagination';
	
	/* Possible values: centered, right */
	public $pagerAlign = 'centered';
	
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
		
		if (!$this->cssFile) {
			$cssFile = dirname(__FILE__).'/css/bootstrap.css';
			$this->cssFile = Yii::app()->getAssetManager()->publish($cssFile);
			Yii::app()->clientScript->registerCssFile($this->cssFile);
		}
	}
}

?>