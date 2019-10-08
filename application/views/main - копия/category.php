<div id="content">
	<input type="hidden" id="input_category" value="<?=$input_category;?>">
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
	<div style="clear: both;"></div>
		
		<div id="sidebar">
			<ul>
				<?php foreach( $category_sidebar as $sub_cat ): ?>
					<li><a href="<?=$sub_cat['rewrite'];?>"><?=$sub_cat['name'];?></a>
					<?php
						$sub_sub = $this->category_md->get_category($sub_cat['id_category']);
						if( count($sub_sub) != 0 ):
					?>
						<ul>
							<?php foreach( $sub_sub as $sub_sub_cat ): ?>
							<li><a href="<?=$sub_sub_cat['rewrite'];?>"><?=$sub_sub_cat['name'];?></a></li>
							<?php endforeach;?>
						</ul>
					<?php
						endif;
					?>
				<?php endforeach; ?>
			</ul>
			<?php if( count($options[0]) != 0 ): ?>
				<h4>Фильтр:</h4>
				<ul id="filter_category">
				<?php 
					$t = 0;
					$n = 1;
					foreach( $options as $name_options ):
				?>
					<li>
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
										<li><input type="checkbox" class="category_check<?=$n;?>"><?=$val_option;?>
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
		
		<div id="list-item-category">
			
			<?php foreach( $category as $item ): ?>	
			<div class="item_category">
				<img width="<?=$settings[5]['width'];?>" src="<?=base_url('images/upload/'.$item['image']);?>" class="img_category" />
				<a href="<?=base_url('category/get/'.$item['rewrite'].'/');?>" class="category_link"><?=$item['name'];?></a>
			</div>
			<?php endforeach; ?>
		
			<div style="clear: both;"></div>
			<div id="filter">
				<?php if( count( $products ) != 0 ):?>
					<h1><?=$category_name;?></h1>
					<?php 
						foreach( $products as $item ): 
						$image = $this->category_md->get_boss_image( $item['id_product'] );
					?>
					<?=form_open();?>
						<div style="width: <?=$settings[2]['width'];?>px; float: left; text-align: center;">
							<img height="<?=$settings[2]['height'];?>" src="<?=base_url('images/upload/thumbs/'.$image['name']);?>" alt="Товар" title="Товар">
						</div>
						<div class="item_description">
							<a href="<?=base_url('products/get/'.$item['rewrite'].'/');?>" class="item_link"><?=$item['name'];?></a>
							<span class="p"><?=$item['text'];?></span>
							<input type="hidden" value="<?=$item['rewrite'];?>" name="cart_name" />
							<input type="hidden" value="<?=$item['price'];?>" name="cart_price" />
							<input type="hidden" value="<?=$item['id_product'];?>" name="cart_id" />
							<input type="hidden" value="<?=$image['name'];?>" name="cart_img" />
							<p class="price"><?=$item['price'];?> <?=$money['key_money'];?><input type="submit" class="add_cart" value="Купить"></p>
						</div>
						<div style="clear: both;"></div>
					</form>
					<?php endforeach; ?>
				<?php endif;?>
			</div>
		</div>
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