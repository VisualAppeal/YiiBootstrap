<?php 

Yii::import('zii.widgets.grid.CButtonColumn');

class EBootstrapButtonColumn extends CButtonColumn {
	public $viewButtonLabel = '<i class="glyphicon glyphicon-search"></i>';
	public $viewButtonImageUrl = false;
	
	public $updateButtonLabel = '<i class="glyphicon glyphicon-pencil"></i>';
	public $updateButtonImageUrl = false;
	
	public $deleteButtonLabel = '<i class="glyphicon glyphicon-trash"></i>';
	public $deleteButtonImageUrl = false;
	
	public function init() {
		$this->viewButtonLabel = '<i class="glyphicon glyphicon-search" title="' . Yii::t('EBootstrap', 'View') . '"></i>';
		$this->updateButtonLabel = '<i class="glyphicon glyphicon-pencil" title="' . Yii::t('EBootstrap', 'Update') . '"></i>';
		$this->deleteButtonLabel = '<i class="glyphicon glyphicon-trash" title="' . Yii::t('EBootstrap', 'Delete') . '"></i>';
		
		parent::init();
	}
}

?>