<?php 

Yii::import('zii.widgets.CListView');

class EBootstrapListView extends CListView {
	public $pagerCssClass = 'pagination';
	
	/* Possible values: centered, right */
	public $pagerAlign = '';
	
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
	}
}

?>