<?php
/* @var $this JarvisUserController */
/* @var $model JarvisUser */

$this->breadcrumbs=array(
	// 'Jarvis Users'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit Profile',
);

$this->menu=array(
	// array('label'=>'List JarvisUser', 'url'=>array('index')),
	// array('label'=>'Create JarvisUser', 'url'=>array('create')),
	// array('label'=>'View JarvisUser', 'url'=>array('view', 'id'=>$model->id)),
	// array('label'=>'Manage JarvisUser', 'url'=>array('admin')),
);
?>

<h1 class="page_title">Edit profile <?php //echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>