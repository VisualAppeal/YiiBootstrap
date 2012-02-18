<?php 

Yii::import('zii.widgets.CDetailView');

class EBootstrapDetailView extends CDetailView {
	public $cssFile = false;
	
	public $bordered = false;
	public $striped = false;
	public $condensed = false;
	
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