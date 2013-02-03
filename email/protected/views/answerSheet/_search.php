<?php
/* @var $this AnswerSheetController */
/* @var $model AnswerSheet */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'answer_sheet_id'); ?>
		<?php echo $form->textField($model,'answer_sheet_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_submitted'); ?>
		<?php echo $form->textField($model,'date_submitted'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'responder_name'); ?>
		<?php echo $form->textField($model,'responder_name',array('size'=>60,'maxlength'=>256)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->