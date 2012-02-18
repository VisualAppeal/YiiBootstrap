<?php
$this->breadcrumbs=array(
	'Cruds'=>array('index'),
	'Create',
);

$this->menu=array(
	array(
		'label' => 'Crud Operations', 'items' => array(
			array('label'=>'List', 'url'=>array('index'), 'icon' => 'list-alt'),
			array('label'=>'Manage', 'url'=>array('admin'), 'icon' => 'user'),
		),
	),
);
?>

<h1>Create Crud</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>