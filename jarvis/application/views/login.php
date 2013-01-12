<!DOCTYPE html>
<?php $this->load->helper('url'); ?>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">
	
	body {
		font-family: Tahoma, Geneva, Arial;
	}
	
	a.membership_head {
		color: white;
		background-image: url(<?php echo base_url(); ?>img/membership_header.png);
		width: 187px;
		height: 21px;
		font-weight: bold;
		display: inline-block;
		font-size: 14px;
		text-decoration: none;
		padding: 8px 28px 6px 5px;
		margin: 0;
		text-align: center;
	}
	
	a.menu {
		-o-transform-origin: 31.5px 16.5px;
		background: url(<?php echo base_url(); ?>img/menu_top_reflet.png) repeat-x;
		border-left: 1px solid #283A6C;
		border-right: 1px solid #131B32;
		color: #93ABDA;
		display: block;
		float: left;
		font: normal normal 400 13px/normal Tahoma;
		height: 13px;
		margin: 0px;
		outline: #93ABDA 0px;
		padding: 9px 14px 11px;
		text-decoration: none;
		text-transform: uppercase;
		width: 60px;
	}
	
	#menu_top {
		width:100%;
		background-color:#1c294d;
		height:45px;
		margin:0;
		padding:0;
		border-bottom:1px solid #131b32;
		border-top:1px solid #131b32;
		min-width:996px;
		position:relative;
	}
	
	#menu_top a:hover, #menu_top a.hover {
		color: #ffffff;
	}
	
	</style>
</head>
<body>

<div id="container">
	<br/>
	<br/>
	
	<div id="menu_top">
		<a class="menu" href="/jarvis">Home</a>
		<a class="menu" href="#">Contact</a>
		<a class="menu" href="#">About Us</a>
	</div>
	
	<div id="content">
		<div id="js_login" class="logon_bordure bg_bordure1" style="border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;">
			<div class="bg_bordure2" style="border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;">
				<div class="bg_blanc" style="border-top-left-radius: 3px; border-top-right-radius: 3px; border-bottom-left-radius: 3px; border-bottom-right-radius: 3px;">
					<h4>LOGIN</h4>
					<?php echo form_open('home_user');?>
						<div class="green_bar" style="display: none; border-top-left-radius: 6px; border-top-right-radius: 6px; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;">
							<p>We have sent you an email. Please check your email to reset your password.</p>
						</div>
						<div class="bloc" style="border-top-left-radius: 6px; border-top-right-radius: 6px; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px;">
							<p>
								<span class="hidden"></span> <br>
								<label for="Email">Email</label>
								<input id="UserName" name="username" type="text" value="">
							</p>
							<p>
								<span class="hidden"></span> <br>
								<label for="Password">Password</label>
								<input id="Password" name="password" type="password">
								<span class="button_forgot" style="border-top-left-radius: 10px; border-top-right-radius: 10px; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">Forgot your password ?</span>
							</p>
							<div class="remember">
								<input id="RememberMe" name="rememberme" type="checkbox" value="true">
								<input name="RememberMe" type="hidden" value="false">
								<label for="Keep me logged in">Keep me logged in</label>
							</div>
							<input type="submit" value="login" class="login">
							
							<?php echo validation_errors(); ?>
						</div>
						<p class="already">You don’t have an account ?
							<a href="#">Sign up</a>
						</p>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>