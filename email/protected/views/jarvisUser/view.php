<?php
/* @var $this JarvisUserController */
/* @var $model JarvisUser */

$this->breadcrumbs=array(
	'Jarvis Users'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JarvisUser', 'url'=>array('index')),
	array('label'=>'Create JarvisUser', 'url'=>array('create')),
	array('label'=>'Update JarvisUser', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JarvisUser', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JarvisUser', 'url'=>array('admin')),
);
?>

<h1>View JarvisUser #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'first_name',
		'last_name',
		'email_address',
		'address',
		'password',
	),
)); ?>
