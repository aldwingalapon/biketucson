<?php get_header(); ?>

<svg class="defs-only" style="display:none;">
  <filter id="monochrome" color-interpolation-filters="sRGB"
          x="0" y="0" height="100%" width="100%">
    <feColorMatrix type="matrix"
      values="0.77 0 0 0  0 
              0.84 0 0 0  0  
              0.88 0 0 0  0 
                0  0 0 1  0" />
  </filter>
  <filter id="monochrome1" color-interpolation-filters="sRGB"
          x="0" y="0" height="100%" width="100%">
    <feColorMatrix type="matrix"
      values="0.96 0 0 0  0 
              0.77 0 0 0  0  
              0.78 0 0 0  0 
                0  0 0 1  0" />
  </filter>
  <filter id="monochrome2" color-interpolation-filters="sRGB"
          x="0" y="0" height="100%" width="100%">
    <feColorMatrix type="matrix"
      values="0.96 0 0 0  0 
              0.73 0 0 0  0  
              0.04 0 0 0  0 
                0  0 0 1  0" />
  </filter>
</svg>
<div id="main-content" class="homepage frontpage">
	<!-- Hero Banner Section -->
	<?php if(get_field('show_hero_banner', 'option')) {
		$hero_banner_category = get_field('hero_banner_category', 'option');
		$banner_width = get_field('banner_width', 'option');
		$menu_position = get_field('menu_position', 'option');
		$menu_name = get_field('menu_name', 'option');
		$menu_margin_top = get_field('menu_margin_top', 'option');
		$menu_margin_bottom = get_field('menu_margin_bottom', 'option');
	?>
		<?php if(($banner_width)=='Grid'){ ?>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
		<?php } ?>
			<?php if(($menu_position)=='Top of Banner'){ ?>
				<div class="banner-menu-top"<?php echo(($menu_margin_top || $menu_margin_bottom) ? ' style=" ' . ($menu_margin_top ? 'margin-top:' . $menu_margin_top . 'px;' : '') . ($menu_margin_bottom ? 'margin-bottom:' . $menu_margin_bottom . 'px;' : '')  . ' "' : ''); ?>>
					<?php wp_nav_menu( array('theme_location' => 'secondary_navigation')); ?>
				</div>
			<?php } ?>
			<div class="hero-banner">
				<div class="overlay"></div>
				<?php 
					$args = array(
						'posts_per_page' => -1,
						'post_type' =>	'slider',
						'status'	=>	'publish',
						'orderby'	=>	'menu_order',
						'order'	=>	'ASC',
						'tax_query' =>
							array(
								array(
									'taxonomy' => 'slider_position',
									'field'    => 'name',
									'terms' => $hero_banner_category->name,                                    
								),
							), 
					);
								
					$slider = New WP_Query($args);
				?>
				<?php if ($slider) : $i = 1; ?>
					<div class="owl-carousel" id="hero-owl-carousel">
						<?php  while ( $slider->have_posts() ) : $slider->the_post(); $slider_id = get_the_ID();  ?>
							<div class="hero-item">
								<div class="container">
									<div class="hero-caption">
										<h2><?php echo get_the_title($slider_id); ?></h2>
										<p><?php echo get_post_field('post_content', $slider_id); ?></p>
										<?php if(get_field('show_link_button_1', $slider_id) || get_field('show_link_button_2', $slider_id)) { ?>
											<p class="hero-buttons">
												<?php if(get_field('show_link_button_1', $slider_id)) { ?>
													<?php if(get_field('button_on_click_event_1', $slider_id)) { ?>
														<a class="hero_button_<?php echo $slider_id; ?>_first<?php echo ((get_field('button_type_1', $slider_id) == 'Primary') ? ' btn-primary button' : ' btn-secondary button'); ?>"<?php echo (get_field('button_on_click_event_1', $slider_id) ? ' onclick="' . get_field('button_on_click_event_1', $slider_id) . '"' : ''); ?>><?php echo (get_field('button_text_1', $slider_id) ? get_field('button_text_1', $slider_id) : ''); ?></a>
													<?php } else { ?>
														<a href="<?php echo (get_field('button_link_1', $slider_id) ? get_field('button_link_1', $slider_id) : ''); ?>" class="hero_button_<?php echo $slider_id; ?>_first<?php echo (get_field('button_id_1', $slider_id) ? ' modal-dialog-'.get_field('button_id_1', $slider_id) : ''); ?><?php echo ((get_field('button_type_1', $slider_id) == 'Primary') ? ' btn-primary button' : ' btn-secondary button'); ?>"><?php echo (get_field('button_text_1', $slider_id) ? get_field('button_text_1', $slider_id) : ''); ?></a>
													<?php } ?>
													<?php if(get_field('button_icon_1', $slider_id) && get_field('button_icon_position_1', $slider_id)) {
														$img_1 = get_field('button_icon_1', $slider_id );
														$button_icon_1 = $img_1['url'];
														$button_icon_1_width = $img_1['width'];
														$button_icon_1_height = $img_1['height'];
														$button_icon_1_width_actual = ($img_1['width']/$img_1['height'])*12;
														$button_icon_1_height_actual = 12;
														
														if (get_field('button_icon_position_1', $slider_id) == 'Before'){
													?>	
															<style>
																.hero_button_<?php echo $slider_id; ?>_first:before{content:'';margin-right:12px;display: inline-block;vertical-align:middle;background:transparent url(<?php echo $button_icon_1; ?>) no-repeat center;width:<?php echo $button_icon_1_width_actual; ?>px; height:<?php echo $button_icon_1_height_actual; ?>px;background-size:contain;margin-bottom: 3px;}
															</style>
														<?php } else { ?>
															<style>
																.hero_button_<?php echo $slider_id; ?>_first:after{content:'';margin-left:12px;display: inline-block;vertical-align: middle;background:transparent url(<?php echo $button_icon_1; ?>) no-repeat center;width:<?php echo $button_icon_1_width_actual; ?>px; height:<?php echo $button_icon_1_height_actual; ?>px;background-size:contain;margin-bottom: 3px;}
															</style>
													<?php
															}
														}
													?>
												<?php } ?>
												
												<?php if(get_field('show_link_button_2', $slider_id)) { ?>
													<?php if(get_field('button_on_click_event_2', $slider_id)) { ?>
														<a class="hero_button_<?php echo $slider_id; ?>_second<?php echo ((get_field('button_type_2', $slider_id) == 'Primary') ? ' btn-primary button' : ' btn-secondary button'); ?>"<?php echo (get_field('button_on_click_event_2', $slider_id) ? ' onclick="' . get_field('button_on_click_event_2', $slider_id) . '"' : ''); ?>><?php echo (get_field('button_text_2', $slider_id) ? get_field('button_text_2', $slider_id) : ''); ?></a>
													<?php } else { ?>
														<a href="<?php echo (get_field('button_link_2', $slider_id) ? get_field('button_link_2', $slider_id) : ''); ?>" class="hero_button_<?php echo $slider_id; ?>_second<?php echo (get_field('button_id_2', $slider_id) ? ' modal-dialog-'.get_field('button_id_2', $slider_id) : ''); ?><?php echo ((get_field('button_type_2', $slider_id) == 'Primary') ? ' btn-primary button' : ' btn-secondary button'); ?>"><?php echo (get_field('button_text_2', $slider_id) ? get_field('button_text_2', $slider_id) : ''); ?></a>
													<?php } ?>
													<?php if(get_field('button_icon_2', $slider_id) && get_field('button_icon_position_2', $slider_id)) {
														$img_2 = get_field('button_icon_2', $slider_id );
														$button_icon_2 = $img_2['url'];
														$button_icon_2_width = $img_2['width'];
														$button_icon_2_height = $img_2['height'];
														$button_icon_2_width_actual = ($img_2['width']/$img_2['height'])*12;
														$button_icon_2_height_actual = 12;
														
														if (get_field('button_icon_position_2', $slider_id) == 'Before'){
													?>	
															<style>
																.hero_button_<?php echo $slider_id; ?>_second:before{content:'';margin-right:12px;display: inline-block;vertical-align:middle;background:transparent url(<?php echo $button_icon_2; ?>) no-repeat center;width:<?php echo $button_icon_2_width_actual; ?>px; height:<?php echo $button_icon_2_height_actual; ?>px;background-size:contain;margin-bottom: 3px;}
															</style>
														<?php } else { ?>
															<style>
																.hero_button_<?php echo $slider_id; ?>_second:after{content:'';margin-left:12px;display: inline-block;vertical-align: middle;background:transparent url(<?php echo $button_icon_2; ?>) no-repeat center;width:<?php echo $button_icon_2_width_actual; ?>px; height:<?php echo $button_icon_2_height_actual; ?>px;background-size:contain;margin-bottom: 3px;}
															</style>
													<?php
															}
														}
													?>												
												<?php } ?>
											</p>
										<?php } ?>
									</div>
								</div>
								<?php if ( has_post_thumbnail() ) {
									$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($slider_id), 'full' );
									$feature_icon = $image_url[0];
									echo '<div class="hero-image lazy-image" data-src="' . $feature_icon . '"><img src="' . $feature_icon . '" /></div>';
								} ?>					
							</div>
						<?php endwhile; ?>
					</div>
				<?php else : endif; ?>		
			</div>
			<?php if(($menu_position)=='Bottom of Banner'){ ?>
				<div class="banner-menu-bottom"<?php echo(($menu_margin_top || $menu_margin_bottom) ? ' style=" ' . ($menu_margin_top ? 'margin-top:' . $menu_margin_top . 'px;' : '') . ($menu_margin_bottom ? 'margin-bottom:' . $menu_margin_bottom . 'px;' : '')  . ' "' : ''); ?>>
					<?php wp_nav_menu( array('theme_location' => 'secondary_navigation')); ?>
				</div>
			<?php } ?>
		<?php if(($banner_width)=='Grid'){ ?>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		<?php } ?>
	<?php } ?>
	<?php if( have_rows('section_item', 'option' ) ): ?>
		<?php while ( have_rows('section_item', 'option' ) ) : the_row();
			$show_section = get_sub_field('show_section');
			$section_id = get_sub_field('section_id');
			$section_class = get_sub_field('section_class');
			$section_background_color = get_sub_field('section_background_color');
			$section_padding_top = get_sub_field('section_padding_top');
			$section_padding_bottom = get_sub_field('section_padding_bottom');
			$section_title = get_sub_field('section_title');
			$section_title_color = get_sub_field('section_title_color');
			$section_title_style = get_sub_field('section_title_style');
			$section_description = get_sub_field('section_description');
			$section_description_color = get_sub_field('section_description_color');
			$section_description_style = get_sub_field('section_description_style');

			$section_content_type = get_sub_field('section_content_type');
			$section_content_post_type = get_sub_field('section_content_post_type');
			$section_content_post_count = get_sub_field('section_content_post_count');
			$section_content_post_ids = get_sub_field('section_content_post_ids'); 
			$section_content_post_order_by = get_sub_field('section_content_post_order_by');
			$section_content_post_order = get_sub_field('section_content_post_order');
			$show_section_content_post_thumbnail = get_sub_field('show_section_content_post_thumbnail');
			$section_content_post_thumbnail_style = get_sub_field('section_content_post_thumbnail_style');
			$show_section_content_post_title = get_sub_field('show_section_content_post_title');
			$section_content_post_title_position = get_sub_field('section_content_post_title_position');
			$show_section_content_post_excerpt = get_sub_field('show_section_content_post_excerpt');
			$show_section_content_post_read_more = get_sub_field('show_section_content_post_read_more');
			$post_read_more_text = get_sub_field('post_read_more_text');
			$post_read_more_button_type = get_sub_field('post_read_more_button_type');

			$section_content_column_count = get_sub_field('section_content_column_count');
			
			$column_one = get_sub_field('column_one');
			$column_one_class = get_sub_field('column_one_class');
			$column_two = get_sub_field('column_two');
			$column_two_class = get_sub_field('column_two_class');
			$column_three = get_sub_field('column_three');
			$column_three_class = get_sub_field('column_three_class');
			$column_four = get_sub_field('column_four');
			$column_four_class = get_sub_field('column_four_class');
			
			$show_bottom_ads = get_sub_field('show_bottom_ads');
			$bottom_left_ad = get_sub_field('bottom_left_ad');
			$bottom_right_ad = get_sub_field('bottom_right_ad');
			$bottom_ads_margin_top = get_sub_field('bottom_ads_margin_top');
			$bottom_ads_margin_bottom = get_sub_field('bottom_ads_margin_bottom');
		?>
			<?php if($show_section) { ?>
				<div<?php echo($section_id ? ' id="' . $section_id . '"' : ''); ?><?php echo($section_class ? ' class="' . $section_class . ' section"' : ''); ?><?php echo(($section_background_color || $section_padding_top || $section_padding_bottom) ? ' style="' . (($section_background_color) ? 'background-color:' . $section_background_color . ';' : '') . (($section_padding_top) ? 'padding-top:' . $section_padding_top . 'rem;' : '') . (($section_padding_bottom) ? 'padding-bottom:' . $section_padding_bottom . 'rem;' : '') . '"' : ''); ?>>
					<div class="container">
						<div class="row-fluid">
							<?php if($section_title) { ?>
								<div class="col-md-12">
									<?php echo(($section_title) ? '<h2 ' . (($section_title_color || $section_title_style) ? ' style=" ' . (($section_title_color) ? 'color:' . $section_title_color . ' !important;' : '') . $section_title_style . ' "' : '') . '>' . $section_title . ($section_description ? '<div class="clearfix"' . (($section_description_color || $section_description_style) ? ' style=" ' . ($section_description_color ? 'color:' . $section_description_color . ' !important;' : '') . $section_description_style . ' "' : '') . '>' . $section_description . '</div>' : '') . '</h2>' : ''); ?>
								</div>
								<div class="clearfix"></div>
							<?php } ?>
							<?php if(($section_content_type) == 'Custom Content') { ?>
								<div class="custom">
									<?php if(($section_content_column_count) == 'One Column'){ ?>
										<div class="<?php echo $column_one_class; ?>">
											<div class="inner-content">
												<?php echo $column_one; ?>
											</div>
										</div>
									<?php } elseif(($section_content_column_count) == 'Two Columns'){ ?>
										<div class="<?php echo $column_one_class; ?>">
											<div class="inner-content">
												<?php echo $column_one; ?>
											</div>
										</div>
										<div class="<?php echo $column_two_class; ?>">
											<div class="inner-content">
												<?php echo $column_two; ?>
											</div>
										</div>
									<?php } elseif(($section_content_column_count) == 'Three Columns'){ ?>
										<div class="<?php echo $column_one_class; ?>">
											<div class="inner-content">
												<?php echo $column_one; ?>
											</div>
										</div>
										<div class="<?php echo $column_two_class; ?>">
											<div class="inner-content">
												<?php echo $column_two; ?>
											</div>
										</div>
										<div class="<?php echo $column_three_class; ?>">
											<div class="inner-content">
												<?php echo $column_three; ?>
											</div>
										</div>
									<?php } elseif(($section_content_column_count) == 'Four Columns'){ ?>
										<div class="<?php echo $column_one_class; ?>">
											<div class="inner-content">
												<?php echo $column_one; ?>
											</div>
										</div>
										<div class="<?php echo $column_two_class; ?>">
											<div class="inner-content">
												<?php echo $column_two; ?>
											</div>
										</div>
										<div class="<?php echo $column_three_class; ?>">
											<div class="inner-content">
												<?php echo $column_three; ?>
											</div>
										</div>
										<div class="<?php echo $column_four_class; ?>">
											<div class="inner-content">
												<?php echo $column_four; ?>
											</div>
										</div>
									<?php }	?>
								</div>
								<div class="clearfix"></div>
							<?php } elseif(($section_content_type) == 'Query Content') { ?>
								<?php
									
									if(($section_content_column_count) == 'One Column'){
										$col_count = 1;
										$col_class = 'col-md-12';
									} elseif(($section_content_column_count) == 'Two Columns'){
										$col_count = 2;
										$col_class = 'col-md-6';
									} elseif(($section_content_column_count) == 'Three Columns'){
										$col_count = 3;
										$col_class = 'col-md-4';
									} elseif(($section_content_column_count) == 'Four Columns'){
										$col_count = 4;
										$col_class = 'col-md-3';
									}
									
									if($section_content_post_ids){
										$myarray = explode(",", $section_content_post_ids);
										$args = array(
											'post__in' =>	$myarray,
											'post_type' =>	$section_content_post_type,
											'status'	=>	'publish',
											'orderby'	=>	$section_content_post_order_by,
											'order'	=>	$section_content_post_order
										);
									} else {
										$args = array(
											'posts_per_page' => $section_content_post_count,
											'post_type' =>	$section_content_post_type,
											'status'	=>	'publish',
											'orderby'	=>	$section_content_post_order_by,
											'order'	=>	$section_content_post_order
										);
									}
									//var_dump($args);
									$query_item = New WP_Query($args);
								?>
								<?php if ($query_item) : $i = 1; ?>
									<?php  while ( $query_item->have_posts() ) : $query_item->the_post();
										$query_item_id = get_the_ID();
										$query_item_icon = '';
										if ( has_post_thumbnail() ) {
											if($section_content_post_thumbnail_style=='oval'){
												$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($query_item_id), 'full' );
											}else{
												$image_url = wp_get_attachment_image_src( get_post_thumbnail_id($query_item_id), 'feature-thumbnails' );
											}
											$query_item_icon = $image_url[0];
										}
									?>
										<div class="query">
											<div class="<?php echo $col_class; ?>">
												<div class="inner-content">
													<?php if(($section_content_post_title_position) == 'Above the Image') {?>
														<h3 class="query-title"><a href="<?php echo get_permalink($query_item_id ); ?>" title="<?php echo get_the_title($query_item_id ); ?>"><?php echo get_the_title($query_item_id ); ?></a></h3>
													<?php } ?>
													<?php if(($show_section_content_post_thumbnail) && ($query_item_icon != '')) { ?>
														<a href="<?php echo get_permalink($query_item_id ); ?>" title="<?php echo get_the_title($query_item_id ); ?>"><img src="<?php echo $query_item_icon; ?>" class="thumb-<?php echo $section_content_post_thumbnail_style; ?>" alt="<?php echo get_the_title($query_item_id ); ?>" title="<?php echo get_the_title($query_item_id ); ?>" /></a>
													<?php } ?>
													<?php if(($section_content_post_title_position) == 'Below the Image') {?>
														<h3 class="query-title"><a href="<?php echo get_permalink($query_item_id ); ?>" title="<?php echo get_the_title($query_item_id ); ?>"><?php echo get_the_title($query_item_id ); ?></a></h3>
													<?php } ?>
													<?php if($show_section_content_post_excerpt) {?>
														<div class="post-excerpt">
															<?php the_excerpt(); ?>
														</div>
													<?php } ?>
													<?php if($show_section_content_post_read_more) {?>
														<div class="read-more-button">
															<?php echo (($post_read_more_text) ? '<a href="' . get_permalink($query_item_id ) . '" title="' . get_the_title($query_item_id ) . '" class="btn ' . $post_read_more_button_type . '">' . $post_read_more_text . '</a>' : ''); ?>
														</div>
													<?php } ?>
												</div>
											</div>
											<?php if(($i % $col_count) == 0){ ?>
												<div class="clearfix"></div>
											<?php } ?>
										</div>
									<?php $i+=1; endwhile; ?>
								<?php else :
									// no rows found
									endif;
								?>													
							<?php } ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>
				<?php if($show_bottom_ads) { ?>
					<div class="bottom-ads">
						<div class="container">
							<div class="row-fluid"<?php echo(($bottom_ads_margin_top || $bottom_ads_margin_bottom) ? ' style=" ' . ($bottom_ads_margin_top ? 'margin-top:' . $bottom_ads_margin_top . 'rem;' : '') . ($bottom_ads_margin_bottom ? 'margin-bottom:' . $bottom_ads_margin_bottom . 'rem;' : '') . ' "' : '');?>>
								<div class="col-md-12">
									<div class="col pull-left">
										<?php echo $bottom_left_ad; ?>
									</div>
									<div class="col pull-right">
										<?php echo $bottom_right_ad; ?>
									</div>
									<div class="clearfix"></div>
									</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				<?php } ?>
			<?php } ?>
		<?php endwhile; ?>
	<?php endif; ?>
	<div class="default-bottom-ads">
		<div class="container">
			<div class="row-fluid">
				<div class="col-md-12">
	 				<div class="col pull-left">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Default Bottom Left Ad') ) : ?>
						<?php endif; ?>
					</div>
					<div class="col pull-right">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Default Bottom Right Ad') ) : ?>
						<?php endif; ?>
					</div>
					<div class="clearfix"></div>
					</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

<?php wp_reset_query(); ?>

<?php get_footer(); ?>