<?php 

Yii::import('zii.widgets.grid.CButtonColumn');

class EBootstrapButtonColumn extends CButtonColumn {
	public $viewButtonLabel = '<i class="icon icon-search"></i>';
	public $viewButtonImageUrl = false;
	
	public $updateButtonLabel = '<i class="icon icon-pencil"></i>';
	public $updateButtonImageUrl = false;
	
	public $deleteButtonLabel = '<i class="icon icon-trash"></i>';
	public $deleteButtonImageUrl = false;
}

?>