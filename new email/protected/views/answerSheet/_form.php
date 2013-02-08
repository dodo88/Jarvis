<?php
/* @var $this AnswerSheetController */
/* @var $model AnswerSheet */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'answer-sheet-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date_submitted'); ?>
		<?php echo $form->textField($model,'date_submitted'); ?>
		<?php echo $form->error($model,'date_submitted'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'responder_name'); ?>
		<?php echo $form->textField($model,'responder_name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'responder_name'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->