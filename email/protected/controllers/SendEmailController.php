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
	
	private function sendEmail($from, $to, $subject, $content, $images) {
		$mail = new PHPMailer();
		 
		$mail->IsSMTP(); 
		$mail->SMTPDebug = 1;
		$mail->SMTPSecure = "ssl"; // set mailer to use SMTP
		$mail->Host = "smtp.gmail.com"; // specify main and backup server
		$mail->Port = 465; 
		$mail->SMTPAuth = true; // turn on SMTP authentication
		$mail->Username = "sonhuytran@gmail.com"; // SMTP username
		$mail->Password = "lAvITAebELLA1177@"; // SMTP password
		 
		$mail->From = "info@coastalcatclinicpacifica.com";
		$mail->FromName = "info@coastalcatclinicpacifica.com";
		$mail->AddAddress($to);		
		$mail->IsHTML(true);
		
		// foreach($images as $key => $value) {
			// $mail->AddEmbeddedImage($value, $key, $value);
		// }
		
		$mail->Subject = $subject;
		$mail->Body = $content;
		$mail->altBody = $content;
		
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
			$website_link = $template->website;
			$facebook_link = $template->facebook;
			$survey_link = $template->survey;
			$contact_info = $template->contact_info;
			$contact_info = str_replace("\n", "<br/>", $contact_info);
			$email_logo = Yii::app()->request->hostInfo . $template->logo;
			$email_facebook_logo = Yii::app()->request->hostInfo . Yii::app()->baseUrl . "/css/images/facebook.png";
			$email_header = Yii::app()->request->hostInfo . $template->header;
			$email_footer = Yii::app()->request->hostInfo . $template->footer;
			
			$email_content = "<html><div style='width:720px;'><img style='max-width:100%; max-height:100%;' src='$email_header'/><br/><br/>";
			$email_content .= "<div style='margin:30px 30px 30px 30px;font-family:Tahoma;font-size:14px;'><TEXT>" . $template->content . "</TEXT>";
			$email_content = str_replace("\n", "<br/>", $email_content);
			$email_content = str_replace("XXXXX", $sexe . ". " . $client_name, $email_content);
			$email_content = str_replace("YYYYY", $patient_name, $email_content);
			$email_content = str_replace("DDDDD", $date, $email_content);
			// $email_content .= "<br/><div style='float:left;clear:left;'><a href='$website_link'><img style='max-width:50%; max-height:50%;' src='" . Yii::app()->request->hostInfo . $template->logo . "'/><a/></div><div style='float:right;clear:right;'><a href='$facebook_link'><img style='max-width:50%; max-height:50%;' src='" . Yii::app()->request->hostInfo . Yii::app()->baseUrl . "/css/images/facebook.jpg" . "'/><a/></div>";
			$email_content .= "<br/><br/><table><tr><td style='width:50%;max-width:50%;align:left;'><a href='$website_link'><img style='max-width:50%; max-height:50%;' src='$email_logo'/></a></td><td style='width:50%;max-width:50%;align:right;'><a href='$facebook_link'><img style='max-width:50%; max-height:50%;' src='$email_facebook_logo'/></a></td></tr></table>";
			$email_content .= "<br/>Our survey : <a href='$survey_link'>$survey_link</a><br/><br/>";		
			$email_content .= "<div style='text-align:right;'>$contact_info</div>";
			$email_content .= "<br/><br/></div><img style='max-width:100%; max-height:100%;' src='$email_footer'/>";
			$email_content .= "</div></html>";
			
			$images = array('imglogo' => $email_logo,
				'imgfacebooklogo' => $email_facebook_logo,
				'imgheader' => $email_header,
				'imgfooter' => $email_footer);
			
			$this->sendEmail("sonhuytran@gmail", $client_email, $template->subject, $email_content, $images);
			
			$email_sent = "ok";
		}
	
		$this->render('index', array(
			"email_sent" => $email_sent,
			"email_content" => $email_content,
		));
	}
}	