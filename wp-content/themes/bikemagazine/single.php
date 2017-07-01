<?php get_header(); //set_kirana_post_views(get_the_ID()); ?>


	<?php if (have_posts()) : ?>
		<div id="main-content" class="single-post-template post-page">
			<div class="page-banner newsletter-banner-wrap">
			<?php 
				$headerimg = '';
				$headerbg = get_stylesheet_directory_uri().'/images/default-event-page-header-blank.png';
				if(get_field('header_image', $post->ID) ) {
						$img = get_field('header_image', $post->ID);
					$headerimg = $img['url'];
				} else {
					$headerimg = get_stylesheet_directory_uri().'/images/default-event-page-header.jpg';	
				}
			?>
		<div class="overlay"></div>
		<div class="header-image lazy-image newsletter-banner-image" data-src="<?php echo $headerimg; ?>"><img src="<?php echo $headerbg; ?>" width="1920" height="296" alt="<?php echo ( get_field('header_title', $post->ID) ? the_field('header_title', $post->ID) : get_the_title() ); ?>" title="<?php echo ( get_field('header_title', $post->ID) ? the_field('header_title', $post->ID) : get_the_title() ); ?>" /></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="header-caption">
						<?php dynamic_sidebar('Blog Newsletter Header'); ?>
						</div>
					</div>
				<div class="clearfix"></div>
				</div>
			</div>
		</div>

			<?php while (have_posts()) : the_post(); ?>
				<div class="page-breadcrumb">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<?php if(function_exists('the_breadcrumbs')) the_breadcrumbs(); ?>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="page-content">
					<div class="container">
						<div class="row">
							<div class="col-md-8 article">
								<h2 class="post-title"><?php echo ( get_field('header_title', $post->ID) ? the_field('header_title', $post->ID) : get_the_title() ); ?></h2>

							<div class="col-sm-12 nopadding" style="margin-bottom: 30px;">
								<span class="post-details"><?php the_time('j F') ?> /  <?php $link = get_permalink($post->ID); echo FacebookShareCount::get_share_count($link); ?> Shares /  by <?php the_author_posts_link() ?> </span>
							</div>
						
						
								<div class="single-post-thumbnails">
								<?php if ( has_post_thumbnail() ) {
											the_post_thumbnail('full'); 
										}  
								?>
								</div>
								<div class="clear"></div>

								<?php the_content(); ?>

								<p class="category-post">Posted in: <b><?php the_category(' '); ?></b></p>
								<p class="category-post">Tags: <b><?php wp_get_post_tags( $post_id ) ?></b></p>

								
								<div class="social-links">
									<span class="share-this">SHARE THIS</span>
									<span class="facebook social"><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink($id); ?>" title="Share in Facebook" rel="nofollow" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"></a></span>
									<span class="twitter social"><a href="https://twitter.com/share?url=<?php echo get_permalink($id); ?>" title="" rel="nofollow" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;"></a></span>
									<span class="googleplus social"><a href="https://plus.google.com/share?url=<?php echo get_permalink($id); ?>" title="" rel="nofollow" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a></span>
									<span class="rss social"><a href="https://www.rss.com//shareArticle?url=<?php echo get_permalink($id); ?>" title="" rel="nofollow" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a></span>
									<span class="email social"><a href="mailto:?subject=<?php echo get_permalink($id); ?>" title="" rel="nofollow" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;"></a></span>
								</div>
							
                        <div class="post-author">
                                    <div class="author-avatar">
                                        <div class="image-cropper">
                                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?>
                                        </div>
                                    </div>
                                <div class="author-info">
                                        <h1>About <?php echo nl2br(get_the_author_meta('display_name')); ?></h1>
                                        <p><?php echo nl2br(get_the_author_meta('description')); ?></p>

                                     <div class="author-social">
                                        <span class="follow">Follow <?php echo nl2br(get_the_author_meta('nickname')); ?></span>
                                        <span class="social-share-icon">
                                            <span class="facebook social"><a href="http://www.facebook.com/sharer.php?u=<?php echo get_permalink($id); ?>" title="Share in Facebook" rel="nofollow" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=220,width=600');return false;"></a></span>
                                            <span class="twitter social"><a href="https://twitter.com/share?url=<?php echo get_permalink($id); ?>" title="" rel="nofollow" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=260,width=600');return false;"></a></span>
                                            <span class="googleplus social"><a href="https://plus.google.com/share?url=<?php echo get_permalink($id); ?>" title="" rel="nofollow" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a></span>
                                            <span class="linkedin social"><a href="https://www.linkedin.com/shareArticle?url=<?php echo get_permalink($id); ?>" title="" rel="nofollow" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"></a></span>
                                        </span>
                                            <span class="follow">More Blog Post by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php echo nl2br(get_the_author_meta('display_name')); ?></a></span>
                                    
                                    </div>
                                </div>
                        </div>

							

								<div class="comments-section">
    								<!-- Begin Comments -->
    								<?php comments_template( '', true ); ?>
    								<!-- End Comments -->
    							</div>
    							<div class="current-blog">
    								<h1>Current Blog</h1>
    								<p><?php echo ( get_field('header_title', $post->ID) ? the_field('header_title', $post->ID) : get_the_title() ); ?></p>
    							</div>
    							<!-- post navigation -->

        							<span class="nav-article">
        								<div class="col-md-6">
        								<span class="next-prev">
            								<span>PREVIOUS POST</span><br>
            								<p><img src="<?php bloginfo('template_url'); ?>/images/arrow-left-secondary.png"><?php previous_post_link('%link'); ?></p>
            							</span>
            							</div>
            							<div class="col-md-6">
            							<span class="next-prev next">
            								<span>NEXT POST</span><br>
            								<p><?php next_post_link('%link'); ?><img src="<?php bloginfo('template_url'); ?>/images/arrow-right-secondary.png"></p>
            							</span>
            							</div>
            						</span>



        <div class="clear"></div>



    <!-- post navigation End 0-->
							</div>
						<div class="col-md-4 aside">
							<?php
								if( have_rows('page_widgets', $post->ID) ):
									while ( have_rows('page_widgets', $post->ID) ) : the_row();
										dynamic_sidebar( get_sub_field('sidebar_widget', $post->ID) );
									endwhile;
								else :
										dynamic_sidebar('Default Blog Sidebar');
								endif;
							?>					
						</div>
						<div class="clearfix"></div>
						</div>
					</div>
				</div>			
			<?php endwhile; ?>
		</div>
	<?php else : ?>
	<?php endif; ?>
	
<?php wp_reset_query(); ?>

<?php get_footer(); ?>