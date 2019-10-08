<script type="text/javascript">
	$(document).ready(function()
	{
		$(".text_cart").change(function()
		{
			new_qty = $(this).val();
			if( new_qty < 1 )
			{
				alert('не гони!');
				$(this).val('1');
			}
			else
			{
				rowid = $(this).next('.text_rowid').val();
				$.post('<?=base_url("my_cart/qty_change");?>', {qty: new_qty, rowid: rowid}, ok);
			}
		});
		
		$(".delete").click(function()
		{
			rowid = $(this).attr('id');
			new_qty = '0';
			$.post('<?=base_url("my_cart/qty_change");?>', {qty: new_qty, rowid: rowid}, reload);
		});
		
		function ok(data)
		{
			$("#show_cart").load('<?=base_url("my_cart");?>');
		}
		
		function reload(data)
		{
			if( data == 0 )
			{
				location.reload(true);
			}
			else
			{
				$("#show_cart").load('<?=base_url("my_cart");?>');
			}
		}
		
		$('#buy').click(function()
		{
			$("#show_cart").load('<?=base_url("my_cart/buy");?>');
		});
		
		$(".close_windows").click(function()
		{
			$("#show_cart").fadeOut();
		});
	});
</script>
		
<div id="content">
	<div class="close_windows"></div>
	<h1>Товары в корзине</h1>
	<table class="cart_table">
		<tr class="head">
			<td>
				<b>Фото</b>
			</td>
			<td>
				<b>Название товара</b>
			</td>
			<td>
				<b>Цена</b>
			</td>
			<td style="width: 120px;">
				<b>Колличество</b>
			</td>
			<td>
				<b>Действие</b>
			</td>
			<td>
				<b>Сумма</b>
			</td>
		</tr>
	<?php 
		foreach($contents as $item): 
		$item = array_reverse($item);
	?>
		<tr>
			<td>
				<img src="<?=base_url('images/upload/thumbs/'.$item['options']['image']);?>" />
			</td>
			<td>
				<?=$this->cart_md->get_name_item( $item['name'] );?>
			</td>
			<td>
				<?=$item['price'];?>
			</td>
			<td>
				<input type="text" value="<?=$item['qty'];?>" class="text_cart" />
				<input type="hidden" value="<?=$item['rowid'];?>" class="text_rowid" />
			</td>
			<td>
				<a href="#" class="delete" title="Удалить из корзины" id="<?=$item['rowid'];?>"><img src="<?=base_url('images/del_cart.png');?>" /></a>
			</td>
			<td>
				<?=$item['qty'] * $item['price'].' '.$money['key_money'];?>
			</td>
		</tr>
	<?php endforeach; ?>
		<tr class="foot">
			<td colspan="5">
				<b><a href="#" id="buy">Оформить покупку</a></b>
			</td>
			<td>
				<b><div id="total"><?=$total;?> <?=$money['key_money'];?></div></b>
			</td>
		</tr>
	</table>
</div>