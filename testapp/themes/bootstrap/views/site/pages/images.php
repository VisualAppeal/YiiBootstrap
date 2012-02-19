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

<?php $this->renderPartial('//demo/thumbnails'); ?>


<h2>Source</h2>
<?php $this->beginWidget('EBootstrapCode'); ?>
<ul class="thumbnails">
	<li class="span3">
		&lt;?php echo EBootstrap::thumbnailLink('#', EBootstrap::thumbnailSrc(230, 200)); ?&gt;
	</li>
	<li class="span3">
		&lt;?php echo EBootstrap::thumbnailLink('#', EBootstrap::thumbnailSrc(230, 200)); ?&gt;
	</li>
	<li class="span3">
		&lt;?php echo EBootstrap::imageCaption(EBootstrap::thumbnailSrc(230, 200), '', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam'); ?&gt;
	</li>
	<li class="span3">
		&lt;?php echo EBootstrap::imageCaption(EBootstrap::thumbnailSrc(230, 200), '', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam', array(
			EBootstrap::ibutton('Primary', '#', 'primary'),
			EBootstrap::ibutton('Button', '#'),
		)); ?&gt;
	</li>
</ul>
<?php $this->endWidget(); ?>