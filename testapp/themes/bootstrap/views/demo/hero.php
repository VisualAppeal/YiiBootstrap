<?php 
$this->widget('EBootstrapHero', array(
	'headline' => CHtml::encode(Yii::app()->name),
	'body' => 'The aim of the project is to transform all <a href="http://twitter.github.com/bootstrap/">bootstrap</a> components into <a href="http://www.yiiframework.com/">Yii</a> Widgets and apply the bootstrap style to the default Yii Widgets.',
	'actions' => array(
		EBootstrap::ibutton('Primary Action', '#', 'primary', 'large'),
	),
));
?>