<?php
/* @var $this ProjectController */
/* @var $data Project */

?>

<div class="form_info">
	<div class="form_row">
	<label>Question :</label> 
	<input type="text"  name="question_content" id="question_content"  disabled <?php if($data!=NULL){?> value="<?php echo $data['question_content'];}?>" /> 
	</div>
	<div class="form_row">
	<label>Answer </label> 
	</div>
	<div class="form_row_det">
	<label><?php if($data!=NULL){?> <?php echo $data['answer_1_name'];}?> :</label> 
	<input type="text"  name="answer_1_num" id="answer_1_num" disabled <?php if($data!=NULL){?> value="<?php echo $data['answer_1_num'];}?> %" /> 
	</div>
	</br>
	<div class="form_row_det">
	<label><?php if($data!=NULL){?> <?php echo $data['answer_2_name'];}?> :</label> 
	<input type="text"  name="answer_2_num" id="answer_2_num" disabled <?php if($data!=NULL){?> value="<?php echo $data['answer_2_num'];}?> %" /> 
	</div>
	</br>
	<div class="form_row_det">
	<label><?php if($data!=NULL){?> <?php echo $data['answer_3_name'];}?> :</label> 
	<input type="text"  name="answer_3_num" id="answer_3_num" disabled <?php if($data!=NULL){?> value="<?php echo $data['answer_3_num'];}?> %"  /> 
	</div>
	</br>
	<div class="form_row_det">
	<label><?php if($data!=NULL){?> <?php echo $data['answer_4_name'];}?> :</label> 
	<input type="text"  name="answer_4_num" id="answer_4_num" disabled <?php if($data!=NULL){?> value="<?php echo $data['answer_4_num'];}?> %" /> 
	</div>
</div>
