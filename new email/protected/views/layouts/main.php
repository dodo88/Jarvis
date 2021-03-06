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
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery.rating.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jquery-ui-1.10.0.custom.css">
	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.form.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.MetaData.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.rating.js"></script>	
	<?php Yii::app()->clientScript->scriptMap=array('jquery.ui.js'=>Yii::app()->request->baseUrl.'/js/jquery-ui-1.10.0.custom.js',) ;													
		Yii::app()->clientScript->registerCoreScript('jquery.ui');	?>	
	<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/grid-question.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">
	<?php if ($this->action->controller->id != 'survey') { ?>
		<div id="header">
			<!-- <div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div> -->
			<div id="logo">
				<div class="middle">
					<a class="return" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php">
						<img src="<?php echo Yii::app()->request->baseUrl; ?>/css/images/CCC_Logo.jpg" alt="">
					</a>
					<div id="login" style="float:right;">
						<?php if (Yii::app()->user->isGuest) { ?>
							<a href="#"><?php //if (isset($useremail)) echo $useremail; ?></a>
							<!--<a class="membership_head" href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=jarvisUser/create">Sign up</a>-->
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
	<?php } ?>

	<div id="mainmenu">
		<?php
			if ($this->action->controller->id != 'survey')
				$this->widget('zii.widgets.CMenu',array(
				'items'=>array(
					array('label'=>'Home', 'url'=>array('/site/index')),
					// array('label'=>'Do Survey', 'url'=>array('survey/index'), 'visible'=>Yii::app()->user->isGuest),
					array('label'=>'Send Email', 'url'=>array('sendEmail/index'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Email Template Management', 'url'=>array('email/index'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Question Survey Management', 'url'=>array('question/index'), 'visible'=>!Yii::app()->user->isGuest),
					array('label'=>'Report Management', 'url'=>array('report/index'), 'visible'=>!Yii::app()->user->isGuest)
				),
		));
		
		?>
	</div><!-- mainmenu -->
	<?php 
		if ($this->action->controller->id != 'survey')
			if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
	<?php if ($this->action->controller->id != 'survey') { ?>
		<div id="footer">
			Copyright &copy;
			<?php
				date_default_timezone_set('UTC');
				echo date('Y');
			?> by Coastal Cat Clinic.<br/>
			All Rights Reserved.<br/>
			<?php // echo Yii::powered(); ?>
		</div><!-- footer -->
	<?php } ?>
</div><!-- page -->

</body>
</html>
