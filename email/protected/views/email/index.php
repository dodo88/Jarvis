
	<div id="label_list_question">
		<p>Email Template</p>
	</div>
	<br>
	<form id="email_template" action="index.php?r=email/saveTemplate" method="post" enctype="multipart/form-data">
	<input type="radio" id="radio1" name="id" value="1" <?php if ($data!=NULL && $data->id ==1){echo "checked";}?>  > New Client <br>
	<input type="radio" id="radio2" name="id" value="2" <?php if ($data!=NULL && $data->id ==2){echo "checked";}?> > Repeated Client <br>
	<br>
	<hr>
	<br>
	<div id="template_details">
	   <?php $this->renderPartial('_form', array('data'=>$data)); ?>
		
	</div>
	<input type="submit" id="save_template"  value="Save" disabled class="button_edit_question">
	</form>