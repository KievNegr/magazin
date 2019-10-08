<ul id="breadcrumb">
	<li><a href="<?php echo base_url(); ?>">Index page</a></li>
	<?php
		foreach( $breadcrumb as $listBread )
		{
			echo '<li><a href="' . base_url('category/get/' . $listBread['rewrite']) . '">' . $listBread['name'] . '</a></li>';
		}
	?>
	<li><a href="<?php echo base_url('products/get/' . $rewrite);?>"><?php echo $products['name']; ?></a></li>
</ul><!--/breadcrumb-->

<div id="content">
<!--<div id="image_product" style="width: <?=$settings[3]['width'];?>px; text-align: left;">-->
		<?php
			foreach( $images as $view_images )
			{
				if( $view_images['img_boss'] == 1 )
				{
					$img_name = $view_images['name'];
					//echo '<a href='.base_url('images/upload/'.$view_images['name']).'><img width="'.$settings[3]['width'].'" src="'.base_url('images/upload/'.$view_images['name']).'" class="boss"></a>';
					//echo '<div style="clear: both;"></div>';
				}
				else
				{
					//echo '<a href='.base_url('images/upload/'.$view_images['name']).'><img max-width: 100%; height="'.$settings[4]['height'].'" style="margin-left: 10px;" src="'.base_url('images/upload/thumbs/'.$view_images['name']).'" class="item_img"></a>';
				}
			}
		?>


	<div class="grid-50 left background" style="height: 400px; background-image: url('<?php echo base_url('images/upload/' . $img_name); ?>');"></div><!--/grid-50-->
	<div class="grid-50 right">
		<h1><?php echo $products['name']; ?></h1>
		<p class="product-price"><?php echo $products['price']*$view_money['exchange_money'];?> <?=$view_money['key_money'];?></p>
		<?php
			if( $default_money['id_money'] != $view_money['id_money'] ):
		?>
		<span class="default_price"><?=$products['price'];?> <?=$default_money['key_money'];?></span>
		<br>
		<?php
			endif;

			//Availability
			switch($products['available'])
			{
				case 1:
					$available = 'В наличии';
					break;
				case 2:
					$available = 'Отсутствует';
					break;
				case 3:
					$available = 'Ожидается';
					break;
				case 4:
					$available = 'Снято с производства';
					break;
			}
		?>
		<p><strong>Наличие:</strong> <?php echo $available; ?></p>
		<p><strong>Product code:</strong> А-<?php echo $products['id_product'];?></p>
		<p class="product-info"><?php echo $products['text'];?></p>
		<?php 
			echo form_open();					
			if( $buy == TRUE ):
		?>
			<input type="submit" class="add-to-cart-product" value="Add to Cart">
			<?php
				else:
			?>
				<input type="button" class="in_cart" value="Уже в корзине" disabled>
		<?php
			endif;
		?>		
			<input type="hidden" value="<?php echo $products['id_product']; ?>" name="cart_id" />
			<input type="hidden" value="<?php echo $products['price']; ?>" name="cart_price" />
			<input type="hidden" value="<?php echo $products['rewrite']; ?>" name="cart_name" />
			<input type="hidden" value="<?php echo $img_name; ?>" name="cart_img" />
		</form>
	</div><!--/grid-50-->
	<div style="clear: both; height: 20px;"></div>
	<ul id="product-more">
		<li id="sub1">Description</li>
		<li id="sub2">Technical data</li>
		<li id="sub3">Сomments</li>
	</ul><!--/product-more-->

	<div class="sub-product-more sub1">
		<?php echo $products['full_text'];?>
	</div><!--/product-more-->
	<div class="sub-product-more sub2">
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
	</div><!--/product-more-->
	<div class="sub-product-more sub3">
		<h5>Barak Obama, 25.06.2015</h5>
		<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		<div class="wave"></div><!--/wave-->
		<h5>Abdullah Muhammad , 23.06.2015</h5>
		<p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
	</div><!--/product-more-->

	<div class="wave"></div><!--/wave-->
</div><!--/content-->
</div><!--/wrapper-->