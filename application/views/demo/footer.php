		<div id="empty"></div>
		</div>
		<div id="footer">
			<div class="footer_info">
				<p>&copy; 2012 <?=$title; ?></p>
				<p>График работы: круглосуточно</p>
				<a href="<?=base_url();?>"><img src="<?=base_url('images/demo/logo_footer.jpg');?>" alt="<?=$title; ?>" title="<?=$title; ?>"></a>
			</div>
			<div class="footer_links">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">О магазине</a></li>
					<li><a href="#">Доставка</a></li>
					<li><a href="#">Оплата</a></li>
					<li><a href="#">Контакты</a></li>
				</ul>
			</div>
		</div>
		
		<script type="text/javascript">
			$(document).ready(function()
			{
				$("#cart a").click(function()
				{
					width = $(document).width();
					$("#show_cart").css('left', (width - 800)/2);
					$("#show_cart").load('<?=base_url("my_cart");?>');
					$("#show_cart").show();
				});
			});
		</script>
		
		<div id="show_cart">
			
		</div>
		
	</body>
</html>