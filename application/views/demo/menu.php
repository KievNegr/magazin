<div id="menu">
	<ul id="jMenu">
	<?php foreach( $parent_category as $item ): ?>
		<li><a href="<?=base_url('category/get/'.$item['rewrite'].'/');?>" class="fNiv"><?=$item['name'];?></a>
			<ul>
				<li class="arrow"></li>
				<?php 
				$sub_id = $this->main_md->get_sub_category($item['id_category']);
				foreach( $sub_id as $item_sub ): 
				?>				
					<li>
						<a href="<?=base_url('category/get/'.$item_sub['rewrite'].'/');?>" class="menu_h2"><?=$item_sub['name'];?></a>
							<ul>
							<?php foreach( $this->main_md->get_sub_category($item_sub['id_category']) as $item_sub_sub ): ?>
								<li><a href="<?=base_url('category/get/'.$item_sub_sub['rewrite'].'/');?>" class="sub_ul"><?=$item_sub_sub['name'];?></a></li>
							<?php endforeach; ?>
							</ul>
					</li>				
				<?php endforeach; ?>
			</ul>
		</li>
	<?php endforeach; ?>
	</ul>
</div>

<div style="clear: both;"></div>