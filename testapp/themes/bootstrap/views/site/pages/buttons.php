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

<h3>Source</h3>
<?php 
$this->widget('EBootstrapCollapse', array(
	'sender' => 'a',
	'value' => 'Show Button Source',
	'valueToggle' => 'Hide Button Source',
	'htmlOptions' => array(
		'class' => 'btn',
	),
	'target' => '#ebootstrapbutton-example',
));
?>

<?php $this->beginWidget('EBootstrapCode', array(
	'collapse' => true,
	'htmlOptions' => array(
		'id' => 'ebootstrapbutton-example',
	),
)); ?>
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

<h2>Button Groups</h2>

<div class="row">
	<div class="span4">
		<h3>Default</h3>
		<p>
			<?php 
			echo EBootstrap::buttonGroup(array(
				EBootstrap::ibutton('Left', '#'),
				EBootstrap::ibutton('Middle', '#'),
				EBootstrap::ibutton('Right', '#'),
			)); 
			?>
		</p>
	</div>
	
	<div class="span4">
		<h3>Toolbar</h3>
		<p>
			<?php 
			echo EBootstrap::buttonToolbar(array(
				EBootstrap::buttonGroup(array(
					EBootstrap::ibutton('1', '#'),
					EBootstrap::ibutton('2', '#'),
					EBootstrap::ibutton('3', '#'),
				)),
				EBootstrap::buttonGroup(array(
					EBootstrap::ibutton('4', '#'),
					EBootstrap::ibutton('5', '#'),
				)),
				EBootstrap::buttonGroup(array(
					EBootstrap::ibutton('6', '#'),
					EBootstrap::ibutton('7', '#'),
					EBootstrap::ibutton('8', '#'),
					EBootstrap::ibutton('9', '#'),
				)),
			)); 
			?>
		</p>
	</div>
	
	<div class="span4">
		<h3>Dropdown</h3>
		<p>
			<?php 
			echo EBootstrap::buttonDropdown(EBootstrap::ibutton('Dropdown Button', '#', 'success'), array(
				array('text' => 'Submenu 1', 'url' => '#'),
				array('text' => 'Submenu 2', 'url' => '#'),
			));
			?>
		</p>
		
		<p>
			<?php 
			echo EBootstrap::buttonDropdown(EBootstrap::ibutton('Dropdown Button', '#', 'danger'), array(
				array('text' => 'Submenu 1', 'url' => '#'),
				array('text' => 'Submenu 2', 'url' => '#'),
			), true);
			?>
		</p>
	</div>
</div>