<?php
$this->breadcrumbs=array(
	'Cruds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Crud', 'url'=>array('index')),
	array('label'=>'Manage Crud', 'url'=>array('admin')),
);
?>

<h1>Create Crud</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>