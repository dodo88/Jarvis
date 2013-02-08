<?php

class SurveyController extends Controller
{
	public function actionIndex()
	{
		$model=new Question('searchQuestion');
		$model->unsetAttributes();  // clear any default values
		
		if(isset($_GET['Question']))
			$model->attributes=$_GET['Question'];
		$this->render('index',array(
			'model'=> $model,
		));
	}

	public function actionSubmit()
	{
		$client_name = "";
		
		if (isset($_POST["responder_name"]) && $_POST["responder_name"] != "") {
			$client_name = $_POST["responder_name"];
		}
		
		foreach ($_POST as $key => $value) {
			$question_name = htmlspecialchars($key);
			$answer = htmlspecialchars($value);
			if (($key != "submit") && ($key != "responder_name") && ($key != "star1")){
			$result = new Result;
			$result->client_name = $client_name;
			$result->date_submitted = date("Y-m-d");
			$result->question_name = $question_name;
			$result->answer = $answer;
			$result->save();
			}
		}
		$this->render('submit',array(
			'answer_content'=>"",
		));
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