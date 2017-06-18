	<footer id="main-footer">
		<?php if(get_field('show_footer_newsletter', 'option')) { ?>
			<div class="newsletter"<?php echo (get_field('newsletter_section_background', 'option') ? ' style="background: transparent url(' . get_field('newsletter_section_background', 'option') . ') center no-repeat;background-size:cover;"' : ''); ?>>
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="content">
								<?php echo(get_field('newsletter_section_title', 'option') ? '<div class="newsletter-caption"><h2>' . get_field('newsletter_section_title', 'option') . '</h2>' . (get_field('newsletter_section_description', 'option') ? '<p>' . get_field('newsletter_section_description', 'option') . '</p>' : '') . '</div>' : ''); ?>
								
								<?php if(get_field('newsletter_gravity_form_id', 'option')) { ?>
									<div class="newsletter-form">
										<?php echo do_shortcode('[gravityform id="'. get_field('newsletter_gravity_form_id', 'option') .'" title="false" description="false" ajax="true"]'); ?>
									</div>
								<?php } ?>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		<?php } ?>	
		<?php if(get_field('show_footer_search', 'option') || get_field('show_footer_chat_with_us', 'option')) { ?>
			<div class="search-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<?php if(get_field('show_footer_search', 'option')) { ?>
								<?php echo(get_field('footer_search_title', 'option') ? '<h3>' . get_field('footer_search_title', 'option') . '</h3>' : ''); ?>
								<form role="search" method="get" id="footer_searchform" action="<?php echo home_url( '/' ); ?>">
									<div class="input-group">
										<input name="s" id="footer_s" autocomplete="off" type="text" class="ajax_s form-control input-sm" <?php echo(get_field('footer_search_input_placeholder', 'option') ? 'placeholder="' . get_field('footer_search_input_placeholder', 'option') . '"' : ''); ?> value="<?php echo get_search_query(); ?>">
										<input type="hidden" name="search-type" value="all" />
										<span class="input-group-btn">
													<input type="submit" value="<?php _e("Search");?>" id="footer_searchsubmit" class="button">
										</span>
									</div>
								</form>
							<?php } ?>
						</div>
						<div class="col-md-6">
							<?php if(get_field('show_footer_chat_with_us', 'option')) { ?>
								<?php echo(get_field('chat_with_us_title', 'option') ? '<h3>' . get_field('chat_with_us_title', 'option') . '</h3>' : ''); ?>
								<p class="chat-and-ask"><a href="javascript:void(0)" rel="bookmark" title="<?php echo(get_field('chat_with_us_button_text', 'option') ? get_field('chat_with_us_button_text', 'option') : 'TALK TO OUR SUPPORT ADVISOR'); ?>" class="support-advisor<?php echo (get_field('chat_with_us_button_id', 'option') ? ' modal-dialog-'.get_field('chat_with_us_button_id', 'option') : ''); ?>" <?php echo(get_field('chat_with_us_button_onclick', 'option') ? ' onclick="' . get_field('chat_with_us_button_onclick', 'option') . '"' : ''); ?>><?php echo(get_field('chat_with_us_button_text', 'option') ? get_field('chat_with_us_button_text', 'option') : 'TALK TO OUR SUPPORT ADVISOR'); ?></a> <?php if(get_field('show_office_hours', 'option')){echo(get_field('office_hours', 'option') ? '<span class="schedule">' . get_field('office_hours', 'option') . '</span>' : '');} ?></p>
							<?php } ?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		<?php } ?>			
		<div id="top-footer">
			<div class="top-footer">
				<div class="container">
					<div class="row">
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="four-menu middle-footer">
				<div class="container">
					<div class="row">
						<?php if((is_active_sidebar('Home Footer Menu One')) && (is_active_sidebar('Home Footer Menu Two')) && (is_active_sidebar('Home Footer Menu Three')) && (is_active_sidebar('Home Footer Menu Four'))){ ?>
							<div class="col-md-3 col-sm-6 footer-menu-one-fourth">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Footer Menu One') ) : ?>
								<?php endif; ?>
							</div>
							<div class="col-md-4 col-sm-6 footer-menu-one-fourth">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Footer Menu Two') ) : ?>
								<?php endif; ?>
							</div>
							<div class="clearfix-sm"></div>
							<div class="col-md-3 col-sm-6 footer-menu-one-fourth">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Footer Menu Three') ) : ?>
								<?php endif; ?>
							</div>
							<div class="col-md-2 col-sm-6 footer-menu-one-fourth">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Footer Menu Four') ) : ?>
								<?php endif; ?>
							</div>
						<?php } elseif((is_active_sidebar('Home Footer Menu One')) && (is_active_sidebar('Home Footer Menu Two')) && (is_active_sidebar('Home Footer Menu Three')) && !(is_active_sidebar('Home Footer Menu Four'))){ ?>
							<div class="col-md-3 col-sm-6 footer-menu-one-fourth">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Footer Menu One') ) : ?>
								<?php endif; ?>
							</div>
							<div class="col-md-4 col-sm-6 footer-menu-one-fourth">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Footer Menu Two') ) : ?>
								<?php endif; ?>
							</div>
							<div class="clearfix-sm"></div>
							<div class="col-md-5 col-sm-6 footer-menu-one-fourth">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Footer Menu Three') ) : ?>
								<?php endif; ?>
							</div>
						<?php } elseif((is_active_sidebar('Home Footer Menu One')) && (is_active_sidebar('Home Footer Menu Two')) && !(is_active_sidebar('Home Footer Menu Three')) && !(is_active_sidebar('Home Footer Menu Four'))){ ?>
							<div class="col-md-6 col-sm-6 footer-menu-one-fourth">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Footer Menu One') ) : ?>
								<?php endif; ?>
							</div>
							<div class="col-md-6 col-sm-6 footer-menu-one-fourth">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Footer Menu Two') ) : ?>
								<?php endif; ?>
							</div>
						<?php } elseif((is_active_sidebar('Home Footer Menu One')) && !(is_active_sidebar('Home Footer Menu Two')) && !(is_active_sidebar('Home Footer Menu Three')) && !(is_active_sidebar('Home Footer Menu Four'))){ ?>
							<div class="col-md-12 col-sm-12 footer-menu-one-fourth">
								<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Home Footer Menu One') ) : ?>
								<?php endif; ?>
							</div>
						<?php } ?>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="bikemagazine-footer">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Logos and Information') ) : ?>
							<?php endif; ?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div class="copyright bottom-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-6 footer-copyright">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Copyright') ) : ?>
						<?php endif; ?>
					</div>
					<div class="col-md-6 footer-menu">
						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer Menu') ) : ?>
						<?php endif; ?>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</footer>

	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/js/jquery-1.12.4.min.js"></script>
	<?php wp_footer(); ?>

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modernizr-2.0.6.min.js" defer></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.lazy.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/lightbox.min.js" defer></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/modal.js" defer></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/classie.js" defer></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js" defer></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.simplemodal.js" defer></script>
	<script src="<?php echo get_template_directory_uri(); ?>/scripts/scripts.js" defer></script>
</script>
</body>
</html>