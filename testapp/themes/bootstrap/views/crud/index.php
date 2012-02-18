<?php
$this->breadcrumbs=array(
	'Cruds',
);

$this->menu=array(
	array(
		'label' => 'Crud Operations', 'items' => array(
			array('label'=>'Create', 'url'=>array('create'), 'icon' => 'plus'),
			array('label'=>'Manage', 'url'=>array('admin'), 'icon' => 'user'),
		),
	),
);
?>

<div class="page-header">
	<h1>Cruds</h1>
</div>

<?php 
$this->widget('EBootstrapListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'pager' => array(
		'class' => 'EBootstrapLinkPager',
		'header' => false,
	),
	'pagerAlign' => 'right',
)); 
?>