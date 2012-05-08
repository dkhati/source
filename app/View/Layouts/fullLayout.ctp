<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title><?php echo $title_for_layout; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<?php 
	echo $this->Html->css('reset');
	echo $this->Html->css('style'); 
	?>
	<script type="text/javascript" >
	var site_url="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$this->base; ?>";
	</script>
	<!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
	<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div>
	<![endif]-->
	<!--[if lte IE 8]>
	<style type="text/css">#join_form input[type="text"]{line-height:30px;height:29px;}</style>
	<![endif]-->
	<?php echo  $this->Html->script('jquery-1.7.1.min.js'); ?>
</head>
<body>
	<div id="container">
		<div id="header">
		     	<?php echo $this->element('header'); ?>
		</div>
		<div id="content">

			<center><strong><?php echo $this->Session->flash(); ?></strong></center>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>