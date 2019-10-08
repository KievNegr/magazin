<ul id="category">
	<?php foreach( $parent_category as $item ): ?>
		<li>
			<div class="sub_category">
			<?php 
				$sub_id = $this->main_md->get_sub_category($item['id_category']);
				foreach( $sub_id as $item_sub ): 
			?>				
				<div class="submenu_category">
					<a href="<?=base_url('category/get/'.$item_sub['rewrite'].'/');?>" class="menu_h2"><?=$item_sub['name'];?></a>
						<?php foreach( $this->main_md->get_sub_category($item_sub['id_category']) as $item_sub_sub ): ?>
							<p><a href="<?=base_url('category/get/'.$item_sub_sub['rewrite'].'/');?>" class="sub_ul"><?=$item_sub_sub['name'];?></a></p>
						<?php endforeach; ?>
				</div>				
			<?php endforeach; ?>
			</div>
			<a href="<?=base_url('category/get/'.$item['rewrite'].'/');?>" class="category_link"><?=$item['name'];?></a>
		</li>
	<?php endforeach; ?>
</ul>
<div style="clear: both;"></div>