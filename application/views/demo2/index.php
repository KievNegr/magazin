<script type="text/javascript" src="<?=base_url('themes/demo2/js/slider.js');?>"></script>
<div id="content">
	<span class="red_back">Новинки</span>	
	<!--Выводим свежедобавленные N товаров -->
	
	<div class="slider">
		<div class="slide-list">
			<div class="slide-wrap">
				<?php 
					foreach( $product as $item ): 
					//Находим главное изображение товара и его тех.данные
					$image = $this->category_md->get_boss_image( $item['id_product'] );
				?>
				<?=form_open();?>
					<a href="<?=base_url('products/get/'.$item['rewrite']);?>">
				<div class="slide-item">
					<div class="item_img">
						<img src="<?=base_url('images/upload/'.$image['name']);?>" height="100" alt="<?=$item['name'];?>" title="<?=$item['name'];?>">
					</div>
					
					<div class="item_info">
						<a href="<?=base_url('products/get/'.$item['rewrite']);?>"><?=$item['name'];?></a>
						
						<input type="hidden" value="<?=$item['rewrite'];?>" name="cart_name" />
						<input type="hidden" value="<?=$item['price'];?>" name="cart_price" />
						<input type="hidden" value="<?=$item['id_product'];?>" name="cart_id" />
						<input type="hidden" value="<?=$image['name'];?>" name="cart_img" />							
					</div>
					<!-- Управление валютой -->
					<div class="item_buy">
						<span class="price"><?=$item['price']*$view_money['exchange_money'];?> <?=$view_money['key_money'];?></span>
						<input type="submit" class="add_cart" value="Купить">
					</div>
					</a>
				
				</div>
				</form>
				<?php endforeach; ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="navy prev-slide"></div>
		<div class="navy next-slide"></div>
	</div>
</div>
<div style="clear: both;"></div>
