<div id="content">
	<div class="h2_item"><h2>Популярные товары</h2></div><div class="arrow"></div><div style="clear: both;"></div>
		<div class="margin">
			<?php 
				foreach( $product as $item ): 
				$image = $this->category_md->get_boss_image( $item['id_product'] );
			?>
			<?=form_open();?>
			<div class="item">
				<img src="<?=base_url('images/upload/'.$image['name']);?>"  alt="Товар" title="Товар" class="item_img">
				<p><a href="<?=base_url('products/get/'.$item['rewrite']);?>" class="item_link"><?=$item['name'];?></a></p>
				
				<input type="hidden" value="<?=$item['rewrite'];?>" name="cart_name" />
				<input type="hidden" value="<?=$item['price'];?>" name="cart_price" />
				<input type="hidden" value="<?=$item['id_product'];?>" name="cart_id" />
				<input type="hidden" value="<?=$image['name'];?>" name="cart_img" />
				
				<span class="price"><?=$item['price'];?> <?=$money['key_money'];?></span><input type="submit" class="add_cart" value="Купить">
			</div>
			</form>
			<?php endforeach; ?>
			
		</div>
</div>
<div style="clear: both;"></div>