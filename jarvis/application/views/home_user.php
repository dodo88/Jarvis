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
	Hi, dodo! 
	<a class="membership_head" href="/jarvis/index.php/welcome/index">Log Out</a>
	<a class="membership_head" href="#">Edit Profile</a>
	
	<br/>
	<br/>
	
	<div id="menu_top">
		<a class="menu" href="/jarvis">Home</a>
		<a class="menu" href="#">Approve Projects</a>
		<a class="menu" href="#">Sell Projects</a>
		<a class="menu" href="#">Manage Projects</a>
		<a class="menu" href="#">Pro Profile</a>
		<a class="menu" href="#">Project List</a>
		<a class="menu" href="#">Pro List</a>
		<a class="menu" href="#">Selling Tools</a>
		<a class="menu" href="#">Reports</a>
	</div>
</div>

</body>
</html>