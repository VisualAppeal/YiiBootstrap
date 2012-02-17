<?php 
$this->pageTitle=Yii::app()->name . ' - Components - Navigation';
$this->breadcrumbs=array(
	'Components',
	'Navigation',
);

Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/bootstrap/bootstrap-dropdown.js');
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/bootstrap/bootstrap-tab.js');
?>

<div class="page-header">
	<h1>Navigation</h1>
</div>

<h2>Tabs and Pills</h2>

<div class="row">
	<div class="span6">
		<h3>Tabs</h3>
		<?php $this->renderPartial('//demo/tab'); ?>
	</div>
	
	<div class="span6">
		<h3>Pills</h3>
		<?php $this->renderPartial('//demo/pill'); ?>
	</div>
</div>

<h2>Stacked</h2>
<div class="row">
	<div class="span6">
		<h3>Tabs</h3>
		<?php $this->renderPartial('//demo/tab-stacked'); ?>
	</div>
	
	<div class="span6">
		<h3>Pills</h3>
		<?php $this->renderPartial('//demo/pill-stacked'); ?>
	</div>
</div>

<h2>Tab navigation at different positions</h2>
<div class="row">
	<div class="span4">
		<h3>Bottom</h3>
		<?php $this->renderPartial('//demo/tab-bottom'); ?>
	</div>
	
	<div class="span4">
		<h3>Left</h3>
		<?php $this->renderPartial('//demo/tab-left'); ?>
	</div>
	
	<div class="span4">
		<h3>Right</h3>
		<?php $this->renderPartial('//demo/tab-right'); ?>
	</div>
</div>

<h2>Nav lists</h2>
<p>You can see a nav list at the <a href="<?php echo $this->createUrl('/site/page', array('view' => 'sidebar')); ?>">sidebar demo</a>.</p>

<h2>Navbar</h2>
<p>Refer to the navigation at the top of this site for a demo.</p>

<h2>Breadcrumbs</h2>
<p>Refer to the breadcrumbs at the top of (almost) each page for a demo.</p>

<h2>Pagination</h2>
<p>Refer to the pagination of the CGridView and CListView component.</p>