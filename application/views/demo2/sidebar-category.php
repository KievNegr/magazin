<div id="sidebar">
	<ul id="sidebar-category">
		<?php foreach( $category_sidebar as $sub_cat ): ?>
			<li><a href="<?=$sub_cat['rewrite'];?>" class="h_a"><?=$sub_cat['name'];?></a>
			<?php
				$sub_sub = $this->category_md->get_category($sub_cat['id_category']);
				if( count($sub_sub) != 0 ):
			?>
				<ul>
					<?php foreach( $sub_sub as $sub_sub_cat ): ?>
					<li><a href="<?=$sub_sub_cat['rewrite'];?>" class="no-underline"><?=$sub_sub_cat['name'];?></a></li>
					<?php endforeach;?>
				</ul>
			<?php
				endif;
			?>
			</li>
		<?php endforeach; ?>
	</ul>
		<?php
			if( count($options[0]) != 0 ):
				$root =base_url('category/get/' . $input_category);
				foreach( $options as $res_options ):
					$title = 0;
			
					foreach($res_options['value'] as $val)
					{
						$arrValHash = explode('##', $val);
						$show = FALSE;
						if(!empty($filter))
						{
							//$show = FALSE;
							$catFilter = explode(';', $filter);
							$d = '';
							$d1 = '';
							$n = '';
							foreach($catFilter as $key => $arr1)
							{
								$sub = explode('=', $arr1);
								//print_r($sub);
								if($sub[0] == $res_options['id_option'])
								{
									$arrHash = explode(',', $sub[1]);
									//print_r($arrHash);
									if( in_array($arrValHash[1], $arrHash) )
									{
										if($title == 0 )
										{
											echo '<h6 style="margin-left: 10px;">' . $res_options['name'] . ', ' . $res_options['measurement'] . '</h6>';
											$title = 1;
										}
										
										$l = '';
										foreach( $arrHash as $new )
										{
											if($new != $arrValHash[1])
											{
												$l .= $new . ',';
											}
										}
										if(strlen(substr($l, 0, strlen($l) -1)) > 0 )
										{
											$n = $sub[0] . '=' . substr($l, 0, strlen($l) -1) . ';';
										}
										else
										{
											$n = '';
										}
										
										$show = TRUE;
									}
								}
								else
								{
									$d .= ';' . $sub[0] . '=' . $sub[1];
									$d1 .= ';' . $sub[0] . '=' . $sub[1];
									if( empty($n) )
									{
										$d = substr($d1, 1);
									}

								}
							}
							if( $show == TRUE )
							{
								if( substr($d, 0, 1) == ';' )
								{
									$d = substr($d, 1, strlen($d));
								}
								echo '<p style="display: inline-block; border-radius: 3px; margin: 5px; padding: 3px; background: #EEE;"><a href="' . $root . '/' . $n . $d .'">' . $arrValHash[0] . '</a></p>';
							}
						}
					}
				endforeach; 
		?>

		<h4>Подбор товара</h4>
		<ul id="filter_category">
		<?php 
			
			foreach( $options as $res_options ):
		?>
			<li class="filter_head">
				<?php
					echo $res_options['name'] . ', ' . $res_options['measurement'];
				?>
				<ul>
					<?php
						foreach($res_options['value'] as $val)
						{
							$show = TRUE;
							$add = FALSE;
							$arrValHash = explode('##', $val);

							$d = '';
							$d1 = '';
							$n = '';

							if(!empty($filter))
							{
								$catFilter = explode(';', $filter);

								foreach($catFilter as $arr1)
								{
									$sub = explode('=', $arr1);

									if($sub[0] == $res_options['id_option'])
									{
										$arrHash = explode(',', $sub[1]);
										if( in_array($arrValHash[1], $arrHash) )
										{
											$show = FALSE;
										}
										else
										{
											$adding = $sub[1] . ',' . $arrValHash[1];
											//echo $sub[1] . '<br>';
											$d .= ';' . $res_options['id_option'] . '=' . $adding;
											//echo 'a<br>';
											//print_r($arrHash);
										}
									}
									else
									{
										foreach($catFilter as $arr2)
										{
											$sub2 = explode('=', $arr2);
											if( $sub2[0] == $res_options['id_option'] )
											{
												$add = TRUE;
											}
										}
										if($add == TRUE)
										{
											$d .= ';' . $arr1;//$sub[0] . '=' . $sub[1];
										}
										else
										{
											$d = $filter . ';' . $res_options['id_option'] . '=' . $arrValHash[1];
										}
									}
								}
							}
							else
							{
								$d = $res_options['id_option'] . '=' . $arrValHash[1];
							}

							if( $show == TRUE )
							{
								if( substr($d, 0, 1) == ';' )
								{
									$d = substr($d, 1, strlen($d));
								}
								echo '<li><a href="' . $root . '/' . $d . '">' . $arrValHash[0] . '</a></li>';
							}
						}
					?>
				</ul>
			</li>					
		<?php 	
			endforeach; 
		?>
		</ul>
	<?php endif; ?>
	
</div>