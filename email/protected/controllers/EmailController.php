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
		$acceptable_extensions[0] = "png";
		$acceptable_extensions[1] = "jpg";
		$acceptable_extensions[2] = "gif";
		$acceptable_extensions[3] = "jpeg";
		$acceptable_extensions[4] = "JPG";
		$acceptable_extensions[5] = "GIF";
		$acceptable_extensions[6] = "PNG";
		$acceptable_extensions[7] = "JPEG";
		$taille_maxi = 100000;
		$model=Email::model()->findByPk($_POST['id']);
		$model->setAttribute('add_from',$_POST['add_from']);
		$model->setAttribute('subject',$_POST['subject']);
		$model->setAttribute('email_content',$_POST['email_content']);
		$model->setAttribute('contact_info',$_POST['contact_info']);
		$model->setAttribute('website',$_POST['website']);
		$model->setAttribute('facebook',$_POST['facebook']);
		$model->setAttribute('survey',$_POST['survey']);
		
		$validated = 1;
		if($_FILES && $_FILES['logo_template']['name']){
            
		//make sure the file has a valid file extension
    
		$file_info = pathinfo($_FILES['logo_template']['name']);
		$acceptable_ext = 0;
		for($x = 0; $x < count($acceptable_extensions); $x++){
                    
			if($file_info['extension'] == $acceptable_extensions[$x]){
			$acceptable_ext = 1;
                        
			}
		}
                
		if(!$acceptable_ext){
			$validated = 0;
		}   
		}else{
			$validated = 0;
		}
		if($validated){
			$fileName = $_FILES['logo_template']['name'];
			$tmpName  = $_FILES['logo_template']['tmp_name'];
			$fileSize = $_FILES['logo_template']['size'];
			$fileType = $_FILES['logo_template']['type'];
			$fp = fopen($tmpName, 'r');
			$content = fread($fp, filesize($tmpName));
			$content = addslashes($content);
			fclose($fp);
			if(!get_magic_quotes_gpc()){
				$fileName = addslashes($fileName);
			}
			$file_info = pathinfo($_FILES['logo_template']['name']);
			$model->setAttribute('logo_type',$file_info['extension']);
			$model->setAttribute('logo',$content);
		}
		
		if($_FILES && $_FILES['background_template']['name']){
            
		//make sure the file has a valid file extension
    
		$file_info = pathinfo($_FILES['background_template']['name']);
		$acceptable_ext = 0;
		for($x = 0; $x < count($acceptable_extensions); $x++){
                    
			if($file_info['extension'] == $acceptable_extensions[$x]){
			$acceptable_ext = 1;
                        
			}
		}
                
		if(!$acceptable_ext){
			$validated = 0;
		}   
		}else{
			$validated = 0;
		}
		if($validated){
			$fileName = $_FILES['background_template']['name'];
			$tmpName  = $_FILES['background_template']['tmp_name'];
			$fileSize = $_FILES['background_template']['size'];
			$fileType = $_FILES['background_template']['type'];
			$fp = fopen($tmpName, 'r');
			$content = fread($fp, filesize($tmpName));
			$content = addslashes($content);
			fclose($fp);
			if(!get_magic_quotes_gpc()){
				$fileName = addslashes($fileName);
			}
			$file_info = pathinfo($_FILES['background_template']['name']);
			$model->setAttribute('background_type',$file_info['extension']);
			$model->setAttribute('background',$content);
		}
		
		if($_FILES && $_FILES['header_template']['name']){
            
		//make sure the file has a valid file extension
    
		$file_info = pathinfo($_FILES['header_template']['name']);
		$acceptable_ext = 0;
		for($x = 0; $x < count($acceptable_extensions); $x++){
                    
			if($file_info['extension'] == $acceptable_extensions[$x]){
			$acceptable_ext = 1;
                        
			}
		}
                
		if(!$acceptable_ext){
			$validated = 0;
		}   
		}else{
			$validated = 0;
		}
		if($validated){
			$fileName = $_FILES['header_template']['name'];
			$tmpName  = $_FILES['header_template']['tmp_name'];
			$fileSize = $_FILES['header_template']['size'];
			$fileType = $_FILES['header_template']['type'];
			$fp = fopen($tmpName, 'r');
			$content = fread($fp, filesize($tmpName));
			$content = addslashes($content);
			fclose($fp);
			if(!get_magic_quotes_gpc()){
				$fileName = addslashes($fileName);
			}
			$file_info = pathinfo($_FILES['header_template']['name']);
			$model->setAttribute('header_type',$file_info['extension']);
			$model->setAttribute('header',$content);
		}
		if($_FILES && $_FILES['footer_template']['name']){
            
		//make sure the file has a valid file extension
    
		$file_info = pathinfo($_FILES['footer_template']['name']);
		$acceptable_ext = 0;
		for($x = 0; $x < count($acceptable_extensions); $x++){
                    
			if($file_info['extension'] == $acceptable_extensions[$x]){
			$acceptable_ext = 1;
                        
			}
		}
                
		if(!$acceptable_ext){
			$validated = 0;
		}   
		}else{
			$validated = 0;
		}
		if($validated){
			$fileName = $_FILES['footer_template']['name'];
			$tmpName  = $_FILES['footer_template']['tmp_name'];
			$fileSize = $_FILES['footer_template']['size'];
			$fileType = $_FILES['footer_template']['type'];
			$fp = fopen($tmpName, 'r');
			$content = fread($fp, filesize($tmpName));
			$content = addslashes($content);
			fclose($fp);
			if(!get_magic_quotes_gpc()){
				$fileName = addslashes($fileName);
			}
			$file_info = pathinfo($_FILES['footer_template']['name']);
			$model->setAttribute('footer_type',$file_info['extension']);
			$model->setAttribute('footer',$content);
		}
		$model->save();
		$this->render('index',array('data' => $model,false));
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