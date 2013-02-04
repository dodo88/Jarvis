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
	
	private function sendEmail() {
		$mail = new PHPMailer();
		 
		$mail->IsSMTP(); 
		$mail->SMTPDebug = 1;
		$mail->SMTPSecure = "ssl"; // set mailer to use SMTP
		$mail->Host = "smtp.gmail.com"; // specify main and backup server
		$mail->Port = 465; 
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "sonhuytran@gmail.com"; // SMTP username
		$mail->Password = "lAvITAebELLA1177@"; // SMTP password
		 
		$mail->From = "sonhuytran@gmail.com";
		$mail->FromName = "info@coastalcatclinicpacifica.com";
		$mail->AddAddress("sonhuytran@gmail.com", "Son-Huy");
		
		$mail->Subject = "abc";
		$mail->Body = "xyz";
		
		return $mail->Send();
	}
	
	public function actionIndex()
	{
		$email_sent = "notok";
		
		if (isset($_POST["send_email"])) {
			$sexe =  $_POST["sexe"];
			$client_name = $_POST["client_name"];
			$patient_name = $_POST["patient_name"];
			$date = $_POST["date"];
			$client_email = $_POST["client_email"];
			
			$email_content = "Dear $client_name<br/><br/>";
			$email_content .= "We are so delighted that you trusted our hospital and brought your precious cat, $patient_name, to the Coastal Cat Clinic on $date. We pride ourselves on offering our clients responsive, competent and excellent service. Our clients are the most important part of our clinic and we work tirelessly to ensure your complete satisfaction.<br/>";
			$email_content .= "In order to improve our services constantly we would appreciate if you take our online survey. It would take about three minutes of your precious time but it would help us hugely to improve the quality of our services.<br/>";
			$email_content .= "Thank you again for being our valued client and we look forward to meeting again.<br/><br/>";
			$email_content .= "Coastal Cat Clinic";
			
			$email_content .= "<a href='www.coastalcatclinicpacifica.com'>Coastal Cat Clinic<a/>";
			$email_content .= "<a href='www.facebook.com/coastalcat'>Coastal Cat Clinic's Facebook<a/>";
			$email_content .= "<a href='http://sonhuytran.info/email/index.php?r=survey/index'><a/>";
			$email_content .= "<a href='#'>Contact Infos<a/>";
			
			$this->sendEmail();
			
			$email_sent = "ok";
		}
	
		$this->render('index', array(
			"email_sent" => $email_sent,
		));
	}
}	