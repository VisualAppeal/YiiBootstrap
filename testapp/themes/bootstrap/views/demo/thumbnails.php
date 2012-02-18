<ul class="thumbnails">
	<li class="span3">
		<?php echo EBootstrap::thumbnailLink('#', EBootstrap::thumbnailSrc(230, 200)); ?>
	</li>
	<li class="span3">
		<?php echo EBootstrap::thumbnailLink('#', EBootstrap::thumbnailSrc(230, 200)); ?>
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