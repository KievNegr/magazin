<!DOCTYPE HTML>
<html>
	<head>
		<title><?=$title; ?></title>
		<meta name="description" content="<?=$description; ?>">
		<meta name="keywords" content="<?=$keywords; ?>">
		<meta http-equiv="content-type" content="text/html; charset=UTF8">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans&subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
		<link type="text/css" rel="stylesheet" href="<?=base_url('css/demo/style.css');?>">
		<link rel="stylesheet" href="<?=base_url('css/demo/jMenu.jquery.css');?>" type="text/css" />
		<script type="text/javascript" src="<?=base_url('js/jquery-1.7.1.min.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('js/demo/category.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('js/demo/new_item.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('js/demo/jquery-ui.js');?>"></script>
		<script type="text/javascript" src="<?=base_url('js/demo/jMenu.jquery.js');?>"></script>
		<script type="text/javascript">
		  $(document).ready(function(){
			$("#jMenu").jMenu();
		  })
		</script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<?php if( $cart_count > 0 ): ?>
					<div id="cart">
						<img src="<?=base_url('images/demo/cart.png');?>" width="24" height="20" alt="Корзина" title="Корзина" class="cart_img">
						<p>Ваша корзина не пустая</p>
						<input type="hidden" value="<?=$cart_count;?>" id="cart_count">
						<p class="cart">Товаров: <?=$cart_count;?></p>
						<p class="cart">Общая сумма: <?=$cart_price;?> <?=$money['key_money'];?></p>
						<a href="#">Оформить покупку</a>
					</div>
				<?php endif; ?>
				<div id="top_navigation">
				
				</div>
				<div id="logo">
					<a href="<?=base_url();?>"><img src="<?=base_url('images/demo/logo.jpg');?>" width="258" height="76" alt="logo"></a>
				</div>
				
			</div>