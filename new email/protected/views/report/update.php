<?php
/* @var $this ReportController */
/* @var $model Report */

$this->breadcrumbs=array(
	'Reports'=>array('index'),
	$model->report_id=>array('view','id'=>$model->report_id),
	'Update',
);

$this->menu=array(
	// array('label'=>'List Report', 'url'=>array('index')),
	// array('label'=>'Create Report', 'url'=>array('create')),
	array('label'=>'View Report', 'url'=>array('view', 'id'=>$model->report_id)),
	array('label'=>'Manage Report', 'url'=>array('admin')),
);
?>

<h1>Update Report <?php echo $model->report_id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>