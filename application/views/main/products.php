	<div id="content">
		<!--<a href="<?php echo base_url(); ?>" class="home">
			<img src="<?=base_url('images/theme1/home.png'); ?>">
		</a>
		<img src="<?php echo base_url('images/theme1/navi.png'); ?>"  class="navi">
		<?php while( $count_navi != 0 ): ?>
			<?php
				if( $count_navi == 1 )
				{
					echo '<a href="'.base_url('category/get/'.$navigation_rewrite[$count_navi - 1]).'" class="navi_text" >'.$navigation_name[$count_navi - 1].'</a>';
				}
				else
				{
					echo '<a href="'.base_url('category/get/'.$navigation_rewrite[$count_navi - 1]).'" class="navi_text" >'.$navigation_name[$count_navi - 1].'</a>
					<img src="'.base_url('images/theme1/navi.png').'" class="navi">';
				}
				$count_navi--;
			?>
		<?php endwhile; ?>
		<img src="<?php echo base_url('images/theme1/navi.png'); ?>"  class="navi">
		<a href="<?=base_url('products/get/'.$products['rewrite'])?>" class="navi_text" ><?=$products['name']; ?></a>
		<div style="clear: both;"></div>-->
			
			<div id="sidebar">
				<div class="h2_item"><h2>111<?=$category_name;?></h2></div>
				<div class="corner"></div>
				<div style="clear: both;"></div>
				Текстовка ггг
			</div>	
			
			<div id="product_show">
				<?php echo form_open(); ?>
				<h1><?=$products['name']; ?></h1>
				<div style="clear: both;"></div>
				<div id="image_product" style="width: <?=$settings[3]['width']+10;?>px; text-align: center;">
					<?php
						foreach( $images as $view_images )
						{
							if( $view_images['img_boss'] == 1 )
							{
								$img_name = $view_images['name'];
								echo '<a href='.base_url('images/upload/'.$view_images['name']).'><img  height="'.$settings[3]['height'].'" src="'.base_url('images/upload/'.$view_images['name']).'" class="boss"></a>';
								echo '<div style="clear: both;"></div>';
							}
							else
							{
								echo '<a href='.base_url('images/upload/'.$view_images['name']).'><img height="'.$settings[4]['height'].'" style="margin-left: 10px;" src="'.base_url('images/upload/thumbs/'.$view_images['name']).'" class="item_img"></a>';
							}
						}
					?>
				</div>
				
				<div id="product">
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
					<?=$products['text'];?>
				</div>
				
				<div style="clear: both;"></div>
				<script type="text/javascript" src="<?=base_url('js/demo/tech_data.js');?>"></script>
				<ul id="info">
					<li class="descr"><a href="#">Описание</a></li>
					<li class="options"><a href="#">Характеристики</a></li>
				</ul>
				<div style="clear: both;"></div>
				<div id="full_description">
					<h3>Полное описание</h3>
					<?=$products['full_text'];?>
				</div>
				<div id="show_options">
					<?php
						if( count( $options ) != 0 ):
					?>
					<h3>Технические характеристики</h3>
					<table>
						<?php foreach( $options as $item ): ?>
						<tr>
							<td class="name_option"><?=$item['name'];?>:</td>
							<td class="item_option"><?=$item['item'];?></td>
						</tr>
						<?php endforeach; ?>
					</table>
					<?php
						endif;
					?>
				</div>
				<input type="hidden" value="<?php echo $products['id_product']; ?>" name="cart_id" />
				<input type="hidden" value="<?php echo $products['price']; ?>" name="cart_price" />
				<input type="hidden" value="<?php echo $products['rewrite']; ?>" name="cart_name" />
				<input type="hidden" value="<?php echo $img_name; ?>" name="cart_img" />
				</form>
			</div>
			<div style="clear: both;"></div>
	</div>