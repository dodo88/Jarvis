<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> <html xmlns="http://www.w3.org/1999/xhtml">
<?php $this->load->helper('url'); ?>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<head profile="http://www.w3.org/2005/10/profile">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>style/php.ico">
	<link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>style/php.ico">
	<meta name="description" content="">
	<title>Jarvis</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style/General0.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style/Site0000.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style/Forms000.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style/jquery-u.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style/Logon000.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>style/Mail0000.css">
</head>
<body>
	<div id="page">
		<a name="top"></a>
		<div id="modalbox"></div>
		<div id="logo">
			<div class="middle">
				<a class="return" href="/jarvis">
					<img src="<?php echo base_url(); ?>style/ci.jpg" alt="">
				</a>
			</div>
		</div>
		<div id="menu_top">
			<div class="middle">
				<div class="left"></div>
				<a class="menu_home" href="/jarvis">Home</a>
				<a class="menu_apply" href="#">Contact us</a>
				<a class="menu_contact" href="#">About us</a>
				<div class="right"></div>
			</div></div>
		<div id="header">
			<div id="header_small">
			</div>
		</div>
		<div id="main">
			<div id="top_ombre"></div>
			<table id="tmain" cellpadding="0" cellspacing="0">
				<tr>
					<td class="espace border_left"></td>
					<td class="espace center">
						<div id="content">
							<div id="js_login" class="logon_bordure bg_bordure1" style="border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;">
								<div class="bg_bordure2" style="border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;">
									<div class="bg_blanc" style="border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;">
										<h4>LOGIN</h4>
										<?php
											if (isset($authenticated) && $authenticated == 'failed') {
												echo "<div class='error_bar'><p>Login was unsuccessful. Please correct the errors and try again.</p></div>";
											}
										?>
										
										<?php echo form_open('home_user');?>
											<div class="green_bar" style="display: none; border-top-left-radius: 6px; border-top-right-radius: 6px; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;">
												<p>We have sent you an email. Please check your email to reset your password.</p>
											</div>
											<div class="bloc" style="border-top-left-radius: 6px; border-top-right-radius: 6px; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;">
												<p>
													<span class="hidden"></span>
													
													<span class="field-validation-error">
													<?php
														$useremailError = form_error('username');
														$useremailError = str_replace('<p>', '', $useremailError);
														$useremailError = str_replace('</p>', '', $useremailError);
														echo $useremailError;
													?>
													</span>
													
													<br>
													<label for="Email">Email</label>
													<input id="UserName" name="username" type="text" value="">
												</p>
												<p>
													<span class="hidden"></span>
													
													<span class="field-validation-error">
													<?php
														$passwordError = form_error('password');
														$passwordError = str_replace('<p>', '', $passwordError);
														$passwordError = str_replace('</p>', '', $passwordError);
														echo $passwordError;
													?>
													</span>
													
													<br>
													<label for="Password">Password</label>
													<input id="Password" name="password" type="password">
													<span class="button_forgot" style="border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">Forgot your password ?</span>
												</p>
												<div class="remember">
													<input id="RememberMe" name="rememberme" type="checkbox" value="rememberme">
													<label for="Keep me logged in">Keep me logged in</label>
												</div>
												<input type="submit" value="login" class="login">
											</div>
											<p class="already">You don’t have an account ?
												<a href="#">Sign up</a>
											</p>
										<?php echo form_close();?>
									</div>
								</div>
							</div>
						</div>
					</td>
					<td class="espace border_right"></td>
				</tr>
			</table>
		</div>
		
		<div id="footer">
			<div class="middle">
			<p>
				©
				2013
				Jarvis. All rights reserved.
			</p>
		</div>
	</div>
</div>
</body>
</html>