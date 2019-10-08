<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta name="description" content="<?php echo $description; ?>">
		<meta name="keywords" content="<?php echo $keywords; ?>">
		<meta http-equiv="content-type" content="text/html; charset=UTF8">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('themes/' . $themePath . '/css/style.css');?>">
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('themes/' . $themePath . '/css/slider.css');?>">
		<script type="text/javascript" src="<?php echo base_url('themes/' . $themePath . '/js/jquery-1.9.1.min.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('themes/' . $themePath . '/js/scripts.js');?>"></script>
	</head>
<body>
	<div id="wrapper">
		<div id="header">
			<div class="logo">
				<img src="<?php echo base_url('themes/' . $themePath . '/images/logo.svg');?>" />
			</div><!--/logo-->
			<ul class="static-menu">
				<li><a href="<?php echo base_url();?>">Главная</a></li>
				<?php
					foreach( $static as $page )
					{
						echo '<li><a href="' . base_url('pages/get/' . $page['rewrite']) . '">' . $page['title'] . '</a></li>';
					}
				?>
			</ul><!--/static-menu-->
			<div class="cart-header-link">
				<a href="#" class="load-cart">Корзина (<?php echo $cart_count; ?>)</a>
			</div><!--/cart-header-link-->
		</div><!--/header-->