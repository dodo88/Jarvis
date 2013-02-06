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
		$answer_content = "";
		
		if (isset($_POST["responder_name"]) && $_POST["responder_name"] != "") {
			$answer_content .= "Answered by " . $_POST["responder_name"] . "on " . date("F d, Y") . "\n\n";
		}
		
		foreach ($_POST as $key => $value) {
			$question_id = htmlspecialchars($key);
			$answer = htmlspecialchars($value);
			
			if (is_numeric($question_id)) {
				$question = Question::model()->findByPk($question_id);
				
				if ($question != NULL) {
					$question_name = $question["name"];
					$question_content = $question["content"];
					
					$answer_content .= "$question_name. $question_content\n$answer\n\n";
				}
			}
		}
		
		$report = new Report;
		$report->responder_name = "";
		
		if (isset($_POST["responder_name"]) && $_POST["responder_name"] != "") {
			$report->responder_name = $_POST["responder_name"];
		}
		
		$report->content = $answer_content;
		$report->date_submitted = date("Y-m-d");
		$report->save();
	
		$this->render('submit',array(
			'answer_content'=>$answer_content,
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