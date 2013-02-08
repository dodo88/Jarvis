<?php
/* @var $this AnswerSheetController */
/* @var $model AnswerSheet */

$this->breadcrumbs=array(
	'Answer Sheets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AnswerSheet', 'url'=>array('index')),
	array('label'=>'Manage AnswerSheet', 'url'=>array('admin')),
);
?>

<h1>Create AnswerSheet</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>