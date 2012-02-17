<?php
$this->pageTitle=Yii::app()->name . ' - Error';
$this->breadcrumbs=array(
	'Error',
);
?>

<div class="page-header">
	<h1>Error <?php echo $code; ?></h1>
</div>

<div class="error">
	<?php echo CHtml::encode($message); ?>
</div>