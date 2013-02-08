<?php
/* @var $this AnswerSheetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Answer Sheets',
);

$this->menu=array(
	array('label'=>'Create AnswerSheet', 'url'=>array('create')),
	array('label'=>'Manage AnswerSheet', 'url'=>array('admin')),
);
?>

<h1>Answer Sheets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
