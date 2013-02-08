<?php

class ReportController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('getDetails'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','admin','delete'/*'create','update'*/),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Report;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Report']))
		{
			$model->attributes=$_POST['Report'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->report_id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Report']))
		{
			$model->attributes=$_POST['Report'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->report_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		// $dataProvider=new CActiveDataProvider('Report');
		// $this->render('index',array(
			// 'dataProvider'=>$dataProvider,
		// ));
		$model=new Report;
		$this->render('index',array(
			'model'=> $model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Report('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Report']))
			$model->attributes=$_GET['Report'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Report the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Report::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionGetDetails()
	{
		$question_name = "";
		
		if (isset($_POST["question_name"]) && $_POST["question_name"] != "") {
			$question_name = $_POST["question_name"];
		}
		$date_from = "";
		
		if (isset($_POST["date_from"]) && $_POST["date_from"] != "") {
			$date_from = $_POST["date_from"];
		}
		
		$date_to = "";
		
		if (isset($_POST["date_to"]) && $_POST["date_to"] != "") {
			$date_to = $_POST["date_to"];
		}
		if ($question_name != "" && $date_from != "" && $date_to != "")
		{
			if($question_name != "Last")
			{
			$command = Yii::app()->db->createCommand('SELECT count(*) as num FROM results WHERE question_name=:question_name and answer=:answer and date_submitted <= :date_to and date_submitted >= :date_from');
			$command->bindValue(":question_name", $question_name , PDO::PARAM_STR);
			$command->bindValue(":date_to", $date_to , PDO::PARAM_STR);
			$command->bindValue(":date_from", $date_from , PDO::PARAM_STR);
			
			$command->bindValue(":answer", "1" , PDO::PARAM_STR);						
			$results1 = $command->queryAll();
			$num1 = (int)$results1[0]["num"];
			
			
			
			$command->bindValue(":answer", "2" , PDO::PARAM_STR);
			$results2 = $command->queryAll();
			$num2 = (int)$results2[0]["num"];
			
			
			$command->bindValue(":answer", "3" , PDO::PARAM_STR);
			$results3 = $command->queryAll();
			$num3 = (int)$results3[0]["num"];
			
			$command->bindValue(":answer", "4" , PDO::PARAM_STR);
			$results4 = $command->queryAll();
			$num4 = (int)$results4[0]["num"];
			
			$sum = $num1 + $num2 + $num3 + $num4;
			$p1 = round(($num1/$sum)*100);
			$p2 = round(($num2/$sum)*100);
			$p3 = round(($num3/$sum)*100);
			$p4 = 100 - $p1 - $p2 - $p3;
			$question_array = Question::model()->findQuestionByName($question_name)->getData();
			//var_dump($question_array);
			
			foreach($question_array as $question) {
			$data = array(
				'question_content' => $question->getAttribute('content') ,
				'answer_1_name' => $question->getAttribute('answer_1') ,
				'answer_2_name' => $question->getAttribute('answer_2') ,
				'answer_3_name' => $question->getAttribute('answer_3') ,
				'answer_4_name' => $question->getAttribute('answer_4') ,
				'answer_1_num' =>  $p1 ,
				'answer_2_num' =>  $p2 ,
				'answer_3_num' =>  $p3 ,
				'answer_4_num' =>  $p4 ,

			);	
	
			}
			$this->renderPartial('_form1',array('data'=>$data,));
			}
			else
			{
				$command = Yii::app()->db->createCommand('SELECT count(*) as num FROM results WHERE question_name=:question_name and answer=:answer and date_submitted <= :date_to and date_submitted >= :date_from');
				$command->bindValue(":question_name", $question_name , PDO::PARAM_STR);
				$command->bindValue(":date_to", $date_to , PDO::PARAM_STR);
				$command->bindValue(":date_from", $date_from , PDO::PARAM_STR);
			
				$command->bindValue(":answer", "1" , PDO::PARAM_STR);						
				$results1 = $command->queryAll();
				$num1 = (int)$results1[0]["num"];
			
			
			
				$command->bindValue(":answer", "2" , PDO::PARAM_STR);
				$results2 = $command->queryAll();
				$num2 = (int)$results2[0]["num"];
			
			
				$command->bindValue(":answer", "3" , PDO::PARAM_STR);
				$results3 = $command->queryAll();
				$num3 = (int)$results3[0]["num"];
			
				$command->bindValue(":answer", "4" , PDO::PARAM_STR);
				$results4 = $command->queryAll();
				$num4 = (int)$results4[0]["num"];
				
				$command->bindValue(":answer", "5" , PDO::PARAM_STR);
				$results5 = $command->queryAll();
				$num5 = (int)$results5[0]["num"];
			
				$sum = $num1 + $num2 + $num3 + $num4 + $num5;
				$p1 = round(($num1/$sum)*100);
				$p2 = round(($num2/$sum)*100);
				$p3 = round(($num3/$sum)*100);
				$p4 = round(($num4/$sum)*100);
				$p5 = 100 - $p1 - $p2 - $p3 - $p4 ;
				$question_array = Question::model()->findQuestionByName($question_name)->getData();
				//var_dump($question_array);
			
				foreach($question_array as $question) {
					$data = array(
					'question_content' => $question->getAttribute('content') ,
					'answer_1_name' => $question->getAttribute('answer_1') ,
					'answer_2_name' => $question->getAttribute('answer_2') ,
					'answer_3_name' => $question->getAttribute('answer_3') ,
					'answer_4_name' => $question->getAttribute('answer_4') ,
					'answer_1_num' =>  $p1 ,
					'answer_2_num' =>  $p2 ,
					'answer_3_num' =>  $p3 ,
					'answer_4_num' =>  $p4 ,
					'answer_5_num' =>  $p5 ,
					);	
	
					}
				$this->renderPartial('_form2',array('data'=>$data,));
			
			
			}
		}
		else{
			$this->renderPartial('_form1',array('data'=>NULL,));
		}
		
	}
	/**
	 * Performs the AJAX validation.
	 * @param Report $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='report-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
