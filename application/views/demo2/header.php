<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8"/>
		<title><?=$title; ?></title>
		<meta name="description" content="<?=$description; ?>">
		<meta name="keywords" content="<?=$keywords; ?>">
		<link type="text/css" rel="stylesheet" href="<?=base_url('themes/demo2/css/style.css');?>">
		<link type="text/css" rel="stylesheet" href="<?=base_url('themes/demo2/css/slider.css');?>">
		<script type="text/javascript" src="<?=base_url('js/jquery-1.7.1.min.js');?>"></script>
	</head>
	<body>
		<div id="wrapper">
			<div id="header">

				<ul>
					<a href="<?php echo base_url(); ?>"><li>Hengine</li></a>
					<?php
						foreach( $static as $page )
						{
							echo '<a href="' . base_url('pages/get/' . $page['rewrite']) . '"><li>' . $page['title'] . '</li></a>';
						}
					?>
				</ul>
				
				<div id="logo">
					<a href="<?=base_url();?>"><img src="<?=base_url('themes/demo2/images/logo.png');?>" width="277" height="95" alt="logo"></a>
				</div>
				
			</div>