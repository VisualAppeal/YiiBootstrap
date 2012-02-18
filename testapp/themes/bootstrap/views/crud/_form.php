<?php $form=$this->beginWidget('EBootstrapActiveForm', array(
	'id'=>'crud-form',
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->beginControlGroup($model, 'title'); ?>
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->beginControls(); ?>
			<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'title'); ?>
		<?php echo $form->endControls(); ?>
	<?php echo $form->endControlGroup(); ?>

	<?php echo $form->beginControlGroup($model, 'title'); ?>
		<?php echo $form->labelEx($model,'date_created'); ?>
		<?php echo $form->beginControls(); ?>
			<?php echo $form->textArea($model,'date_created',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'date_created'); ?>
		<?php echo $form->endControls(); ?>
	<?php echo $form->endControlGroup(); ?>

	<?php echo $form->beginControlGroup($model, 'title'); ?>
		<?php echo $form->labelEx($model,'date_updated'); ?>
		<?php echo $form->beginControls(); ?>
			<?php echo $form->textArea($model,'date_updated',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'date_updated'); ?>
		<?php echo $form->endControls(); ?>
	<?php echo $form->endControlGroup(); ?>

	<?php echo $form->beginActions(); ?>
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	<?php echo $form->endActions(); ?>

<?php $this->endWidget(); ?>