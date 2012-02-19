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

<h2>Source</h2>
<?php $this->beginWidget('EBootstrapCode'); ?>
&lt;?php echo EBootstrap::ilabel('Default'); ?&gt; 
&lt;?php echo EBootstrap::ilabel('Success', 'success'); ?&gt; 
&lt;?php echo EBootstrap::ilabel('Warning', 'warning'); ?&gt; 
&lt;?php echo EBootstrap::ilabel('Important', 'important'); ?&gt; 
&lt;?php echo EBootstrap::ilabel('Info', 'info'); ?&gt;

<?php $this->endWidget(); ?>