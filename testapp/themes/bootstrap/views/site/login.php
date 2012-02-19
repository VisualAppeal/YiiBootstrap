<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<div class="page-header">
	<h1>Login</h1>
</div>

<p>Please fill out the following form with your login credentials:</p>

<?php $form=$this->beginWidget('EBootstrapActiveForm', array(
	'id'=>'login-form',
)); ?>

	<?php echo $form->beginControlGroup($model, 'name'); ?>
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->beginControls(); ?>
			<?php echo $form->textField($model,'username'); ?>
			<?php echo $form->error($model,'username'); ?>
		<?php echo $form->endControls(); ?>
	<?php echo $form->endControlGroup(); ?>

	<?php echo $form->beginControlGroup($model, 'name'); ?>
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->beginControls(); ?>
			<?php echo $form->passwordField($model,'password'); ?>
			<?php echo $form->error($model,'password'); ?>
			<?php echo $form->helpBlock('Hint: You may login with <tt>demo/demo</tt> or <tt>admin/admin</tt>.'); ?>
		<?php echo $form->endControls(); ?>
	<?php echo $form->endControlGroup(); ?>

	<?php echo $form->beginControlGroup($model, 'name'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->beginControls(); ?>
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		<?php echo $form->endControls(); ?>
	<?php echo $form->endControlGroup(); ?>

	<?php echo $form->beginActions(); ?>
		<?php echo $form->submitButton('Login'); ?>
	<?php echo $form->endActions(); ?>

<?php $this->endWidget(); ?>

<?php 
$this->widget('EBootstrapCollapse', array(
	'sender' => 'a',
	'value' => 'Show Login Form Source',
	'valueToggle' => 'Hide Login Form Source',
	'htmlOptions' => array(
		'class' => 'btn source-toggle',
	),
	'target' => '#ebootstraplogin-example',
));
?>

<?php $this->beginWidget('EBootstrapCode', array(
	'collapse' => true,
	'htmlOptions' => array(
		'id' => 'ebootstraplogin-example',
	),
)); ?>
&lt;?php $form=$this->beginWidget('EBootstrapActiveForm', array(
	'id'=>'login-form',
)); ?&gt;

	&lt;?php echo $form->beginControlGroup($model, 'name'); ?&gt;
		&lt;?php echo $form->labelEx($model,'username'); ?&gt;
		&lt;?php echo $form->beginControls(); ?&gt;
			&lt;?php echo $form->textField($model,'username'); ?&gt;
			&lt;?php echo $form->error($model,'username'); ?&gt;
		&lt;?php echo $form->endControls(); ?&gt;
	&lt;?php echo $form->endControlGroup(); ?&gt;

	&lt;?php echo $form->beginControlGroup($model, 'name'); ?&gt;
		&lt;?php echo $form->labelEx($model,'password'); ?&gt;
		&lt;?php echo $form->beginControls(); ?&gt;
			&lt;?php echo $form->passwordField($model,'password'); ?&gt;
			&lt;?php echo $form->error($model,'password'); ?&gt;
			&lt;?php echo $form->helpBlock('Hint: You may login with <tt>demo/demo</tt> or <tt>admin/admin</tt>.'); ?&gt;
		&lt;?php echo $form->endControls(); ?&gt;
	&lt;?php echo $form->endControlGroup(); ?&gt;

	&lt;?php echo $form->beginControlGroup($model, 'name'); ?&gt;
		&lt;?php echo $form->label($model,'rememberMe'); ?&gt;
		&lt;?php echo $form->beginControls(); ?&gt;
			&lt;?php echo $form->checkBox($model,'rememberMe'); ?&gt;
			&lt;?php echo $form->error($model,'rememberMe'); ?&gt;
		&lt;?php echo $form->endControls(); ?&gt;
	&lt;?php echo $form->endControlGroup(); ?&gt;

	&lt;?php echo $form->beginActions(); ?&gt;
		&lt;?php echo $form->submitButton('Login'); ?&gt;
	&lt;?php echo $form->endActions(); ?&gt;

&lt;?php $this->endWidget(); ?&gt;
<?php $this->endWidget(); ?>