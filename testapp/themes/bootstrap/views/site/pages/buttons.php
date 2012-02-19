<?php 
$this->pageTitle=Yii::app()->name . ' - Base CSS - Sidebar';
$this->breadcrumbs=array(
	'Base CSS',
	'Buttons',
);
?>

<div class="page-header">
	<h1>Buttons</h1>
</div>

<h2>Form Buttons</h2>
<p>ToDo: Add Form Buttons</p>

<h2>Links</h2>
<?php $this->renderPartial('//demo/button-link'); ?>

<h2>Source</h2>
<?php $this->beginWidget('EBootstrapCode'); ?>
<h3>Different Action Types</h3>
<p>
	&lt;?php echo EBootstrap::ibutton('Default', '#'); ?&gt; 
	&lt;?php echo EBootstrap::ibutton('Primary', '#', 'primary'); ?&gt; 
	&lt;?php echo EBootstrap::ibutton('Info', '#', 'info'); ?&gt; 
	&lt;?php echo EBootstrap::ibutton('Success', '#', 'success'); ?&gt; 
	&lt;?php echo EBootstrap::ibutton('Warning', '#', 'warning'); ?&gt; 
	&lt;?php echo EBootstrap::ibutton('Danger', '#', 'danger'); ?&gt; 
	&lt;?php echo EBootstrap::ibutton('Inverse', '#', 'inverse'); ?&gt; 
</p>

<h3>Sizes</h3>
<p>
	&lt;?php echo EBootstrap::ibutton('Primary Large', '#', 'primary', 'large'); ?&gt; 
	&lt;?php echo EBootstrap::ibutton('Primary', '#', 'primary'); ?&gt;
	&lt;?php echo EBootstrap::ibutton('Primary Small', '#', 'primary', 'small'); ?&gt;
</p>

<h3>Disabled</h3>
<p>
	&lt;?php echo EBootstrap::ibutton('Disabled', '#', 'primary', '', true); ?&gt;
	&lt;?php echo EBootstrap::ibutton('Disabled', '#', '', '', true); ?&gt;
</p>

<h3>Icons</h3>
<p>
	&lt;?php echo EBootstrap::ibutton('Refresh', '#', '', '', false, 'refresh'); ?&gt;
	&lt;?php echo EBootstrap::ibutton('Checkout', '#', 'success', '', false, 'shopping-cart', true); ?&gt;
	&lt;?php echo EBootstrap::ibutton('Refresh', '#', 'danger', '', false, 'trash', true); ?&gt;
</p>
<?php $this->endWidget(); ?>