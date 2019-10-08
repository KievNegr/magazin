		<div id="empty"></div>
		</div>
		<div id="footer">
			<div class="footer_info">
				<a href="<?=base_url();?>"><img src="<?=base_url('themes/demo2/images/logo_footer.jpg');?>" alt="<?=$title; ?>" title="<?=$title; ?>"></a>
				<p>&copy; 2012 <?=$title; ?></p>
				<p>График работы: круглосуточно</p>
			</div>
			<div class="footer_info">
				<h3>Информация</h3>
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">О магазине</a></li>
					<li><a href="#">Доставка</a></li>
					<li><a href="#">Оплата</a></li>
					<li><a href="#">Контакты</a></li>
				</ul>
			</div>
			<div class="footer_info">
				<h3>Категории</h3>
				<ul>
					<?php 
						foreach( $parent_category as $item ): 
					?>
					<li><a href="<?=base_url('category/get/'.$item['rewrite'].'/');?>"><?=$item['name'];?></a></li>
					<?php
						endforeach;
					?>
				</ul>
			</div>
		</div>		
	</body>
</html>