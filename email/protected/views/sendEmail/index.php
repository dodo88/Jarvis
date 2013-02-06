
	<div id="label_list_question">
		<?php
		
		if (isset($email_sent) && $email_sent == "ok") {
			echo "<p>Your email has been sent</p>";
		} else {
			echo "<p>Send Email</p>";
		}
		
		?>
		
	</div>
	
<form id="form_send_email" action="index.php?r=sendEmail/index" method="post" enctype="multipart/form-data">
	<div class="form_send_email">
		<div class="form_row_radio">
		<div class="sexe">
		<input type="radio" id="radiomr" name="sexe" value="Mr" checked> Mr 
		<input type="radio" id="radiomrs" name="sexe" value="Mrs" > Mrs <br>
		</div>
		</div>
		<div class="form_row">
		<label>Client Name :</label> 
		<input type="text" name="client_name" id="client_name"/> 
		</div>
		<div class="form_row">
		<label>Patient Name :</label> 
		<input type="text"  name="patient_name" id="patient_name"/> 
		</div>
		<div class="form_row">
		<label>Date :</label> 
		<input type="date"  name="date" id="date"/> 
		</div>
		<br>
		<div class="form_row">
		<label>Email :</label> 
		<input type="text" name="client_email" id="client_email"/> 
		</div>
		<div class="form_row_radio">
		<div class="type_client">
		<input type="radio" id="radio1" name="id" value="1" checked> New Client 
		<input type="radio" id="radio2" name="id" value="2" > Repeated Client <br>
		</div>
		</div>
		<input type="submit" id="send_email" name="send_email" value="Send Email"  class="button_edit_question"  />		 
	</div>
</form>