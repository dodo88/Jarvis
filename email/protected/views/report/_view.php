<?php
/* @var $this ReportController */
/* @var $data Report */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('report_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->report_id), array('view', 'id'=>$data->report_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('responder_name')); ?>:</b>
	<?php echo CHtml::encode($data->responder_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_submitted')); ?>:</b>
	<?php echo CHtml::encode($data->date_submitted); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('content')); ?>:</b>
	<?php echo CHtml::encode($data->content); ?>
	<br />


</div>