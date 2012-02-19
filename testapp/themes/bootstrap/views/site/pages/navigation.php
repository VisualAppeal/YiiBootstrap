<?php 
$this->pageTitle=Yii::app()->name . ' - Components - Navigation';
$this->breadcrumbs=array(
	'Components',
	'Navigation',
);
?>

<div class="page-header">
	<h1>Navigation</h1>
</div>

<h2>Tabs and Pills</h2>

<div class="row">
	<div class="span6">
		<h3>Tabs</h3>
		<?php $this->renderPartial('//demo/tab'); ?>
	</div>
	
	<div class="span6">
		<h3>Pills</h3>
		<?php $this->renderPartial('//demo/pill'); ?>
	</div>
</div>

<h3>Source</h3>
<?php 
$this->widget('EBootstrapCollapse', array(
	'sender' => 'a',
	'value' => 'Show Tab Source',
	'valueToggle' => 'Hide Tab Source',
	'htmlOptions' => array(
		'class' => 'btn',
	),
	'target' => '#ebootstraptab-example',
));
?>

<?php $this->beginWidget('EBootstrapCode', array(
	'collapse' => true,
	'htmlOptions' => array(
		'id' => 'ebootstraptab-example',
	),
)); ?>
&lt;?php 
$this->widget('EBootstrapTabNavigation', array(
	'items' => array(
		array('label' => 'Page 1', 'url' => '#page1', 'active' => true),
		array('label' => 'Page 2', 'url' => '#page2'),
		array('label' => 'Dropdown', 'url' => '#', 'items' => array(
			array('label' => 'Subpage 1', 'url' => '#subpage1'),
			array('label' => 'Subpage 2', 'url' => '#subpage2'),
		)),
	),
	'stacked' => false,
	'pills' => false, //true
));

$this->beginWidget('EBootstrapTabContentWrapper');
?&gt;

	&lt;?php $this->beginWidget('EBootstrapTabContent', array('active' => true, 'id' => 'page1')); ?&gt;
		<h4>Page 1</h4>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
	&lt;?php $this->endWidget(); ?&gt;
	
	&lt;?php $this->beginWidget('EBootstrapTabContent', array('id' => 'page2')); ?&gt;
		<h4>Page 2</h4>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
	&lt;?php $this->endWidget(); ?&gt;
	
	&lt;?php $this->beginWidget('EBootstrapTabContent', array('id' => 'subpage1')); ?&gt;
		<h4>Subpage 1</h4>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor.</p>
	&lt;?php $this->endWidget(); ?&gt;
	
	&lt;?php $this->beginWidget('EBootstrapTabContent', array('id' => 'subpage2')); ?&gt;
		<h4>Subpage 2</h4>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor.</p>
	&lt;?php $this->endWidget(); ?&gt;

&lt;?php $this->endWidget(); ?&gt;
<?php $this->endWidget(); ?>

<h2>Stacked</h2>
<div class="row">
	<div class="span6">
		<h3>Tabs</h3>
		<?php $this->renderPartial('//demo/tab-stacked'); ?>
	</div>
	
	<div class="span6">
		<h3>Pills</h3>
		<?php $this->renderPartial('//demo/pill-stacked'); ?>
	</div>
</div>

<h3>Source</h3>
<?php 
$this->widget('EBootstrapCollapse', array(
	'sender' => 'a',
	'value' => 'Show Tab Source',
	'valueToggle' => 'Hide Tab Source',
	'htmlOptions' => array(
		'class' => 'btn',
	),
	'target' => '#ebootstraptab-example',
));
?>

<?php $this->beginWidget('EBootstrapCode', array(
	'collapse' => true,
	'htmlOptions' => array(
		'id' => 'ebootstraptab-example',
	),
)); ?>
&lt;?php 
$this->widget('EBootstrapTabNavigation', array(
	'items' => array(
		array('label' => 'Page 1', 'url' => '#page1', 'active' => true),
		array('label' => 'Page 2', 'url' => '#page2'),
		array('label' => 'Dropdown', 'url' => '#', 'items' => array(
			array('label' => 'Subpage 1', 'url' => '#subpage1'),
			array('label' => 'Subpage 2', 'url' => '#subpage2'),
		)),
	),
	'stacked' => true,
	'pills' => false, //true
));

$this->beginWidget('EBootstrapTabContentWrapper');
?&gt;

	&lt;?php $this->beginWidget('EBootstrapTabContent', array('active' => true, 'id' => 'page1')); ?&gt;
		<h4>Page 1</h4>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
	&lt;?php $this->endWidget(); ?&gt;
	
	&lt;?php $this->beginWidget('EBootstrapTabContent', array('id' => 'page2')); ?&gt;
		<h4>Page 2</h4>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
	&lt;?php $this->endWidget(); ?&gt;
	
	&lt;?php $this->beginWidget('EBootstrapTabContent', array('id' => 'subpage1')); ?&gt;
		<h4>Subpage 1</h4>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor.</p>
	&lt;?php $this->endWidget(); ?&gt;
	
	&lt;?php $this->beginWidget('EBootstrapTabContent', array('id' => 'subpage2')); ?&gt;
		<h4>Subpage 2</h4>
		<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor.</p>
	&lt;?php $this->endWidget(); ?&gt;

&lt;?php $this->endWidget(); ?&gt;
<?php $this->endWidget(); ?>

<h2>Tab navigation at different positions</h2>
<div class="row">
	<div class="span4">
		<h3>Bottom</h3>
		<?php $this->renderPartial('//demo/tab-bottom'); ?>
	</div>
	
	<div class="span4">
		<h3>Left</h3>
		<?php $this->renderPartial('//demo/tab-left'); ?>
	</div>
	
	<div class="span4">
		<h3>Right</h3>
		<?php $this->renderPartial('//demo/tab-right'); ?>
	</div>
</div>

<h3>Tab navigation at the bottom</h3>
<?php 
$this->widget('EBootstrapCollapse', array(
	'sender' => 'a',
	'value' => 'Show Tab Source',
	'valueToggle' => 'Hide Tab Source',
	'htmlOptions' => array(
		'class' => 'btn',
	),
	'target' => '#ebootstraptabbottom-example',
));
?>

<?php $this->beginWidget('EBootstrapCode', array(
	'collapse' => true,
	'htmlOptions' => array(
		'id' => 'ebootstraptabbottom-example',
	),
)); ?>
&lt;?php
/* When you position the navigation at the bottom you have to switch the order of the content and the navigation */
$this->beginWidget('EBootstrapTabWrapper', array(
	'position' => 'bottom',
));
?&gt;

	&lt;?php $this->beginWidget('EBootstrapTabContentWrapper'); ?&gt;
	
		&lt;?php $this->beginWidget('EBootstrapTabContent', array('active' => true, 'id' => 'bottompage1')); ?&gt;
			<h4>Page 1</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
		&lt;?php $this->endWidget(); ?&gt;
		
		&lt;?php $this->beginWidget('EBootstrapTabContent', array('id' => 'bottompage2')); ?&gt;
			<h4>Page 2</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
		&lt;?php $this->endWidget(); ?&gt;
		
		&lt;?php $this->beginWidget('EBootstrapTabContent', array('id' => 'bottompage3')); ?&gt;
			<h4>Page 3</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
		&lt;?php $this->endWidget(); ?&gt;
	
	
	&lt;?php $this->endWidget(); ?&gt;
	
	&lt;?php
	$this->widget('EBootstrapTabNavigation', array(
		'items' => array(
			array('label' => 'Page 1', 'url' => '#bottompage1', 'active' => true),
			array('label' => 'Page 2', 'url' => '#bottompage2'),
			array('label' => 'Page 3', 'url' => '#bottompage3'),
		),
	));
	?&gt;

&lt;?php $this->endWidget(); ?&gt;
<?php $this->endWidget(); ?>

<h3>Tab navigation left or right</h3>
<?php 
$this->widget('EBootstrapCollapse', array(
	'sender' => 'a',
	'value' => 'Show Tab Source',
	'valueToggle' => 'Hide Tab Source',
	'htmlOptions' => array(
		'class' => 'btn',
	),
	'target' => '#ebootstraptabside-example',
));
?>

<?php $this->beginWidget('EBootstrapCode', array(
	'collapse' => true,
	'htmlOptions' => array(
		'id' => 'ebootstraptabside-example',
	),
)); ?>
&lt;?php 
$this->beginWidget('EBootstrapTabWrapper', array(
	'position' => 'left', //or right
));
?&gt;
	&lt;?php
	$this->widget('EBootstrapTabNavigation', array(
		'items' => array(
			array('label' => 'Page 1', 'url' => '#leftpage1', 'active' => true),
			array('label' => 'Page 2', 'url' => '#leftpage2'),
			array('label' => 'Page 3', 'url' => '#leftpage3'),
		),
	));
	?&gt;
	
	&lt;?php $this->beginWidget('EBootstrapTabContentWrapper'); ?&gt;

		&lt;?php $this->beginWidget('EBootstrapTabContent', array('active' => true, 'id' => 'leftpage1')); ?&gt;
			<h4>Page 1</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
		&lt;?php $this->endWidget(); ?&gt;
		
		&lt;?php $this->beginWidget('EBootstrapTabContent', array('id' => 'leftpage2')); ?&gt;
			<h4>Page 2</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
		&lt;?php $this->endWidget(); ?&gt;
		
		&lt;?php $this->beginWidget('EBootstrapTabContent', array('id' => 'leftpage3')); ?&gt;
			<h4>Page 3</h4>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam sit amet elit vitae arcu interdum ullamcorper. Nullam ultrices, nisi quis scelerisque convallis, augue neque tempor enim, et mattis justo nibh eu elit. Quisque ultrices gravida pede. Mauris accumsan vulputate tellus. Phasellus condimentum bibendum dolor. Mauris sed ipsum. Phasellus in diam. Nam sapien ligula, consectetuer id, hendrerit in, cursus sed, leo. Nam tincidunt rhoncus urna. Aliquam id massa ut nibh bibendum imperdiet. Curabitur neque mauris, porta vel, lacinia quis, placerat ultrices, orci.</p>
		&lt;?php $this->endWidget(); ?&gt;
	
	
	&lt;?php $this->endWidget(); ?&gt;
&lt;?php $this->endWidget(); ?&gt;
<?php $this->endWidget(); ?>

<h2>Nav lists</h2>
<p>You can see a nav list at the <a href="<?php echo $this->createUrl('/site/page', array('view' => 'sidebar')); ?>">sidebar demo</a>.</p>

<h2>Navbar</h2>
<p>Refer to the navigation at the top of this site for a demo.</p>

<h2>Breadcrumbs</h2>
<p>Refer to the breadcrumbs at the top of (almost) each page for a demo.</p>

<h2>Pagination</h2>
<p>Refer to the pagination of the CGridView and CListView component.</p>