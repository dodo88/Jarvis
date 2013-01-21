<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/Project.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.10.0.custom.css">
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.0.min.js"></script>	
	<?php Yii::app()->clientScript->scriptMap=array('jquery.ui.js'=>Yii::app()->request->baseUrl.'/js/jquery-ui-1.10.0.custom.js',) ;													
		Yii::app()->clientScript->registerCoreScript('jquery.ui');	?>	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/grid-project.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<!-- <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div> -->
		<div id="logo">
			<div class="middle">
				<a class="return" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/ci.jpg" alt="">
				</a>
				<div id="login" style="float:right;">
					<?php if (Yii::app()->user->isGuest) { ?>
						<a href="#"><?php //if (isset($useremail)) echo $useremail; ?></a>
						<a class="membership_head" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=jarvisUser/create">Sign up</a>
						<a class="membership_head" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/login">Log In</a>
					<?php } else { ?>
						<?php echo "Hi, " . Yii::app()->user->name . " !"; ?>
						<a class="membership_head" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=site/logout">Log Out</a>
						<a class="membership_head" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=jarvisUser/update&id=<?php echo Yii::app()->user->getJarvisUserId(); ?>">Edit Profile</a>
					<?php }?>
				</div>
				<br/><br/>
			</div>
		</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Approve Projects', 'url'=>array('approveProject/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Sell Projects', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Manage Projects', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Pro Profile', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Project List', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Pro List', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Setting Tools', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Reports', 'url'=>array('#'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Contact', 'url'=>array('/site/contact'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Jarvis.<br/>
		All Rights Reserved.<br/>
		<?php // echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
