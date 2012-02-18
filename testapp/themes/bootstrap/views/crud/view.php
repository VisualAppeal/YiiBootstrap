<?php
$this->breadcrumbs=array(
	'Cruds'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Crud', 'url'=>array('index')),
	array('label'=>'Create Crud', 'url'=>array('create')),
	array('label'=>'Update Crud', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Crud', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Crud', 'url'=>array('admin')),
);
?>

<h1>View Crud #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'date_created',
		'date_updated',
	),
)); ?>
