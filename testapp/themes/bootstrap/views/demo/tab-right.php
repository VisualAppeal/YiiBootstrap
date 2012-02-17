<?php 
$this->beginWidget('EBootstrapTabWrapper', array(
	'position' => 'right',
));
?>
	<?php
	$this->widget('EBootstrapTabNavigation', array(
		'items' => array(
			array('label' => 'Page 1', 'url' => '#rightpage1', 'active' => true),
			array('label' => 'Page 2', 'url' => '#rightpage2'),
			array('label' => 'Page 3', 'url' => '#rightpage3'),
		),
	));
	?>
	
	<?php $this->beginWidget('EBootstrapTabContentWrapper'); ?>
	
		<?php $this->beginWidget('EBootstrapTabContent', array('active' => true, 'id' => 'rightpage1')); ?>
			<h4>Page 1</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
		<?php $this->endWidget(); ?>
		
		<?php $this->beginWidget('EBootstrapTabContent', array('id' => 'rightpage2')); ?>
			<h4>Page 2</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
		<?php $this->endWidget(); ?>
		
		<?php $this->beginWidget('EBootstrapTabContent', array('id' => 'rightpage3')); ?>
			<h4>Page 3</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
		<?php $this->endWidget(); ?>
	
	
	<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>