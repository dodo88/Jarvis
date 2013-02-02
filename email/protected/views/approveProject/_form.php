<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="form_project">
	<div class="form_row">
	<label>Project ID :</label> 
	<input type="text"  id="project_id" disabled <?php if($data!=NULL){?> value="<?php echo $data->project_id;}?>" /> 
	</div>
	<div class="form_row">
	<label>Date Submited :</label>
	<input type="text"  id="date_submit" disabled <?php if($data!=NULL){?> value="<?php echo $data->date_submit;}?>" />
	</div >	
	<hr>
	
	<div class="form_row_area">
	<label>What :</label> 
	<textarea  id="what_project" disabled ><?php if($data!=NULL){echo $data->what_project;}?></textarea>
	</div>
	<div class="form_row">
	<label>Where :</label> 
	<input type="text"  id="where_project" disabled <?php if($data!=NULL){?> value="<?php echo $data->where_project;}?>" /> 
	</div>
	<div class="form_row">
	<label>When :</label> 
	<input type="text"  id="when_project" disabled <?php if($data!=NULL){?> value="<?php echo $data->when_project;}?>" /> 
	</div>
	
	<hr>
	
	<div class="form_row">
	<label>Client Name :</label> 
	<input type="text"  id="client_name" disabled <?php if($data!=NULL){?> value="<?php echo $data->client_name;}?>" /> 
	</div>
	<div class="form_row">
	<label>Phone Number :</label> 
	<input type="text"  id="client_phone" disabled <?php if($data!=NULL){?> value="<?php echo $data->client_phone;}?>" /> 
	</div>
	<div class="form_row">
	<label>Email :</label> 
	<input type="text"  id="client_email" disabled <?php if($data!=NULL){?> value="<?php echo $data->client_email;}?>" /> 
	</div>
	
	<hr>
	
	<div class="form_row_area">
	<label>Admin Notes :</label> 
	<textarea  id="admin_note" disabled><?php if($data!=NULL){echo $data->admin_note;}?></textarea>
	</div>
</div>
