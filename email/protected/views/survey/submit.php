<?php
/* @var $this SurveyController */

$this->breadcrumbs=array(
	'Survey'=>array('/survey'),
	'Submit',
);
?>
<h1>Thank you very much. Your answers has been saved.<?php //echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	<?php // echo __FILE__; ?>
	
	
	
	<form id="survey_confirm" action="index.php" method="post" enctype="multipart/form-data">
		
		<textarea name="content" width="500" height="100" readonly="readonly"><?php	echo $answer_content; ?></textarea><br/><br/>
		
		<!--<input type="submit" value="OK"/>-->
	</form>
</p>
