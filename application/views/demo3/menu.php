<ul id="menu">
	<?php foreach( $parent_category as $item ): ?>
		<li><a href="<?php echo base_url('category/get/'.$item['rewrite'].'/');?>"><?php echo $item['name'];?></a>
			<ul>
				<?php 
				$sub_id = $this->main_md->get_sub_category($item['id_category']);
				foreach( $sub_id as $item_sub ): 
				?>				
					<li>
						<a href="<?php echo base_url('category/get/'.$item_sub['rewrite'].'/');?>" class="sub-ahead"><?php echo $item_sub['name'];?></a>
					</li>				
				<?php endforeach; ?>
			</ul>
		</li>
	<?php endforeach; ?>
</ul><!--/menu-->