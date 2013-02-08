<?php
header('Content-type: image/jpg');
$template = Email::model()->findByPk(1);
$logo = $template->logo;

echo $logo;
?>