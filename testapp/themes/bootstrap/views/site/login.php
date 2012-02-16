<?php
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<p>Please fill out the following form with your login credentials:</p>

<div class="form">
<?php $form=$this->beginWidget('EBootstrapActiveForm', array(
	'id'=>'login-form',
	/*'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),*/
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

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
</div><!-- form -->
