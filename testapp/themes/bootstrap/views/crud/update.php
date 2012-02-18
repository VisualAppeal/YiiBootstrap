<?php
$this->breadcrumbs=array(
	'Cruds'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array(
		'label' => 'Crud Operations', 'items' => array(
			array('label'=>'List', 'url'=>array('index'), 'icon' => 'list-alt'),
			array('label'=>'Create', 'url'=>array('create'), 'icon' => 'plus'),
			array('label'=>'View', 'url'=>array('view', 'id'=>$model->id), 'icon' => 'th-large'),
			array('label'=>'Manage', 'url'=>array('admin'), 'icon' => 'user'),
		),
	),
);
?>

<h1>Update Crud <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>