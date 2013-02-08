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
				<input type="text" class='survey_textarea' hidden name="responder_name"/>
				<br/><br/>
				<br/><h3>Please answer the questions below</h3><br/>
			</div>
			
			<div class = "form_questions">
			<?php
			
			if (isset($model) && $model != NULL) {
				// $dataProvider = $model->searchQuestion();
				$dataProvider = Question::model()->findAll(NULL, NULL);
				
				if ($dataProvider != NULL && count($dataProvider) > 0) {
					
					foreach($dataProvider as $record) {
						$question_id = $record['id'];
						$question_name = $record['name'];
						$question_content = $record['content'];
						$answer_1 = $record['answer_1'];
						$answer_2 = $record['answer_2'];
						$answer_3 = $record['answer_3'];
						$answer_4 = $record['answer_4'];
						if ($question_name != "Last")
						{
							echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>$question_content</strong><br/><br/>";
							echo "<input type='radio'  name='$question_name' value='1'> $answer_1 <input type='radio'  name='$question_name' value='2'> $answer_2  <input type='radio'  name='$question_name' value='3'> $answer_3 <input type='radio'  name='$question_name' value='4'> $answer_4</br></br><br/>";
						}
						else
						{
							echo "&nbsp;&nbsp;&nbsp;&nbsp;<strong>$question_content</strong><br/><br/>";
							echo "<input name='star1' type='radio' class='star'/>";
							echo "<input name='star1' type='radio' class='star'/>";
							echo "<input name='star1' type='radio' class='star'/>";
							echo "<input name='star1' type='radio' class='star'/>";
							echo "<input name='star1' type='radio' class='star'/>";
							echo "<input type='text'  id='Last' name='$question_name' value='' hidden />";
							
						}
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
		</div>
	
	</form>
</p>
