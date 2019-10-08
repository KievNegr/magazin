<div id="content">	
		<span class="red_back"><?=$category_name;?></span>
		<div style="clear: both;"></div>
		<ul id="category">
			<?php foreach( $category as $item ): ?>	
				<li>
					<a href="<?=base_url('category/get/'.$item['rewrite'].'/');?>" class="no-underline">
						<img style="height: <?=$settings[5]['height'];?>px;" src="<?=base_url('images/upload/'.$item['image']);?>" />
					</a>
					<br>
					<a href="<?=base_url('category/get/'.$item['rewrite'].'/');?>"><?=$item['name'];?></a>
				</li>
			<?php endforeach; ?>
		</ul>
		
		<div id="filter">
			<?php 
				if( count( $products ) != 0 ):
				
					foreach( $products as $item ): 
						$image = $this->category_md->get_boss_image( $item['id_product'] );
			?>
				<?=form_open();?>
					<div class="list_item_category">
						<div style="padding: 0 10px 10px 0; width: <?=$settings[2]['width'];?>px; float: left; text-align: center;">
							<img style="width: <?=$settings[2]['width'];?>px; max-width: 100%;" src="<?=base_url('images/upload/'.$image['name']);?>" alt="<?=$item['name'];?>" title="<?=$item['name'];?>">
						</div>
						<div class="item_description">
							<a href="<?=base_url('products/get/'.$item['rewrite'].'/');?>" class="item_link"><?=$item['name'];?></a>
							<br>
							<div style="float: left; margin: 10px 20px 0 20px; height: 44px;">
								<p class="price"><?=$item['price']*$view_money['exchange_money'];?> <?=$view_money['key_money'];?></p>
								<?php
									if( $default_money['id_money'] != $view_money['id_money'] ):
								?>
								<p class="default_price">(<?=$item['price'];?> <?=$default_money['key_money'];?>)</p>
								<?php
									endif;
								?>
							</div>
							<div style="margin: 10px 0 10px 0; height: 44px;">
								<?php
									foreach( $this->cart->contents() as $in_cart )
									{
										if( $in_cart['id'] == $item['id_product'] )
										{
											$buy = FALSE;
										}
									}
									if( $buy == FALSE ):
								?>
								<input type="button" class="in_cart" value="Уже в корзине" disabled>
								<?php
									else:
								?>
									<input type="submit" class="add_cart" value="Купить">
								<?php
									endif;
									$buy = TRUE;
								?>
							</div>
							
							<p class="prev_text"><?=$item['text'];?></p>
							<input type="hidden" value="<?=$item['rewrite'];?>" name="cart_name" />
							<input type="hidden" value="<?=$item['price'];?>" name="cart_price" />
							<input type="hidden" value="<?=$item['id_product'];?>" name="cart_id" />
							<input type="hidden" value="<?=$image['name'];?>" name="cart_img" />
							
						</div>
						<div style="clear: both;"></div>
					</div>
					
				</form>
			<?php 
					endforeach;
				endif;
			?>
		</div>
			

	<input type="hidden" id="input_category" value="<?=$input_category;?>">
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
	<div style="clear: both;"></div>-->
	</div>
<div style="clear: both;"></div>