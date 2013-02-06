<?php
/* @var $this SurveyController */

$this->breadcrumbs=array(
	'Survey',
);
?>
<h1><?php // echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	<?php // echo __FILE__; ?>
	
	<form id="form_survey" action="index.php?r=survey/submit" method="post" enctype="multipart/form-data">
	<!--<input type="hidden" name="r" value="survey/submit" />-->
	
		<div style='margin:0px 150px 100px 100px;'>
			<div style='text-align:center;'>
				<label>Your name :</label><br/>
				<input type="text" class='survey_textarea' name="responder_name"/>
				<br/><br/>
				<br/><h3>Please answer the questions below</h3><br/>
			</div>
			
			<?php
			
			if (isset($model) && $model != NULL) {
				// $dataProvider = $model->searchQuestion();
				$dataProvider = Question::model()->findAll(NULL, NULL);
				
				if ($dataProvider != NULL && count($dataProvider) > 0) {
					
					foreach($dataProvider as $record) {
						$question_id = $record['id'];
						$question_name = $record['name'];
						$question_content = $record['content'];
						
						echo "<strong>$question_name. </strong>$question_content<br/>";
						echo "<textarea class='survey_textarea' name='$question_id' form='form_survey' placeholder='Please enter your answer here'></textarea></br></br>";
					}
					
					?>
					
					<br/>
					
					<div style='text-align:center;'>
						<input type="submit" name="submit" value="Submit" style=""/>
					</div>
					
					<?php
				}
			}
			
			?>
		
		</div>
	
	</form>
</p>
