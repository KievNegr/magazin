<!DOCTYPE>
<html>
	<head>
		<title><?=$title; ?></title>
		<meta name="description" content="<?=$description; ?>">
		<meta name="keywords" content="<?=$keywords; ?>">
		<meta http-equiv="content-type" content="text/html; charset=UTF8">
		<!--<link type="text/css" rel="stylesheet" href="<?=base_url('css/theme1/bootstrap/css/bootstrap.css');?>">-->
		<link type="text/css" rel="stylesheet" href="<?=base_url('css/theme1/style.css');?>">
		<script type="text/javascript" src="<?=base_url('js/jquery-1.7.1.min.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('js/category.js');?>"></script>
	</head>
	<body>
		<div id="header">
			<div id="cart">
				<img src="<?=base_url('images/theme1/shop_cart.png');?>" width="41" height="38" alt="Корзина" title="Корзина" class="cart_img">
				<input type="hidden" value="<?=$cart_count;?>" id="cart_count">
				<?php if( $cart_count > 0 ): ?>
					<a href="#" class="count_cart"><?=$cart_count;?> товаров на сумму</a><br />
					<a href="#" class="price_cart"><?=$cart_price;?> <?=$money['key_money'];?></a>
				<?php endif; ?>
			</div>
			<ul id="header_menu">
				<li><a href="<?=base_url();?>">Главная</a></li>
				<?php foreach( $page as $links ): ?>
					<li><a href="<?=base_url('pages/get/'.$links['rewrite']);?>"><?=$links['title'];?></a></li>
				<?php endforeach; ?>
			</ul>
			<div id="header_info">
				<img src="<?=base_url('images/theme1/logo.png');?>" width="146" height="61" alt="Интернет-магазин Шаблон №1" title="Интернет-магазин Шаблон №1" class="header_logo">
				<input type="text" class="header_search">
				<div style="clear: both;"></div>
				<p>+38(063)333-22-11, +38(067)343-12-12, +38(095)642-52-63</p>
			</div>
		</div>