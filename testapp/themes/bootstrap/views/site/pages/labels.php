<?php 
$this->pageTitle=Yii::app()->name . ' - Base CSS - Labels';
$this->breadcrumbs=array(
	'Base CSS',
	'Labels',
);
?>

<div class="page-header">
	<h1>Labels</h1>
</div>

<h2>Inline Labels</h2>
<?php $this->renderPartial('//demo/inline-labels'); ?>