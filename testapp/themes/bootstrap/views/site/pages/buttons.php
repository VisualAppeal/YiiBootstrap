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
<p>Add Form Buttons</p>

<h2>Links</h2>
<h3>Different Action Types</h3>
<p>
	<?php $this->widget('EBootstrapButton', array('text' => 'Default', 'url' => '#')); ?> 
	<?php $this->widget('EBootstrapButton', array('text' => 'Primary', 'url' => '#', 'type' => 'primary')); ?> 
	<?php $this->widget('EBootstrapButton', array('text' => 'Info', 'url' => '#', 'type' => 'info')); ?> 
	<?php $this->widget('EBootstrapButton', array('text' => 'Success', 'url' => '#', 'type' => 'success')); ?> 
	<?php $this->widget('EBootstrapButton', array('text' => 'Warning', 'url' => '#', 'type' => 'warning')); ?> 
	<?php $this->widget('EBootstrapButton', array('text' => 'Danger', 'url' => '#', 'type' => 'danger')); ?> 
	<?php $this->widget('EBootstrapButton', array('text' => 'Inverse', 'url' => '#', 'type' => 'inverse')); ?>
</p>

<h3>Sizes</h3>
<p>
	<?php $this->widget('EBootstrapButton', array('text' => 'Primary large', 'url' => '#', 'type' => 'primary', 'size' => 'large')); ?>
	<?php $this->widget('EBootstrapButton', array('text' => 'Primary', 'url' => '#', 'type' => 'primary')); ?>
	<?php $this->widget('EBootstrapButton', array('text' => 'Primary small', 'url' => '#', 'type' => 'primary', 'size' => 'small')); ?>
</p>

<h3>Disabled</h3>
<p>
	<?php $this->widget('EBootstrapButton', array('text' => 'Disabled', 'url' => '#', 'type' => 'primary', 'size' => 'large', 'disabled' => true)); ?>
	<?php $this->widget('EBootstrapButton', array('text' => 'Disabled', 'url' => '#', 'disabled' => true)); ?>
</p>

<h3>Icons</h3>
<p>
	<?php $this->widget('EBootstrapButton', array('text' => 'Refresh', 'url' => '#', 'icon' => 'refresh')); ?>
	<?php $this->widget('EBootstrapButton', array('text' => 'Checkout', 'url' => '#', 'type' => 'success', 'icon' => 'shopping-cart', 'iconWhite' => true)); ?>
	<?php $this->widget('EBootstrapButton', array('text' => 'Delete', 'url' => '#', 'type' => 'danger', 'icon' => 'trash', 'iconWhite' => true)); ?>
</p>