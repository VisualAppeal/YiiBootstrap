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
<h3>Different Action Types</h3>
<p>
	<?php EBootstrap::ibutton('Default', '#'); ?> 
	<?php EBootstrap::ibutton('Primary', '#', 'primary'); ?> 
	<?php EBootstrap::ibutton('Info', '#', 'info'); ?> 
	<?php EBootstrap::ibutton('Success', '#', 'success'); ?> 
	<?php EBootstrap::ibutton('Warning', '#', 'warning'); ?> 
	<?php EBootstrap::ibutton('Danger', '#', 'danger'); ?> 
	<?php EBootstrap::ibutton('Inverse', '#', 'inverse'); ?> 
</p>

<h3>Sizes</h3>
<p>
	<?php EBootstrap::ibutton('Primary Large', '#', 'primary', 'large'); ?> 
	<?php EBootstrap::ibutton('Primary', '#', 'primary'); ?>
	<?php EBootstrap::ibutton('Primary Small', '#', 'primary', 'small'); ?>
</p>

<h3>Disabled</h3>
<p>
	<?php EBootstrap::ibutton('Disabled', '#', 'primary', '', true); ?>
	<?php EBootstrap::ibutton('Disabled', '#', '', '', true); ?>
</p>

<h3>Icons</h3>
<p>
	<?php EBootstrap::ibutton('Refresh', '#', '', '', false, 'refresh'); ?>
	<?php EBootstrap::ibutton('Checkout', '#', 'success', '', false, 'shopping-cart', true); ?>
	<?php EBootstrap::ibutton('Refresh', '#', 'danger', '', false, 'trash', true); ?>
</p>