<?php 
$this->widget('EBootstrapTabNavigation', array(
	'items' => array(
		array('label' => 'Page 1', 'url' => '#stackedpage1', 'active' => true),
		array('label' => 'Page 2', 'url' => '#stackedpage2'),
		array('label' => 'Dropdown', 'url' => '#', 'items' => array(
			array('label' => 'Subpage 1', 'url' => '#stackedsubpage1'),
			array('label' => 'Subpage 2', 'url' => '#stackedsubpage2'),
		)),
	),
	'stacked' => true,
));

$this->beginWidget('EBootstrapTabContentWrapper');
?>

	<?php $this->beginWidget('EBootstrapTabContent', array('active' => true, 'id' => 'stackedpage1')); ?>
		<h4>Page 1</h4>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
	<?php $this->endWidget(); ?>
	
	<?php $this->beginWidget('EBootstrapTabContent', array('id' => 'stackedpage2')); ?>
		<h4>Page 2</h4>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
	<?php $this->endWidget(); ?>
	
	<?php $this->beginWidget('EBootstrapTabContent', array('id' => 'stackedsubpage1')); ?>
		<h4>Subpage 1</h4>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor.</p>
	<?php $this->endWidget(); ?>
	
	<?php $this->beginWidget('EBootstrapTabContent', array('id' => 'stackedsubpage2')); ?>
		<h4>Subpage 2</h4>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor.</p>
	<?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>