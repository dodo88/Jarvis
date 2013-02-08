<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="form_question">
	<div class="form_row">
	<label>Name :</label> 
	<input type="text"  id="name" disabled <?php if($data!=NULL){?> value="<?php echo $data->name;}?>" /> 
	</div>
	<div class="form_row">
	<label>Answer 1 :</label> 
	<input type="text"  id="answer_1" disabled <?php if($data!=NULL){?> value="<?php echo $data->answer_1;}?>" /> 
	</div>
	<div class="form_row">
	<label>Answer 2 :</label> 
	<input type="text"  id="answer_2" disabled <?php if($data!=NULL){?> value="<?php echo $data->answer_2;}?>" /> 
	</div>
	<div class="form_row">
	<label>Answer 3 :</label> 
	<input type="text"  id="answer_3" disabled <?php if($data!=NULL){?> value="<?php echo $data->answer_3;}?>" /> 
	</div>
	<div class="form_row">
	<label>Answer 4 :</label> 
	<input type="text"  id="answer_4" disabled <?php if($data!=NULL){?> value="<?php echo $data->answer_4;}?>" /> 
	</div>
	<div class="form_row_area">
	<label>Content :</label> 
	<textarea  id="question_content" disabled ><?php if($data!=NULL){echo $data->content;}?></textarea>
	</div>
</div>
