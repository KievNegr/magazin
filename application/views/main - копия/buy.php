<script type="text/javascript">
	$(document).ready(function()
	{
		delivery = 0;
		
		$("#buy_pay").change(function()
		{
			key = $(this).val();
			$.post('my_cart/pay_change', {key: key}, keyok);
		});
		
		function keyok(data)
		{
			price = (parseInt($("#total").val()) * parseInt(data)) / 100 + parseInt($("#total").val());
			$("#total_sum").text(price);
			total = price + delivery;
			$("#total_sum_width_del").text(total);
		}
		
		$("#buy_shipping").change(function()
		{
			key = $(this).val();
			$.post('my_cart/delivery_change', {key: key}, deliv_ok);
		});
		
		function deliv_ok(data)
		{
			delivery = parseInt(data);
			$("#deliv_sum").text(data);
			sum = parseInt($("#total_sum").text()) + delivery;
			$("#total_sum_width_del").text(sum);
		}
		
		$('#set_order').click(function()
		{
			error = 0;
			name = $('#name_buy').val();
			phone = $('#phone_buy').val();
			mail = $('#mail_buy').val();
			fax = $('#fax_buy').val();
			city = $('#buy_city').val();
			street = $('#buy_street').val();
			build = $('#buy_build').val();
			office = $('#buy_appart').val();
			pay = $('#buy_pay').val();
			ship = $('#buy_shipping').val();
			
			if( name.length == 0 )
			{
				$('#name_buy').css('border-color','#FF0000');
				error = 1;
			}
			else
			{
				$('#name_buy').css('border-color','#EEE');
			}
			
			if( phone.length == 0 )
			{
				$('#phone_buy').css('border-color','#FF0000');
				error = 1;
			}
			else
			{
				$('#phone_buy').css('border-color','#EEE');
			}
			
			if( street.length == 0 )
			{
				$('#buy_street').css('border-color','#FF0000');
				error = 1;
			}
			else
			{
				$('#buy_street').css('border-color','#EEE');
			}
			
			if( build.length == 0 )
			{
				$('#buy_build').css('border-color','#FF0000');
				error = 1;
			}
			else
			{
				$('#buy_build').css('border-color','#EEE');
			}
			
			if( office.length == 0 )
			{
				$('#buy_appart').css('border-color','#FF0000');
				error = 1;
			}
			else
			{
				$('#buy_appart').css('border-color','#EEE');
			}
			
			if( error == 0 )
			{
				$.post('my_cart/reg', {
				name_buy:name, 
				phone_buy:phone, 
				mail_buy:mail, 
				fax_buy:fax, 
				buy_city:city, 
				buy_street:street,
				buy_build:build,
				buy_appart:office,
				buy_pay:pay,
				buy_shipping:ship
				}, ok);
			}
		});
		
		function ok(data)
		{
			$("#show_cart").load("my_cart/succes");
		}
	});
</script>


<div id="content">
	<div id="cart_center">
		<h1>Оформление заказа</h1>
		<?php echo form_open('my_cart/reg'); ?>
		<div id="person_buy">
			<h2>Личные данные</h2>
			<table>
				<tr>
					<td class="info_td">ФИО*:</td>
					<td><input type="text" id="name_buy" class="buy_text" /></td>
				</tr>
				<tr>
					<td class="info_td">Телефон*:</td>
					<td><input type="text" id="phone_buy" class="buy_text" /></td>
				</tr>
				<tr>
					<td class="info_td">E-mail:</td>
					<td><input type="text" id="mail_buy" class="buy_text" /></td>
				</tr>
				<tr>
					<td class="info_td">Факс:</td>
					<td><input type="text" id="fax_buy" class="buy_text" /></td>
				</tr>
				<tr>
					<td class="info_td">Город:</td>
					<td>
						<select id="buy_city">
							<?php foreach( $city as $name_city ): ?>
								<option value="<?=$name_city['id_city'];?>"><?=$name_city['name_city'];?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="info_td">Улица*:</td>
					<td><input type="text" id="buy_street" class="buy_text" /></td>
				</tr>
				<tr>
					<td class="info_td">Дом*:</td>
					<td><input type="text" id="buy_build" class="buy_text" /></td>
				</tr>
				<tr>
					<td class="info_td">Квартира(офис)*:</td>
					<td><input type="text" id="buy_appart" class="buy_text" /></td>
				</tr>
				<tr>
					<td class="info_td">Оплата:</td>
					<td>
						<select id="buy_pay">
							<?php foreach( $pay as $item ): ?>
								<option value="<?=$item['id_pay'];?>"><?=$item['name_pay'];?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
				<tr>
					<td class="info_td">Способ доставки:</td>
					<td>
						<select id="buy_shipping">
							<?php foreach( $delivery as $item ): ?>
								<option value="<?=$item['id_shipping'];?>"><?=$item['name_shipping'];?></option>
							<?php endforeach; ?>
						</select>
					</td>
				</tr>
			</table>
		</div>
		
		<div id="order_buy">
			<h2>Ваш заказ</h2>
				<table class="buy_table">
					<tr class="head">
						<td><b>Фото</b></td>
						<td><b>Название</b></td>
						<td><b>Цена</b></td>
						<td><b>Колличество</b></td>
						<td><b>Сумма</b></td>
					</tr>
			<?php 
				foreach($contents as $item): 
				$item = array_reverse($item);
				$name = $this->cart_md->get_name_item($item['name']);
			?>
				<tr>
					<td>
						<img src="<?=base_url('images/upload/thumbs/'.$item['options']['image']);?>" />
					</td>
					<td valign="top">
						<?=$name;?>
					</td>
					<td valign="top">
						<?=$item['price'];?>
					</td>
					<td valign="top">
						x<?=$item['qty'];?>
					</td>
					<td valign="top">
						<?=$item['qty'] * $item['price'];?>
					</td>
				</tr>
			<?php endforeach; ?>
			</table>
		</div>
		
		<div style="clear: both;"></div>
		<input type="hidden" value="<?=$total;?>" id="total" />
		<p>Товаров на сумму: <span id="total_sum"><?=$total;?></span></p>
		<p>Доставка: <span id="deliv_sum">0</span></p>
		<p>Сумма к оплате: <span id="total_sum_width_del"><?=$total;?></span></p>
		<input type="button" id="set_order" value="Оформить заказ" class="btn btn-success" />
		</form>
	</div>
</div>