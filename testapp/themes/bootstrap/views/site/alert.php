<?php 
$this->pageTitle=Yii::app()->name . ' - Components - Alerts';
$this->breadcrumbs=array(
	'Components',
	'Alerts',
);
?>

<div class="page-header">
	<h1>Alerts</h1>
</div>

<h3>Create some kind of alert</h3>
<?php echo EBootstrap::ibutton('Warning', $this->createUrl('/site/alert', array('id' => 1)), 'warning'); ?> 
<?php echo EBootstrap::ibutton('Error', $this->createUrl('/site/alert', array('id' => 2)), 'danger'); ?> 
<?php echo EBootstrap::ibutton('Success', $this->createUrl('/site/alert', array('id' => 3)), 'success'); ?> 
<?php echo EBootstrap::ibutton('Info', $this->createUrl('/site/alert', array('id' => 4)), 'info'); ?>