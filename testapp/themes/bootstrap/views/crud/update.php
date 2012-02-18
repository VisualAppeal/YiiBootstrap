<?php
$this->breadcrumbs=array(
	'Cruds'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Crud', 'url'=>array('index')),
	array('label'=>'Create Crud', 'url'=>array('create')),
	array('label'=>'View Crud', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Crud', 'url'=>array('admin')),
);
?>

<h1>Update Crud <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>