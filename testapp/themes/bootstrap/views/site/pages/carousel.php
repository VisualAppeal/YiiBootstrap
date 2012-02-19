<?php 
$this->pageTitle=Yii::app()->name . ' - Components - Carousel';
$this->breadcrumbs=array(
	'Components',
	'Carousel',
);
?>

<div class="page-header">
	<h1>Carousel</h1>
</div>

<?php $this->renderPartial('//demo/carousel'); ?>

<?php $this->beginWidget('EBootstrapCode'); ?>
$this->widget('EBootstrapCarousel', array(
	'items' => array(
		array('src' => EBootstrap::thumbnailSrc(940, 400, 'ccc'), 'caption' => 'Image Caption 1', 'body' => 'This is a thumnail. What a great picture.', 'active' => true),
		array('src' => EBootstrap::thumbnailSrc(940, 400, 'bbb'), 'caption' => 'Image Caption 2', 'body' => 'This is a thumnail. What a great picture.'),
		array('src' => EBootstrap::thumbnailSrc(940, 400, 'aaa'), 'caption' => 'Image Caption 3', 'body' => 'This is a thumnail. What a great picture.'),
		array('src' => EBootstrap::thumbnailSrc(940, 400, '999'), 'caption' => 'Image Caption 4', 'body' => 'This is a thumnail. What a great picture.'),
		array('src' => EBootstrap::thumbnailSrc(940, 400, '888'), 'caption' => 'Image Caption 5', 'body' => 'This is a thumnail. What a great picture.'),
		array('src' => EBootstrap::thumbnailSrc(940, 400, '777'), 'caption' => 'Image Caption 6', 'body' => 'This is a thumnail. What a great picture.'),
	),
	'interval' => 6000,
	'htmlOptions' => array(),
));
<?php $this->endWidget(); ?>