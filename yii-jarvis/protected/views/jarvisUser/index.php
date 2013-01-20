<?php
/* @var $this JarvisUserController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Jarvis Users',
);

$this->menu=array(
	array('label'=>'Create JarvisUser', 'url'=>array('create')),
	array('label'=>'Manage JarvisUser', 'url'=>array('admin')),
);
?>

<h1>Jarvis Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
