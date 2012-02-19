<?php 
$this->widget('EBootstrapHero', array(
	'headline' => EBootstrap::encode(Yii::app()->name),
	'body' => 'The aim of the project is to transform all <a href="http://twitter.github.com/bootstrap/">bootstrap</a> components into <a href="http://www.yiiframework.com/">Yii</a> Widgets and apply the bootstrap style to the default Yii Widgets.',
	'actions' => array(
		EBootstrap::ibutton('Primary Action', '#', 'primary', 'large'),
	),
));
?>

<?php 
$this->widget('EBootstrapCollapse', array(
	'sender' => 'a',
	'value' => 'Show Hero Source',
	'valueToggle' => 'Hide Hero Source',
	'htmlOptions' => array(
		'class' => 'btn source-toggle',
	),
	'target' => '#ebootstraphero-example',
));
?>

<?php $this->beginWidget('EBootstrapCode', array(
	'collapse' => true,
	'htmlOptions' => array(
		'id' => 'ebootstraphero-example',
	),
)); ?>
$this->widget('EBootstrapHero', array(
	'headline' => EBootstrap::encode(Yii::app()->name),
	'body' => 'The aim of the project is to transform all <a href="http://twitter.github.com/bootstrap/">bootstrap</a> components into <a href="http://www.yiiframework.com/">Yii</a> Widgets and apply the bootstrap style to the default Yii Widgets.',
	'actions' => array(
		EBootstrap::ibutton('Primary Action', '#', 'primary', 'large'),
	),
));
<?php $this->endWidget(); ?>