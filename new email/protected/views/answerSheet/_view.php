<?php
/* @var $this AnswerSheetController */
/* @var $data AnswerSheet */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('answer_sheet_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->answer_sheet_id), array('view', 'id'=>$data->answer_sheet_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_submitted')); ?>:</b>
	<?php echo CHtml::encode($data->date_submitted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responder_name')); ?>:</b>
	<?php echo CHtml::encode($data->responder_name); ?>
	<br />


</div>