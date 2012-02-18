<?php
$this->breadcrumbs=array(
	'Cruds'=>array('index'),
	$model->title,
);

$this->menu=array(
	array(
		'label' => 'Crud Operations', 'items' => array(
			array('label'=>'List', 'url'=>array('index'), 'icon' => 'list-alt'),
			array('label'=>'Create', 'url'=>array('create'), 'icon' => 'plus'),
			array('label'=>'Update', 'url'=>array('update', 'id'=>$model->id), 'icon' => 'pencil'),
			array('label'=>'Delete', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'), 'icon' => 'trash'),
			array('label'=>'Manage', 'url'=>array('admin'), 'icon' => 'user'),
		),
	),
);
?>

<div class="page-header">
	<h1>View Crud #<?php echo $model->id; ?></h1>
</div>

<?php 
$this->widget('EBootstrapDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'title',
		'date_created',
		'date_updated',
	),
	'striped' => true,
	'bordered' => true,
	'condensed' => false,
)); 
?>
