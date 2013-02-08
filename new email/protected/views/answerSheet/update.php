<?php
/* @var $this AnswerSheetController */
/* @var $model AnswerSheet */

$this->breadcrumbs=array(
	'Answer Sheets'=>array('index'),
	$model->answer_sheet_id=>array('view','id'=>$model->answer_sheet_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List AnswerSheet', 'url'=>array('index')),
	array('label'=>'Create AnswerSheet', 'url'=>array('create')),
	array('label'=>'View AnswerSheet', 'url'=>array('view', 'id'=>$model->answer_sheet_id)),
	array('label'=>'Manage AnswerSheet', 'url'=>array('admin')),
);
?>

<h1>Update AnswerSheet <?php echo $model->answer_sheet_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>