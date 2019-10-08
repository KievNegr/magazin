		<div id="footer">
			<p>&copy; 2012 Интернет-магазин "У Емельяна"</p>
		</div>
		
		<script type="text/javascript">
			$(document).ready(function()
			{
				$("#cart a").parent().click(function()
				{
					$("#show_cart").load('<?=base_url("my_cart");?>');
					$("#show_cart").show();
				});
				
				if( $('#cart_count').val() == 0 )
				{
					$('#cart').css('margin-top','-80px');
				}
				else
				{
					$('#cart').css('margin-top','-10px');
				}
			});
		</script>
		
		<div id="show_cart">
			
		</div>
	</body>
</html>