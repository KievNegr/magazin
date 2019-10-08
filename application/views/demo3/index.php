<div id="content">
	<div class="grid-70 left">
		<h2>New item</h2>


		<?php 
			foreach( $product as $item ): 
			//Находим главное изображение товара и его тех.данные
			$image = $this->category_md->get_boss_image( $item['id_product'] );
			$availableInCart = Array();
			foreach( $this->cart->contents() as $in_cart )
			{
				$availableInCart[] = $in_cart['id'];
			}
			$buy = TRUE;
			if( in_array($item['id_product'], $availableInCart) )
			{
				$buy = FALSE;
				$background = 'style="background-color: #F5F5F5"';
				$opacity = 'opacity: .3;';
				$opacityLink = 'style="opacity: 1"';
			}
			else
			{
				$background = '';
				$opacity = '';
				$opacityLink = '';
			}
	?>
		

			<div class="item new" <?php echo $background; ?>>
				<div class="item-prew" style="<?php echo $opacity; ?> background-image: url('<?php echo base_url('images/upload/'.$image['name']);?>');"></div><!--/item-prew-->
				<div class="item-info">
					<div class="item-link" <?php echo $opacityLink; ?>>
						<?=form_open();?>
							<?php
								if( $buy == FALSE ):
							?>
								<input type="button" class="in_cart" value="Уже в корзине" disabled>
							<?php
								else:
							?>
								<input type="submit" class="add-to-cart" value="Add to Cart">
							<?php
								endif;
								$buy = TRUE;
							?>
							<input type="hidden" value="<?=$item['rewrite'];?>" name="cart_name" />
							<input type="hidden" value="<?=$item['price'];?>" name="cart_price" />
							<input type="hidden" value="<?=$item['id_product'];?>" name="cart_id" />
							<input type="hidden" value="<?=$image['name'];?>" name="cart_img" />
						</form>
						<div style="clear: both;"></div>
						<a href="<?=base_url('products/get/'.$item['rewrite']);?>" class="go-to-product">Show item</a>
					</div>
					<div class="item-text">
						<h3><?php echo $item['name'];?></h3>
						<p class="price"><?php echo $item['price']*$view_money['exchange_money'];?> <?=$view_money['key_money'];?></p>
					</div>
				</div><!--/new-item-info-->
			</div><!--/new-item-->
		<?php endforeach; ?>
		
	</div><!--/grid-70-->
	<div class="grid-30">
		<div style="width: 100%; background: #FFF; padding: 10px;">
			<h4>Custom info title</h4>
			<img src="<?php echo base_url('images/upload/JBL_GT5-12.jpg');?>" style="max-width: 100%; height: 100px; float: right;" />
			<p>Успей купить неведомую хуйню по супер низкой цене до завтра и получи в подарок другую хуйню!</p>
			<p><a href="static.html">More info &raquo;</a></p>
		</div>
		<div style="width: 100%; text-align: center; margin-top: 10px;">
			<img src="<?php echo base_url('images/adw/item2.jpg');?>" style="max-width: 100%; height: 375px;" />
		</div>
	</div><!--/grid-30-->
	<div style="clear: both; height: 10px;"></div>

	<div class="grid-25">
		<h4>Custom info title</h4>
		<img src="images/item1.jpg" style="max-width: 100%; height: 100px; float: right;" />
		<p>Успей купить неведомую хуйню по супер низкой цене до завтра и получи в подарок другую хуйню!</p>
		<p><a href="static.html">More info &raquo;</a></p>
	</div><!--/grid-25-->
	<div class="grid-25">
		<h4>Custom info title</h4>
		<img src="images/item1.jpg" style="max-width: 100%; height: 100px; float: right;" />
		<p>Успей купить неведомую хуйню по супер низкой цене до завтра и получи в подарок другую хуйню!</p>
		<p><a href="static.html">More info &raquo;</a></p>
	</div><!--/grid-25-->
	<div class="grid-25">
		<h4>Custom info title</h4>
		<img src="images/item1.jpg" style="max-width: 100%; height: 100px; float: right;" />
		<p>Успей купить неведомую хуйню по супер низкой цене до завтра и получи в подарок другую хуйню!</p>
		<p><a href="static.html">More info &raquo;</a></p>
	</div><!--/grid-25-->
	<div style="clear: both;"></div>
</div><!--/content-->
</div><!--/wrapper-->
