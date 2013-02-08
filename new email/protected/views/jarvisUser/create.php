<?php
/* @var $this JarvisUserController */
/* @var $model JarvisUser */

$this->breadcrumbs=array(
	// 'Jarvis Users'=>array('index'),
	'Sign up',
);

$this->menu=array(
	// array('label'=>'List JarvisUser', 'url'=>array('index')),
	// array('label'=>'Manage JarvisUser', 'url'=>array('admin')),
);
?>

<h1 class="page_title">Register a new Jarvis account</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>