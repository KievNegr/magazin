<div id="content">	
	<div id="sidebar">
		<div class="h2_item"><h2><?=$category_name;?></h2></div>
		<div class="corner"></div>
		<div style="clear: both;"></div>
		<ul>
			<?php foreach( $category_sidebar as $sub_cat ): ?>
				<li class="h_ul"><a href="<?=$sub_cat['rewrite'];?>" class="h_a"><?=$sub_cat['name'];?></a>
				<?php
					$sub_sub = $this->category_md->get_category($sub_cat['id_category']);
					if( count($sub_sub) != 0 ):
				?>
					<ul>
						<?php foreach( $sub_sub as $sub_sub_cat ): ?>
						<li class="s_ul"><a href="<?=$sub_sub_cat['rewrite'];?>" class="s_a"><?=$sub_sub_cat['name'];?></a></li>
						<?php endforeach;?>
					</ul>
				<?php
					endif;
				?>
			<?php endforeach; ?>
		</ul>
		
		<?php if( count($options[0]) != 0 ): ?>
			<ul id="filter_category">
			<?php 
				$t = 0;
				$n = 1;
				foreach( $options as $name_options ):
			?>
				<li class="filter_head">
					<?php
						echo $name_options['name'];
						$temp = Array();
						$i = 0;
					?>
					<ul>
						<?php
							foreach( $options_item[$t] as $val_option ): 
								if( !in_array($val_option, $temp) ):
						?>
									<li class="filter_option"><input type="checkbox" class="category_check<?=$n;?>"><?=$val_option;?>
									<input type="hidden" value="<?=$val_option.'_'.$name_options['id_option'];?>" class="idnum">
									</li>
						<?php
									array_push($temp, $val_option);
									$i++;
									$n++;
								endif;
							endforeach; 
						?>
					</ul>
				</li>					
			<?php 	
				$t++;
				endforeach; 
			?>
			</ul>
			<input type="hidden" name="count_chk" value="<?=$n-1;?>" id="count_chk">
		<?php endif; ?>
	</div>
	
	<div id="list-category">
		<h1><?=$category_name;?></h1>
		<div style="clear: both;"></div>
		<?php foreach( $category as $item ): ?>	
			<a href="<?=base_url('category/get/'.$item['rewrite'].'/');?>" class="category_link">
				<div class="item_category">
					<img style="height: <?=$settings[5]['height'];?>px; float: left;" src="<?=base_url('images/upload/'.$item['image']);?>" />
					<a href="<?=base_url('category/get/'.$item['rewrite'].'/');?>" class="category_link"><?=$item['name'];?></a>
				</div>
			</a>
		<?php endforeach; ?>
		<div id="filter">
			<?php 
				if( count( $products ) != 0 ):
				
					foreach( $products as $item ): 
						$image = $this->category_md->get_boss_image( $item['id_product'] );
			?>
				<?=form_open();?>
					<div class="list_item_category">
						<div style="width: <?=$settings[2]['width'];?>px; float: left; text-align: center;">
							<img height="<?=$settings[2]['height'];?>" src="<?=base_url('images/upload/'.$image['name']);?>" alt="Товар" title="Товар">
						</div>
						<div class="item_description">
							<a href="<?=base_url('products/get/'.$item['rewrite'].'/');?>" class="item_link"><?=$item['name'];?></a>
							<p><?=$item['text'];?></p>
							<input type="hidden" value="<?=$item['rewrite'];?>" name="cart_name" />
							<input type="hidden" value="<?=$item['price'];?>" name="cart_price" />
							<input type="hidden" value="<?=$item['id_product'];?>" name="cart_id" />
							<input type="hidden" value="<?=$image['name'];?>" name="cart_img" />
							<div class="box_price">
							<span class="price"><?=$item['price']*$view_money['exchange_money'];?> <?=$view_money['key_money'];?></span>
							<?php
								if( $default_money['id_money'] != $view_money['id_money'] ):
							?>
							<span class="default_price"><?=$item['price'];?> <?=$default_money['key_money'];?></span>
							<?php
								endif;
							?>
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
						</div>
					</div>
					<div style="clear: both;"></div>
				</form>
			<?php 
					endforeach;
				endif;
			?>
		</div>
	</div>
	<!-------------------------------------------------------- 
	
	-->
		<!--<div id="sidebar">

			
		</div>
		
		
			
		<div id="list-item-category">
			
			<div id="filter">
				<?php if( count( $products ) != 0 ):?>
					<h1><?=$category_name;?></h1>
					<?php 
						foreach( $products as $item ): 
						$image = $this->category_md->get_boss_image( $item['id_product'] );
					?>
					<?=form_open();?>
						<div class="list_item_category">
							<div style="width: <?=$settings[2]['width'];?>px; float: left; text-align: center;">
								<img height="<?=$settings[2]['height'];?>" src="<?=base_url('images/upload/'.$image['name']);?>" alt="Товар" title="Товар">
							</div>
							<div class="item_description">
								<a href="<?=base_url('products/get/'.$item['rewrite'].'/');?>" class="item_link"><?=$item['name'];?></a>
								<p><?=$item['text'];?></p>
								<input type="hidden" value="<?=$item['rewrite'];?>" name="cart_name" />
								<input type="hidden" value="<?=$item['price'];?>" name="cart_price" />
								<input type="hidden" value="<?=$item['id_product'];?>" name="cart_id" />
								<input type="hidden" value="<?=$image['name'];?>" name="cart_img" />
								<div class="box_price">
								<span class="price"><?=$item['price']*$view_money['exchange_money'];?> <?=$view_money['key_money'];?></span>
								<?php
									if( $default_money['id_money'] != $view_money['id_money'] ):
								?>
								<span class="default_price"><?=$item['price'];?> <?=$default_money['key_money'];?></span>
								<?php
									endif;
								?>
								
								<input type="submit" class="add_cart" value="Купить">
								</div>
							</div>
						</div>
						<div style="clear: both;"></div>
					</form>
					<?php endforeach; ?>
				<?php endif;?>
			</div>
		</div>
	-->
			

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
<script type="text/javascript">
	$(document).ready(function()
	{
		$("input").click(function()
		{
			count_chk = $("#count_chk").val();

			i = 1;
			data = new Object();
			data['chek[0]'] = $("#input_category").val();
			while( i <= count_chk )
			{
				if( $(".category_check" + i).prop('checked') )
				{
					data['chek['+i+']'] = $(".category_check" + i).next(".idnum").val();
				}
				i++;
			}
			
			$.ajax({            
				url: '<?=base_url('category/filter');?>',
				type: "POST",
				data: data,
				success: res
			});
		});
		
		function res(data)
		{
			$("#filter").html(data);
		}
		
		$("#filter").ajaxSend(
			function(){
				$(this).html("<img src=<?=base_url('images/admin/ajax-loader.gif');?> />");
			}
		);
	});
</script>