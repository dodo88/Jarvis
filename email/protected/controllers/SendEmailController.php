<?php

require("class.phpmailer.php");

class SendEmailController extends Controller
{
	public function accessRules()
	{
		return array(
			// array('allow',  // allow all users to perform 'index' and 'view' actions
			//	'actions'=>array(),
			//	'users'=>array('*'),
			//),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','indexPartial','editPartial','validateProject','getTemplate','saveTemplate'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	private function sendEmail($from, $to, $subject, $content) {
		$mail = new PHPMailer();
		 
		$mail->IsSMTP(); 
		$mail->SMTPDebug = 1;
		$mail->SMTPSecure = "ssl"; // set mailer to use SMTP
		$mail->Host = "smtp.gmail.com"; // specify main and backup server
		$mail->Port = 465; 
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "sonhuytran@gmail.com"; // SMTP username
		$mail->Password = "lAvITAebELLA1177@"; // SMTP password
		 
		$mail->From = $from;
		$mail->FromName = "info@coastalcatclinicpacifica.com";
		$mail->AddAddress($to);
		
		$mail->IsHTML(true);
		$mail->Subject = $subject;
		$mail->Body = $content;
		
		return $mail->Send();
	}
	
	public function actionIndex()
	{
		$email_sent = "notok";
		$email_content = "";
		
		if (isset($_POST["send_email"])) {
			$type_client = $_POST["id"];
			$sexe = $_POST["sexe"];
			$client_name = $_POST["client_name"];
			$patient_name = $_POST["patient_name"];
			$date = $_POST["date"];
			$client_email = $_POST["client_email"];
			
			$template = Email::model()->findByPk($type_client);
			
			$email_content = '<html><img src="data:image/jpg;base64,' . base64_encode( $template->logo ) . '" />';
			$email_content .= "<TEXT>" . $template->content . "</TEXT>";
			$email_content = str_replace("\n", "<br/>", $email_content);
			$email_content = str_replace("XXXXX", $sexe . ". " . $client_name, $email_content);
			$email_content = str_replace("YYYYY", $patient_name, $email_content);
			$email_content = str_replace("DDDDD", $date, $email_content);			
			$email_content .= "</html>";
			
			$this->sendEmail("sonhuytran@gmail", $client_email, "Thank you from Coastal Cat Clinic", $email_content);
			
			$email_sent = "ok";
		}
	
		$this->render('index', array(
			"email_sent" => $email_sent,
			"email_content" => $email_content,
		));
	}
}	