<?php
/* @var $this ProjectController */
/* @var $data Project */
?>

<div class="form_project">
	<div>
	<label>Project ID :</label> 
	<input type="text"  id="project_id" disabled <?php if($data!=NULL){?> value="<?php echo $data->project_id;}?>" /> 
	</div>
	<div>
	<label>Date Submited :</label> 
	<input type="text"  id="date_submit" disabled <?php if($data!=NULL){?> value="<?php echo $data->date_submit;}?>" /> 
	</div>
	<div>
	<label>What :</label> 
	<input type="text"  id="what_project" disabled <?php if($data!=NULL){?> value="<?php echo $data->what_project;}?>" /> 
	</div>
	<div>
	<label>Where :</label> 
	<input type="text"  id="where_project" disabled <?php if($data!=NULL){?> value="<?php echo $data->where_project;}?>" /> 
	</div>
	<div>
	<label>When :</label> 
	<input type="text"  id="when_project" disabled <?php if($data!=NULL){?> value="<?php echo $data->when_project;}?>" /> 
	</div>
	<div>
	<label>Client Name :</label> 
	<input type="text"  id="client_name" disabled <?php if($data!=NULL){?> value="<?php echo $data->client_name;}?>" /> 
	</div>
	<div>
	<label>Phone Number :</label> 
	<input type="text"  id="client_phone" disabled <?php if($data!=NULL){?> value="<?php echo $data->client_phone;}?>" /> 
	</div>
	<div>
	<label>Email :</label> 
	<input type="text"  id="client_email" disabled <?php if($data!=NULL){?> value="<?php echo $data->client_email;}?>" /> 
	</div>
	<div>
	<label>Admin Notes :</label> 
	<input type="text"  id="admin_note" disabled <?php if($data!=NULL){?> value="<?php echo $data->admin_note;}?>" /> 
	</div>
</div>
