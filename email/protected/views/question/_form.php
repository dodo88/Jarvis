<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="form_question">
	<div class="form_row">
	<label>Name :</label> 
	<input type="text"  id="name" disabled <?php if($data!=NULL){?> value="<?php echo $data->name;}?>" /> 
	</div>
	
	<div class="form_row_area">
	<label>Content :</label> 
	<textarea  id="question_content" disabled ><?php if($data!=NULL){echo $data->content;}?></textarea>
	</div>
</div>
