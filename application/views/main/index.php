<div id="content">
	<div class="h2_item"><h2>Новинки</h2></div>
	<div class="corner"></div>
	<div style="clear: both;"></div>
		
		<!--Выводим свежедобавленные N товаров -->
		<div id="new_item">
			<?php 
				foreach( $product as $item ): 
				//Находим главное изображение товара и его тех.данные
				$image = $this->category_md->get_boss_image( $item['id_product'] );
			?>
			<?=form_open();?>
				<a href="<?=base_url('products/get/'.$item['rewrite']);?>">
					<div class="item">
						<div class="item_img">
							<img src="<?=base_url('images/upload/'.$image['name']);?>" height="100" alt="<?=$item['name'];?>" title="<?=$item['name'];?>">
						</div>
						<!-- Управление валютой -->
						<div class="item_buy">
							<span class="price"><?=$item['price']*$view_money['exchange_money'];?> <?=$view_money['key_money'];?></span>
							<br>
							<?php
								//Если ID валюты по умолчанию и ID валюты отображения не совпадают то выводим снизу валюту по умолчанию
								if( $default_money['id_money'] != $view_money['id_money'] ):
							?>
							<span class="default_price"><?=$item['price'];?> <?=$default_money['key_money'];?></span>
							<br>
							<?php
								endif;
							?>
							<input type="submit" class="add_cart" value="Купить">
						</div>
						<div class="item_info">
							<a href="<?=base_url('products/get/'.$item['rewrite']);?>"><?=$item['name'];?></a>
							
							<input type="hidden" value="<?=$item['rewrite'];?>" name="cart_name" />
							<input type="hidden" value="<?=$item['price'];?>" name="cart_price" />
							<input type="hidden" value="<?=$item['id_product'];?>" name="cart_id" />
							<input type="hidden" value="<?=$image['name'];?>" name="cart_img" />							
						</div>
						
					</div>
				</a>
			</form>
			<?php endforeach; ?>
		</div>
		<div style="clear: both;"></div>
		<div id="action">
			<a href="#">
				<img src="<?=base_url('images/demo/akcia.jpg');?>">
			</a>
			<a href="#">	
				<img src="<?=base_url('images/demo/akcia.jpg');?>">
			</a>
		</div>
</div>
<div style="clear: both;"></div>
