
	<div id="label_list_question">
		<p>Email Template</p>
	</div>
	<br>
	<form id="email_template" action="" method="post" enctype="multipart/form-data">
	<input type="radio" id="radio1" name="id" value="1"> New Client <br>
	<input type="radio" id="radio2" name="id" value="2"> Repeated Client <br>
	<br>
	<hr>
	<br>
	<div id="template_details">
	   <?php $this->renderPartial('_form', array('data'=>$data)); ?>
		
	</div>
	<input type="button"  id="save_template"  value="Save" disabled class="button_edit_question"  /> 
	</form>