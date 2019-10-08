<div id="content">
	<a href="<?php echo base_url(); ?>" class="home">
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
	<div style="clear: both;"></div>
		
		<div id="sidebar">
			
		</div>
		
		<div id="list-item-category">
			<?php echo validation_errors(); ?>
			<?php echo form_open(); ?>
			<h1><?=$products['name']; ?></h1>
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
				<p>Код: А-<?=$products['id_product'];?></p>
				<p class="item_price"><?=$products['price'];?> <?=$money['key_money'];?></p>
				<?php
					if( $buy == TRUE ):
				?>
				<input type="submit" class="btn btn-primary" value="Купить">
				<?php
					else:
				?>
				<input type="button" class="btn btn-success" value="Уже в корзине">
				<?php
					endif;
				?>
				<?=$products['text']; ?>
			</div>
			
			<div style="clear: both;"></div>
			<?php
				if( count( $options ) != 0 ):
			?>
			<div id="item_info">
				<h3>Технические характеристики</h3>
				<table>
					<?php foreach( $options as $item ): ?>
					<tr>
						<td><?=$item['name'];?>:</td>
						<td><?=$item['item'];?></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
			<?php
				endif;
			?>
			<input type="hidden" value="<?php echo $products['id_product']; ?>" name="cart_id" />
			<input type="hidden" value="<?php echo $products['price']; ?>" name="cart_price" />
			<input type="hidden" value="<?php echo $products['rewrite']; ?>" name="cart_name" />
			<input type="hidden" value="<?php echo $img_name; ?>" name="cart_img" />
			</form>
		</div>
		
		<div style="clear: both;"></div>
</div>