<?php $this->pageTitle=Yii::app()->name; ?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>This Framework is using some extra software:</p>

<ul>
	<li><a href="http://www.yiiframework.com/">Yii</a> (1.1.10)</li>
	<li><a href="http://twitter.github.com/bootstrap/">Twitter Bootstrap</a> of course (2.0.0)</li>
	<li><a href="http://www.yiiframework.com/extension/less/">Yii less extension</a> (0.9)</li>
</ul>

<p>We will use some <a href="http://dev.w3.org/html5/spec/Overview.html">HTML5</a> Elements and <a href="http://www.w3.org/Style/CSS/specs">CSS3</a>.</p>

<h2>Button Links</h2>
<h3>Different Action Types</h3>
<p>
	<?php $this->widget('EBootstrapButton', array('text' => 'Default', 'url' => '#')); ?> 
	<?php $this->widget('EBootstrapButton', array('text' => 'Primary', 'url' => '#', 'type' => 'primary')); ?> 
	<?php $this->widget('EBootstrapButton', array('text' => 'Info', 'url' => '#', 'type' => 'info')); ?> 
	<?php $this->widget('EBootstrapButton', array('text' => 'Success', 'url' => '#', 'type' => 'success')); ?> 
	<?php $this->widget('EBootstrapButton', array('text' => 'Warning', 'url' => '#', 'type' => 'warning')); ?> 
	<?php $this->widget('EBootstrapButton', array('text' => 'Danger', 'url' => '#', 'type' => 'danger')); ?> 
	<?php $this->widget('EBootstrapButton', array('text' => 'Inverse', 'url' => '#', 'type' => 'inverse')); ?>
</p>

<h3>Sizes</h3>
<p>
	<?php $this->widget('EBootstrapButton', array('text' => 'Primary large', 'url' => '#', 'type' => 'primary', 'size' => 'large')); ?>
	<?php $this->widget('EBootstrapButton', array('text' => 'Primary', 'url' => '#', 'type' => 'primary')); ?>
	<?php $this->widget('EBootstrapButton', array('text' => 'Primary small', 'url' => '#', 'type' => 'primary', 'size' => 'small')); ?>
</p>

<h3>Disabled</h3>
<p>
	<?php $this->widget('EBootstrapButton', array('text' => 'Disabled', 'url' => '#', 'type' => 'primary', 'size' => 'large', 'disabled' => true)); ?>
	<?php $this->widget('EBootstrapButton', array('text' => 'Disabled', 'url' => '#', 'disabled' => true)); ?>
</p>

<h3>Icons</h3>
<p>
	<?php $this->widget('EBootstrapButton', array('text' => 'Refresh', 'url' => '#', 'icon' => 'refresh')); ?>
	<?php $this->widget('EBootstrapButton', array('text' => 'Checkout', 'url' => '#', 'type' => 'success', 'icon' => 'shopping-cart', 'iconWhite' => true)); ?>
	<?php $this->widget('EBootstrapButton', array('text' => 'Delete', 'url' => '#', 'type' => 'danger', 'icon' => 'trash', 'iconWhite' => true)); ?>
</p>