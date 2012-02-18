<?php
$this->breadcrumbs=array(
	'Cruds',
);

$this->menu=array(
	array('label'=>'Create Crud', 'url'=>array('create')),
	array('label'=>'Manage Crud', 'url'=>array('admin')),
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
