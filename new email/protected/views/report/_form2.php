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
	<label>1 star :</label> 
	<input type="text"  name="answer_1_num" id="answer_1_num" disabled <?php if($data!=NULL){?> value="<?php echo $data['answer_1_num'];}?> %" /> 
	</div>
	</br>
	<div class="form_row_det">
	<label>2 stars :</label> 
	<input type="text"  name="answer_2_num" id="answer_2_num" disabled <?php if($data!=NULL){?> value="<?php echo $data['answer_2_num'];}?> %" /> 
	</div>
	</br>
	<div class="form_row_det">
	<label>3 stars :</label> 
	<input type="text"  name="answer_3_num" id="answer_3_num" disabled <?php if($data!=NULL){?> value="<?php echo $data['answer_3_num'];}?> %"  /> 
	</div>
	</br>
	<div class="form_row_det">
	<label>4 stars :</label> 
	<input type="text"  name="answer_4_num" id="answer_4_num" disabled <?php if($data!=NULL){?> value="<?php echo $data['answer_4_num'];}?> %" /> 
	</div>
	</br>
	<div class="form_row_det">
	<label>5 stars :</label> 
	<input type="text"  name="answer_5_num" id="answer_5_num" disabled <?php if($data!=NULL){?> value="<?php echo $data['answer_5_num'];}?> %" /> 
	</div>
</div>
