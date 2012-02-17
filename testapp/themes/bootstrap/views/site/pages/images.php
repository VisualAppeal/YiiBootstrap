<?php 
$this->pageTitle=Yii::app()->name . ' - Base CSS - Images';
$this->breadcrumbs=array(
	'Base CSS',
	'Images',
);
?>

<div class="page-header">
	<h1>Images</h1>
</div>

<ul class="thumbnails">
	<li class="span3">
		<?php echo EBootstrap::thumbnailLink('#', 230, 200); ?>
	</li>
	<li class="span3">
		<?php echo EBootstrap::thumbnailLink('#', 230, 200); ?>
	</li>
	<li class="span3">
		<?php echo EBootstrap::imageCaption(EBootstrap::thumbnailSrc(230, 200), '', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam'); ?>
	</li>
	<li class="span3">
		<?php echo EBootstrap::imageCaption(EBootstrap::thumbnailSrc(230, 200), '', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', array(
			EBootstrap::ibutton('Primary', '#', 'primary'),
			EBootstrap::ibutton('Button', '#'),
		)); ?>
	</li>
</ul>