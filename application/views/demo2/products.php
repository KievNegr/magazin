	<div id="product_content">
		<h1><?=$products['name']; ?></h1>
		<div style="clear: both;"></div>			
			<div id="product_show">
				<?php echo form_open(); ?>
				<div id="image_product" style="width: <?=$settings[3]['width'];?>px; text-align: left;">
					<?php
						foreach( $images as $view_images )
						{
							if( $view_images['img_boss'] == 1 )
							{
								$img_name = $view_images['name'];
								echo '<a href='.base_url('images/upload/'.$view_images['name']).'><img width="'.$settings[3]['width'].'" src="'.base_url('images/upload/'.$view_images['name']).'" class="boss"></a>';
								echo '<div style="clear: both;"></div>';
							}
							else
							{
								echo '<a href='.base_url('images/upload/'.$view_images['name']).'><img max-width: 100%; height="'.$settings[4]['height'].'" style="margin-left: 10px;" src="'.base_url('images/upload/thumbs/'.$view_images['name']).'" class="item_img"></a>';
							}
						}
					?>
				</div>
				
				<div id="product" style="width: <?=1020 - $settings[3]['width'] - 10;?>px; margin-left: 10px;">
					<span class="code">Код: А-<?=$products['id_product'];?></span>
					<br>
					<span class="price"><?=$products['price']*$view_money['exchange_money'];?> <?=$view_money['key_money'];?></span>
					<br>
					<?php
						if( $default_money['id_money'] != $view_money['id_money'] ):
					?>
					<span class="default_price"><?=$products['price'];?> <?=$default_money['key_money'];?></span>
					<br>
					<?php
						endif;
					?>
					<?php
						if( $buy == TRUE ):
					?>
					<input type="submit" class="add_cart" value="Купить">
					<?php
						else:
					?>
						<input type="button" class="in_cart" value="Уже в корзине" disabled>
					<?php
						endif;
					?>
					<br>
					<div id="minidescription">
						<?=$products['text'];?>
					</div>
				</div>
				
				<div style="clear: both;"></div>
				
				<div id="show_options">
					<?php
						if( count( $options ) != 0 ):
					?>
					<h2>Технические характеристики</h2>
					<div class="line"></div>
					<table>
						<?php 
							$color = 0;
							foreach( $options as $item ):
								if( $color == 1 )
								{
									$colorcode = "#EEE";
									$color = 0;
								}
								else
								{
									$colorcode = "#FFF";
									$color = 1;
								}
						?>
						<tr style="background: <?=$colorcode;?>;">
							<td class="name_option"><?=$item['name'];?>:</td>
							<td class="item_option"><?=$item['item'];?></td>
						</tr>
						<?php endforeach; ?>
					</table>
					<?php
						endif;
					?>
				</div>
				
				<div id="full_description">
					<h2>Полное описание</h2>
					<div class="line"></div>
					<div id="full_description_text">
						<?=$products['full_text'];?>
					</div>
				</div>
				
				<input type="hidden" value="<?php echo $products['id_product']; ?>" name="cart_id" />
				<input type="hidden" value="<?php echo $products['price']; ?>" name="cart_price" />
				<input type="hidden" value="<?php echo $products['rewrite']; ?>" name="cart_name" />
				<input type="hidden" value="<?php echo $img_name; ?>" name="cart_img" />
				</form>
			</div>
			<div style="clear: both;"></div>
	</div>
	<div style="clear: both;"></div>