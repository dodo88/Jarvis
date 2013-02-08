<?php
/* @var $this AnswerSheetController */
/* @var $model AnswerSheet */

$this->breadcrumbs=array(
	'Answer Sheets'=>array('index'),
	$model->answer_sheet_id,
);

$this->menu=array(
	array('label'=>'List AnswerSheet', 'url'=>array('index')),
	array('label'=>'Create AnswerSheet', 'url'=>array('create')),
	array('label'=>'Update AnswerSheet', 'url'=>array('update', 'id'=>$model->answer_sheet_id)),
	array('label'=>'Delete AnswerSheet', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->answer_sheet_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AnswerSheet', 'url'=>array('admin')),
);
?>

<h1>View AnswerSheet #<?php echo $model->answer_sheet_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'answer_sheet_id',
		'date_submitted',
		'responder_name',
	),
)); ?>
