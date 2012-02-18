<?php 

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

?>