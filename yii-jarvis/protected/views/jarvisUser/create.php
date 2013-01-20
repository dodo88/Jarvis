<?php
/* @var $this JarvisUserController */
/* @var $model JarvisUser */

$this->breadcrumbs=array(
	'Jarvis Users'=>array('index'),
	'Create',
);

$this->menu=array(
	// array('label'=>'List JarvisUser', 'url'=>array('index')),
	// array('label'=>'Manage JarvisUser', 'url'=>array('admin')),
);
?>

<h1>Create JarvisUser</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>