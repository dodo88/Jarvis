<?php

class EmailController extends Controller
{
	public function accessRules()
	{
		return array(
			// array('allow',  // allow all users to perform 'index' and 'view' actions
			//	'actions'=>array(),
			//	'users'=>array('*'),
			//),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','indexPartial','editPartial','validateProject','getTemplate','saveTemplate'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionGetTemplate()
	{
		$model=Email::model()->findByPk($_POST['id']);
		$this->renderPartial('_form',array('data' => $model,false));
	}
	public function actionSaveTemplate()
	{
		$taille_maxi = 100000;
		$model=Email::model()->findByPk($_POST['id']);
		$model->setAttribute('add_from',$_POST['add_from']);
		$model->setAttribute('subject',$_POST['subject']);
		$model->setAttribute('email_content',$_POST['email_content']);
		$model->setAttribute('contact_info',$_POST['contact_info']);
		$model->setAttribute('website',$_POST['website']);
		$model->setAttribute('facebook',$_POST['facebook']);
		$model->setAttribute('survey',$_POST['survey']);
		/*
		if(isset($_FILES['logo_template']))
{ 		{
			$taille = filesize($_FILES['logo_template']);
		}
		*/
		$model->save();
		$this->renderPartial('_form',array('data' => $model,false));
	}
	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}