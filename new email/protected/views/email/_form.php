<?php
/* @var $this ProjectController */
/* @var $data Project */

?>
<div class="form_template">
<div class="template1">
<div class="form_question">
	<div class="form_row">
	<label>Address From :</label> 
	<input type="text"  name="add_from" id="add_from"  <?php if($data!=NULL){?> value="<?php echo $data->add_from;}?>" /> 
	</div>
	<div class="form_row">
	<label>Subject :</label> 
	<input type="text"  name="subject" id="subject"  <?php if($data!=NULL){?> value="<?php echo $data->subject;}?>" /> 
	</div>
	<div class="form_row">
	<label>Website Link :</label> 
	<input type="text"  name="website" id="website"  <?php if($data!=NULL){?> value="<?php echo $data->website;}?>" /> 
	</div>
	<div class="form_row">
	<label>Facebook Link :</label> 
	<input type="text"  name="facebook" id="facebook"  <?php if($data!=NULL){?> value="<?php echo $data->facebook;}?>" /> 
	</div>
	<div class="form_row">
	<label>Survey Link :</label> 
	<input type="text"  name="survey" id="survey"  <?php if($data!=NULL){?> value="<?php echo $data->survey;}?>" /> 
	</div>
	<div class="form_row_area">
	<label>Content :</label> 
	<textarea  name="email_content" id="email_content"  ><?php if($data!=NULL){echo $data->content;}?></textarea>
	</div>
</div>
</div>
<div class="template2">
<div class="form_question">
	<div class="form_row">
	<label>Logo :</label> 
	<input type="file" name="logo_template" id="logo_template">
	</div>
	<br>
	<div class="form_row">
	<label>BackGround :</label> 
	<input type="file" name="background_template" id="background_template">
	</div>
	<div class="form_row">
	<label>Header :</label> 
	<input type="file" name="header_template" id="header_template">
	</div>
	<div class="form_row">
	<label>Footer :</label> 
	<input type="file" name="footer_template" id="footer_template">
	</div>
	<div class="form_row_area">
	<label>Contact Info :</label> 
	<textarea  name="contact_info" id="contact_info"  ><?php if($data!=NULL){echo $data->contact_info;}?></textarea>
	</div>
</div>
</div>
</div>