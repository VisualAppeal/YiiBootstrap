<?php 
$this->beginWidget('EBootstrapTabWrapper', array(
	'position' => 'left',
));
?>
	<?php
	$this->widget('EBootstrapTabNavigation', array(
		'items' => array(
			array('label' => 'Page 1', 'url' => '#leftpage1', 'active' => true),
			array('label' => 'Page 2', 'url' => '#leftpage2'),
			array('label' => 'Page 3', 'url' => '#leftpage3'),
		),
	));
	?>
	
	<?php $this->beginWidget('EBootstrapTabContentWrapper'); ?>

		<?php $this->beginWidget('EBootstrapTabContent', array('active' => true, 'id' => 'leftpage1')); ?>
			<h4>Page 1</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
		<?php $this->endWidget(); ?>
		
		<?php $this->beginWidget('EBootstrapTabContent', array('id' => 'leftpage2')); ?>
			<h4>Page 2</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
		<?php $this->endWidget(); ?>
		
		<?php $this->beginWidget('EBootstrapTabContent', array('id' => 'leftpage3')); ?>
			<h4>Page 3</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
		<?php $this->endWidget(); ?>
	
	
	<?php $this->endWidget(); ?>
<?php $this->endWidget(); ?>