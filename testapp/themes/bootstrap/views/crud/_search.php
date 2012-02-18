<?php $form=$this->beginWidget('EBootstrapActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->beginControlGroup($model, 'id'); ?>
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->beginControls(); ?>
			<?php echo $form->textField($model,'id',array('class' => 'span1')); ?>
		<?php echo $form->endControls(); ?>
	<?php echo $form->endControlGroup(); ?>

	<?php echo $form->beginControlGroup($model, 'title'); ?>
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->beginControls(); ?>
			<?php echo $form->textField($model,'title',array('class' => 'span5')); ?>
		<?php echo $form->endControls(); ?>
	<?php echo $form->endControlGroup(); ?>

	<?php echo $form->beginControlGroup($model, 'title'); ?>
		<?php echo $form->labelEx($model,'date_created'); ?>
		<?php echo $form->beginControls(); ?>
			<?php echo $form->textField($model,'title',array('class' => 'span5')); ?>
		<?php echo $form->endControls(); ?>
	<?php echo $form->endControlGroup(); ?>

	<?php echo $form->beginControlGroup($model, 'title'); ?>
		<?php echo $form->labelEx($model,'date_updated'); ?>
		<?php echo $form->beginControls(); ?>
			<?php echo $form->textField($model,'title',array('class' => 'span5')); ?>
		<?php echo $form->endControls(); ?>
	<?php echo $form->endControlGroup(); ?>

	<?php echo $form->beginActions(); ?>
		<?php echo $form->submitButton('Search'); ?>
	<?php echo $form->endActions(); ?>

<?php $this->endWidget(); ?>