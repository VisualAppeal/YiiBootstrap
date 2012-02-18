<?php $this->beginContent('//layouts/main'); ?>

<div class="row">

	<div class="span3" id="sidebar">
		<div class="well sidebar-nav">
			<?php
				$this->widget('EBootstrapSidebar', array(
					'items'=>$this->menu,
				));
			?>
		</div>
	</div>
	
	<div class="span9" id="main">
		<?php echo $content; ?>
	</div>
		
</div>
<?php $this->endContent(); ?>