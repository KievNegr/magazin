<div id="footer">
	<div class="footer-column">
		<div class="logo">
			<img src="<?php echo base_url('themes/' . $themePath . '/images/logo.svg');?>" />
		</div><!--/logo-->
		<p><?php echo $title; ?></p>
		<p>Все права защищены</p>
		<p>Все изображения содраны с интернета</p>
		<p>&copy; <?php echo $title; ?></p>
	</div><!--/footer-column-->

	<div class="footer-column">
		<h5>Информация</h5>
		<ul>
			<li><a href="index.html">Index page</a></li>
			<?php
				foreach( $static as $page )
				{
					echo '<li><a href="' . base_url('pages/get/' . $page['rewrite']) . '">' . $page['title'] . '</a></li>';
				}
			?>
		</ul>
	</div><!--/footer-column-->

	<div class="footer-column">
		<h5>Контакты</h5>
		<ul>
			<li>Украина, г.Киев</li>
			<li>Ул. Пушкина, дом Колотушкина</li>
			<li>Тел: +38(044)444-44-44</li>
			<li>e-mail: shop@domain</li>
		</ul>
	</div><!--/footer-column-->
</div><!--/footer-->

<div id="show-cart"></div><!--/show-cart-->
<div id="fade"></div><!--/fade-->
<script type="text/javascript">
	$(document).ready(function()
	{
		$('.load-cart').click(function()
		{
			$("#show-cart").load('<?php echo base_url('my_cart');?>');
			$("#show-cart").fadeIn();
			$("#fade").fadeIn();
		});
	});

	$('html').on('change', '.cart-qty', function()
	{
		new_qty = $(this).val();
		if( new_qty < 1 )
		{
			alert('не гони!');
			$(this).val('1');
		}
		else
		{
			rowid = $(this).attr('id');
			$.post('<?php echo base_url("my_cart/qty_change");?>', {qty: new_qty, rowid: rowid}, ok);
		}
	});

	$('html').on('click', '.item-down', function()
	{
		qty = $('#' + $(this).attr('down-rowid')).val();
		new_qty = parseInt(qty) - 1;
		if( new_qty < 1 )
		{
			alert('не гони!');
			$(this).val('1');
		}
		else
		{
			rowid = $(this).attr('down-rowid');
			$.post('<?php echo base_url("my_cart/qty_change");?>', {qty: new_qty, rowid: rowid}, ok);
		}
	});

	$('html').on('click', '.item-up', function()
	{
		qty = $('#' + $(this).attr('up-rowid')).val();
		new_qty = parseInt(qty) + 1;
		if( new_qty < 1 )
		{
			alert('не гони!');
			$(this).val('1');
		}
		else
		{
			rowid = $(this).attr('up-rowid');
			$.post('<?php echo base_url("my_cart/qty_change");?>', {qty: new_qty, rowid: rowid}, ok);
		}
	});
	
	$('html').on('click', '.delete', function()
	{
		rowid = $(this).attr('del-rowid');
		new_qty = '0';
		$.post('<?php echo base_url("my_cart/qty_change");?>', {qty: new_qty, rowid: rowid}, reload);
	});
	
	function ok(data)
	{
		$("#show-cart").load('<?php echo base_url("my_cart");?>');
	}
	
	function reload(data)
	{
		if( data == 0 )
		{
			location.reload(true);
		}
		else
		{
			$("#show-cart").load('<?php echo base_url("my_cart");?>');
		}
	}

	$('html').on('click', '.close-cart', function()
	{
		$("#show-cart").fadeOut();
		$("#fade").fadeOut();
	});
	
	$('#buy').click(function()
	{
		$("#show-cart").load('<?php echo base_url("my_cart/buy");?>');
	});
	
</script>
</body>
</html>