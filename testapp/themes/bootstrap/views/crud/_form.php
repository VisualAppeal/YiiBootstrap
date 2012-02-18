<?php $form=$this->beginWidget('EBootstrapActiveForm', array(
	'id'=>'crud-form',
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->beginControlGroup($model, 'title'); ?>
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->beginControls(); ?>
			<?php echo $form->textField($model,'title',array('class' => 'span7')); ?>
			<?php echo $form->error($model,'title'); ?>
		<?php echo $form->endControls(); ?>
	<?php echo $form->endControlGroup(); ?>

	<?php echo $form->beginActions(); ?>
		<?php echo $form->submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	<?php echo $form->endActions(); ?>

<?php $this->endWidget(); ?>