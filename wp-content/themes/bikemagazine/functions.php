<?php
add_action( 'after_switch_theme', 'flush_rewrite_rules' );

function fb_opengraph() {
    global $post;
 
    if(is_single()) {
        if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'full');
        }
        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }
        ?>
 
    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src[0]; ?>"/>
 
<?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);

/*	@desc attach custom admin login CSS file	*/
function custom_login_css() {
  echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/login.css" />';
}
add_action('login_head', 'custom_login_css');

/*	@desc update logo URL to point towards Homepage	*/
function custom_login_header_url($url) {
  return get_option('home');
}
add_filter( 'login_headerurl', 'custom_login_header_url' );

function custom_login_header_title($title) {
  $blog_title = get_bloginfo('name');
  return $blog_title;
}

add_filter( 'login_headertitle', 'custom_login_header_title' );
/*	@desc update admin icon to client icon	*/
function custom_admin_icon_css() {
  echo '<link rel="shortcut icon" href="'.get_template_directory_uri().'/images/logo.ico" />';
}
add_action('admin_head', 'custom_admin_icon_css');

function remove_footer_admin () {
    echo '<span id="footer-thankyou">Template implemented and developed by <a href="http://www.jamediasolutions.com/" target="_blank" title="JA Media Solutions">JA Media Solutions</a>.</span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');

// Disable Admin Bar for all users
add_filter('show_admin_bar', '__return_false');

function bikemagazine_remove_version() {return '';}
add_filter('the_generator', 'bikemagazine_remove_version');

//Making jQuery Google API
function modify_jquery() {
	if (!is_admin()) {
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3');
		wp_enqueue_script('jquery');
	}
}
add_action('init', 'modify_jquery');

// custom menu support
add_theme_support( 'menus' );
if (function_exists( 'register_nav_menus')) {register_nav_menus(array('primary_navigation' => 'Primary Navigation', 'secondary_navigation' => 'Secondary Navigation', 'utility_navigation' => 'Utility Navigation', 'footer_navigation' => 'Copyright Footer Navigation', 'footer_navigation_1' => 'Footer Navigation One', 'footer_navigation_2' => 'Footer Navigation Two', 'footer_navigation_3' => 'Footer Navigation Three', 'footer_navigation_4' => 'Footer Navigation Four'));}

if ( function_exists('register_sidebar') )
register_sidebar(array('id'=>'default-sidebar','name'=>'Default Sidebar','before_widget' => '<span id="%1$s" class="widget %2$s">','after_widget' => '</span>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>',));
register_sidebar(array('id'=>'default-events-sidebar','name'=>'Default Events Sidebar','before_widget' => '<span id="%1$s" class="widget %2$s">','after_widget' => '</span>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>',));
register_sidebar(array('id'=>'default-blog-sidebar','name'=>'Default Blog Sidebar','before_widget' => '<span id="%1$s" class="widget %2$s">','after_widget' => '</span>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>',));
register_sidebar(array('id'=>'default-route-sidebar','name'=>'Default Route Sidebar','before_widget' => '<span id="%1$s" class="widget %2$s">','after_widget' => '</span>','before_title' => '<h2 class="widgettitle">','after_title' => '</h2>',));
register_sidebar(array('id'=>'default-bottom-left-ad','name'=>'Default Bottom Left Ad','before_widget' => '','after_widget' => '','before_title' => '','after_title' => '',));
register_sidebar(array('id'=>'default-bottom-right-ad','name'=>'Default Bottom Right Ad','before_widget' => '','after_widget' => '','before_title' => '','after_title' => '',));
register_sidebar(array('id'=>'home-top-footer-one','name'=>'Home Top Footer One','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'home-top-footer-two','name'=>'Home Top Footer Two','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'home-top-footer-three','name'=>'Home Top Footer Three','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'home-top-footer-four','name'=>'Home Top Footer Four','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'home-top-footer-one-3-4','name'=>'Home Top Footer One 3/4','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'home-top-footer-two-1-4','name'=>'Home Top Footer Two 1/4','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'home-footer-menu-one','name'=>'Home Footer Menu One','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'home-footer-menu-two','name'=>'Home Footer Menu Two','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'home-footer-menu-three','name'=>'Home Footer Menu Three','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'home-footer-menu-four','name'=>'Home Footer Menu Four','before_widget' => '','after_widget' => '','before_title' => '<h4>','after_title' => '</h4>',));
register_sidebar(array('id'=>'footer-logo-information','name'=>'Footer Logos and Information','before_widget' => '','after_widget' => '','before_title' => '','after_title' => '',));
register_sidebar(array('id'=>'footer-copyright','name'=>'Footer Copyright','before_widget' => '','after_widget' => '','before_title' => '','after_title' => '',));
register_sidebar(array('id'=>'footer-menu','name'=>'Footer Menu','before_widget' => '','after_widget' => '','before_title' => '','after_title' => '',));

// thumbnail support
add_theme_support('post-thumbnails'); 
add_image_size('feature-thumbnails', 800, 450, true);
add_image_size('general-thumbnails', 800, 600, true);
add_image_size('route-thumbnails', 400, 400, true);
add_image_size('event-thumbnails', 400, 400, true);
add_image_size('team-thumbnails', 400, 400, true);

add_filter( 'embed_oembed_html', 'custom_oembed_filter', 10, 4 ) ;

function custom_oembed_filter($html, $url, $attr, $post_ID) {
    $return = '<div class="video-container">'.$html.'</div>';
    return $return;
}

// Remove Query String
function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

// Add a unique id attribute to the body tag of an HTML page
function id_the_body() {
        global $post, $wp_query, $wpdb;
        $post = $wp_query->post;
	$body_id = "";
        if ($post->post_type == 'page') $body_id = 'page-' . $post->ID;
        if ($post->post_type == 'post') $body_id = 'post-' . $post->ID;
        if ( is_front_page() ) $body_id = 'home';
        if ( is_home() ) $body_id = 'home';
        if ( is_category() ) $body_id = 'category-' . get_query_var('cat');
        if ( is_tag() ) $body_id = 'tag-' . get_query_var('tag');
        if ( is_author() ) $body_id = 'author-' . get_query_var('author');
        if ( is_date() ) $body_id = 'date-archive';
        if (is_search()) $body_id = 'search-archive';
        if (is_404()) $body_id = '404-error';
        if ($body_id) echo "id=\"$body_id\"";
}
// Add special class names for the parents of the page
function class_the_body($more_classes='') {
        global $post, $wp_query, $wpdb;
        $post = $wp_query->post;
		$parent_id_string = "";
        if ($post->ancestors) {
                /* reverse the order of the array elements b/c we want the immediate parent to be last in the class list */
                $parent_array = array_reverse($post->ancestors);
                foreach ($parent_array as $key => $parent_id) {
                        $parent_id_string = $parent_id_string . ' childof-' . 
$parent_id;
                }
        }
	$type = "";
        if ($post->post_type == 'page') $type = 'page';
        if ($post->post_type == 'post') $type = 'single';
        // these 2 are not needed since we id the body with home
        //if (is_home()) $type = 'home';
        //if (is_front_page()) $type = 'front';
        if (is_category()) $type = 'archive category-archive';
        if (is_tag()) $type = 'archive tag-archive';
        if (is_author()) $type = 'archive author-archive';
        // again, these 3 are not needed since we id the body with these
        if (is_date()) $type = 'archive date-archive';
        if (is_search()) $type = 'archive search-archive';
        if (is_404()) $type = '404-error';
        // need a lot of trimming b/c any combination of these could be blank
		if($parent_id_string) {
			$classes = trim($parent_id_string . ' ' . $more_classes);
		}else{
			$classes = trim($more_classes);
		}
        if ($type) $classes = $type . ' ' . $classes;
        $classes = trim($classes);
        if ($classes) echo " class=\"$classes\"";
}

function set_bikemagazine_post_views($postID) {
    $count_key = 'bikemagazine_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function get_bikemagazine_post_views($postID){
    $count_key = 'bikemagazine_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

function limit_words($string, $word_limit) {
	$words = explode(' ', $string);

	return implode(' ', array_slice($words, 0, $word_limit));
}

add_filter( 'gform_validation_message', 'change_message', 10, 2 );
function change_message( $message, $form ) {
	return "";
}

add_filter( 'gform_tabindex', 'gform_tabindexer', 10, 2 );
function gform_tabindexer( $tab_index, $form = false ) {
    $starting_index = 1000; // if you need a higher tabindex, update this number
    if( $form )
        add_filter( 'gform_tabindex_' . $form['id'], 'gform_tabindexer' );
    return GFCommon::$tab_index >= $starting_index ? GFCommon::$tab_index : $starting_index;
}

add_filter( 'gform_next_button', 'input_to_button', 10, 2 );
add_filter( 'gform_previous_button', 'input_to_button', 10, 2 );
add_filter( 'gform_submit_button', 'input_to_button', 10, 2 );
function input_to_button( $button, $form ) {
    $dom = new DOMDocument();
    $dom->loadHTML( $button );
    $input = $dom->getElementsByTagName( 'input' )->item(0);
    $new_button = $dom->createElement( 'button' );
    $new_button->appendChild( $dom->createTextNode( $input->getAttribute( 'value' ) ) );
    $input->removeAttribute( 'value' );
    foreach( $input->attributes as $attribute ) {
	if (($attribute->name)=='id'){
		$old_id = $attribute->value;
		$input->setAttribute( $attribute->name, $attribute->value.'_temp' );
		$new_button->setAttribute( 'id', $old_id );
	} else{
		$new_button->setAttribute( $attribute->name, $attribute->value );
	}
    }
    $input->removeAttribute( 'id' );
    $input->parentNode->replaceChild( $new_button, $input );

    return $dom->saveHtml( $new_button );
}

function the_breadcrumbs() {
	global $post;
	echo "<p class='trail'>";
	if (!is_home()) {
		echo "<span><a href='".get_option('home')."'>Home</a></span>";

		if (is_category() || is_singular( 'post' )) {
			echo " <span class='sep'></span> ";

			$post_object = get_field('blogs_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 

				echo "<span><a href='".get_the_permalink()."'>" . get_the_title() . "</a></span>";

				wp_reset_postdata();
			}

			if (is_category()) {
				echo " <span class='sep'></span> <span class='single-category'>".single_cat_title( '', false )."</span>";
			}

			if (is_singular( 'post' )) {
				echo " <span class='sep'></span> <span class='single-post-".$post->ID."'>".get_the_title()."</span>";
			}
		} elseif (is_page()) {
			if($post->post_parent){
				$anc = get_post_ancestors( $post->ID );
				krsort($anc);
				//$anc_link = get_page_link( $post->post_parent );

				foreach ( $anc as $ancestor ) {
					echo " <span class='sep'></span> <span><a href=" . get_page_link( $ancestor ) . ">".get_the_title($ancestor)."</a></span> ";
				}

				echo " <span class='sep'></span> <span>".get_the_title()."</span>";
			} else {
				echo " <span class='sep'></span> ";
				echo "<span>".get_the_title()."</span>";
			}
		} elseif (is_tax('type') || is_singular('route')) {
			echo " <span class='sep'></span> ";

			$post_object = get_field('course_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 

				echo "<span><a href='".get_the_permalink()."'>" . get_the_title() . "</a></span>";

				wp_reset_postdata();
			}
			/*
			if (is_tax('courses')){
				$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
				echo " <span class='sep'></span> <span class='courses-".$term->term_id."'>".$term->name."</span>";
			}
			*/
			if (is_singular( 'course' )) {
				/* echo courses_terms_links($post->ID); */
				echo " <span class='sep'></span> <span class='single-course-".$post->ID."'>".get_the_title()."</span>";
			}
		} elseif (is_singular('event')) {
			echo " <span class='sep'></span> ";

			$post_object = get_field('events_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 

				echo "<span><a href='".get_the_permalink()."'>" . get_the_title() . "</a></span>";

				wp_reset_postdata();
			}
			echo "<span class='sep'></span> <span class='single-event-".$post->ID."'>".get_the_title()."</span>";
		} elseif (is_singular('rtos')) {
			//echo " <span class='sep'></span> ";
			echo "<span class='sep'></span> <span class='single-rtos-".$post->ID."'>".get_the_title()."</span>";
		} elseif (is_singular('locations')) {
			echo " <span class='sep'></span> ";

			$post_object = get_field('locations_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 

				echo "<span><a href='".get_the_permalink()."'>" . get_the_title() . "</a></span>";

				wp_reset_postdata();
			}
			echo "<span class='sep'></span> <span class='single-locations-".$post->ID."'>".get_the_title()."</span>";
		} elseif (is_singular('case_study')) {
			echo " <span class='sep'></span> ";

			$post_object = get_field('case_study_page', 'option');
			if( $post_object ){
				$post = $post_object;
				setup_postdata( $post ); 

				echo "<span><a href='".get_the_permalink()."'>" . get_the_title() . "</a></span>";

				wp_reset_postdata();
			}
			echo "<span class='sep'></span> <span class='single-case_study-".$post->ID."'>".get_the_title()."</span>";
		} elseif (is_search()) {
			echo " <span class='sep'></span> <span>Search results</span>"; 
		} elseif (is_404()) {
			echo " <span class='sep'></span> <span>Page Not Found</span>"; 
		} elseif (is_tag()) {
			$current_tag = single_tag_title("", false);
			echo " <span class='sep'></span> <span>Tag Archive: ".$current_tag."</span>";
		} elseif (is_author()) {
			echo " <span class='sep'></span> <span>".get_the_author_meta('display_name')."</span>";; 
		}
	} elseif (is_day()) {
		echo "<span>Archive: "; get_the_time('F jS, Y'); echo '</span>';
	} elseif (is_month()) {
		echo "<span>Archive: "; get_the_time('F, Y'); echo '</span>';
	} elseif (is_year()) {
		echo "<span>Archive: "; get_the_time('Y'); echo '</span>';
	} elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
		echo "<span>Archive: "; echo '</span>';
	}
	echo "</p>";
}

//Custom Post Types code generated from CPTUI
add_action( 'init', 'cptui_register_my_cpts_slider' );
function cptui_register_my_cpts_slider() {
	$labels = array(
		"name" => __( 'Sliders', 'bikemagazine' ),
		"singular_name" => __( 'Slider', 'bikemagazine' ),
		"search_items" => __( 'Search Sliders', 'bikemagazine' ),
		"all_items" => __( 'All Sliders', 'bikemagazine' ),
		"edit_item" => __( 'Edit Slider', 'bikemagazine' ),
		"update_item" => __( 'Update Slider', 'bikemagazine' ),
		"add_new_item" => __( 'Add New Slider', 'bikemagazine' ),
		"new_item_name" => __( 'New Slider', 'bikemagazine' ),
		"menu_name" => __( 'Slider', 'bikemagazine' ),
		);
	$args = array(
		"label" => __( 'Sliders', 'bikemagazine' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "slider", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-slides",
		"supports" => array( "title", "editor", "thumbnail", "page-attributes" ),
		"taxonomies" => array( "slider_position" ),
);
	register_post_type( "slider", $args );
// End of cptui_register_my_cpts_slider()
}
add_action( 'init', 'cptui_register_my_taxes_slider_position' );
function cptui_register_my_taxes_slider_position() {
	$labels = array(
		"name" => __( 'Slider Position', 'bikemagazine' ),
		"singular_name" => __( 'Slider Position', 'bikemagazine' ),
		"search_items" => __( 'Search Slider Positions', 'bikemagazine' ),
		"all_items" => __( 'All Slider Positions', 'bikemagazine' ),
		"parent_item" => __( 'Parent Slider Position', 'bikemagazine' ),
		"parent_item_colon" => __( 'Parent Slider Position:', 'bikemagazine' ),
		"edit_item" => __( 'Edit Slider Position', 'bikemagazine' ),
		"update_item" => __( 'Update Slider Position', 'bikemagazine' ),
		"add_new_item" => __( 'Add New Slider Position', 'bikemagazine' ),
		"new_item_name" => __( 'New Slider Position', 'bikemagazine' ),
		"menu_name" => __( 'Slider Position', 'bikemagazine' ),
		);
	$args = array(
		"label" => __( 'Slider Position', 'bikemagazine' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Slider Position",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'slider_position', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "slider_position", array( "slider" ), $args );
// End cptui_register_my_taxes_slider_position()
}
add_action( 'init', 'cptui_register_my_cpts_team_member' );
function cptui_register_my_cpts_team_member() {
	$labels = array(
		"name" => __( 'Team Members', 'bikemagazine' ),
		"singular_name" => __( 'Team Member', 'bikemagazine' ),
		);

	$args = array(
		"label" => __( 'Team Members', 'bikemagazine' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "team-member", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-groups",
		"supports" => array( "title", "thumbnail", "page-attributes" ),					);
	register_post_type( "team-member", $args );

// End of cptui_register_my_cpts_team_member()
}
add_action( 'init', 'cptui_register_my_taxes_department' );
function cptui_register_my_taxes_department() {
	$labels = array(
		"name" => __( 'Department', 'bikemagazine' ),
		"singular_name" => __( 'Department', 'bikemagazine' ),
		);

	$args = array(
		"label" => __( 'Department', 'bikemagazine' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Department",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'department', 'with_front' => true, ),
		"show_admin_column" => false,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => false,
	);
	register_taxonomy( "department", array( "team-member" ), $args );

// End cptui_register_my_taxes_department()
}
add_action( 'init', 'cptui_register_my_cpts_route' );
function cptui_register_my_cpts_route() {
	$labels = array(
		"name" => __( 'Routes', 'bikemagazine' ),
		"singular_name" => __( 'Route', 'bikemagazine' ),
		);

	$args = array(
		"label" => __( 'Routes', 'bikemagazine' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "route", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-location-alt",
		"supports" => array( "title", "editor", "thumbnail", "page-attributes" ),		
		"taxonomies" => array( "post_tag" ),
			);
	register_post_type( "route", $args );

// End of cptui_register_my_cpts_route()
}
add_action( 'init', 'cptui_register_my_taxes_routes' );
function cptui_register_my_taxes_routes() {
	$labels = array(
		"name" => __( 'Bike Ride Types', 'bikemagazine' ),
		"singular_name" => __( 'Bike Ride Type', 'bikemagazine' ),
		);

	$args = array(
		"label" => __( 'Bike Ride Types', 'bikemagazine' ),
		"labels" => $labels,
		"public" => true,
		"hierarchical" => true,
		"label" => "Bike Ride Type",
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => array( 'slug' => 'routes', 'with_front' => true, ),
		"show_admin_column" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"show_in_quick_edit" => true,
	);
	register_taxonomy( "routes", array( "route" ), $args );

// End cptui_register_my_taxes_routes()
}
add_action( 'init', 'cptui_register_my_cpts_event' );
function cptui_register_my_cpts_event() {
	$labels = array(
		"name" => __( 'Events', 'bikemagazine' ),
		"singular_name" => __( 'Event', 'bikemagazine' ),
		);

	$args = array(
		"label" => __( 'Events', 'bikemagazine' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "event", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-calendar-alt",
		"supports" => array( "title", "comments" ),		
		"taxonomies" => array( "category", "post_tag" ),
			);
	register_post_type( "event", $args );

// End of cptui_register_my_cpts_event()
}
add_action( 'init', 'cptui_register_my_cpts_testimonial' );
function cptui_register_my_cpts_testimonial() {
	$labels = array(
		"name" => __( 'Testimonials', 'bikemagazine' ),
		"singular_name" => __( 'Testimonial', 'bikemagazine' ),
		);

	$args = array(
		"label" => __( 'Testimonials', 'bikemagazine' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "testimonial", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-format-quote",
		"supports" => array( "title", "editor", "thumbnail", "page-attributes" ),		
		"taxonomies" => array( "courses" ),
			);
	register_post_type( "testimonial", $args );

// End of cptui_register_my_cpts_testimonial()
}
add_action( 'init', 'cptui_register_my_cpts_feature' );
function cptui_register_my_cpts_feature() {
	$labels = array(
		"name" => __( 'Features', 'bikemagazine' ),
		"singular_name" => __( 'Feature', 'bikemagazine' ),
		);

	$args = array(
		"label" => __( 'Features', 'bikemagazine' ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => false,
		"show_ui" => true,
		"show_in_rest" => false,
		"rest_base" => "",
		"has_archive" => false,
		"show_in_menu" => true,
				"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => array( "slug" => "feature", "with_front" => true ),
		"query_var" => true,
		"menu_position" => 5,"menu_icon" => "dashicons-star-filled",
<<<<<<< HEAD
		"supports" => array( "title", "editor", "excerpt", "thumbnail", "page-attributes" ),					);
=======
		"supports" => array( "title", "editor", "thumbnail", "page-attributes" ),					);
>>>>>>> ed0b252e2ad5678f194cc1b78d439162f0e6ad83
	register_post_type( "feature", $args );

// End of cptui_register_my_cpts_feature()
}
add_filter( 'manage_edit-slider_columns', 'upcmc_edit_slider_columns' ) ;
function upcmc_edit_slider_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Slider Item' ),
		'slider_position' => __( 'Slider Position' ),
		'date' => __( 'Date' )
	);
	return $columns;
}
add_action( 'manage_slider_posts_custom_column', 'upcmc_manage_slider_columns', 10, 2 );
function upcmc_manage_slider_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		/* If displaying the 'slider_position' column. */
		case 'slider_position' :
			/* Get the position for the post. */
			$terms = get_the_terms( $post_id, 'slider_position' );
			/* If terms were found. */
			if ( !empty( $terms ) ) {
				$out = array();
				/* Loop through each term, linking to the 'edit posts' page for the specific term. */
				foreach ( $terms as $term ) {
					$out[] = sprintf( '<a href="%s">%s</a>',
						esc_url( add_query_arg( array( 'post_type' => $post->post_type, 'slider_position' => $term->slug ), 'edit.php' ) ),
						esc_html( sanitize_term_field( 'name', $term->name, $term->term_id, 'slider_position', 'display' ) )
					);
				}
				/* Join the terms, separating them with a comma. */
				echo join( ', ', $out );
			}
			/* If no terms were found, output a default message. */
			else {
				_e( 'No Slider Position' );
			}
			break;
		/* Just break out of the switch statement for everything else. */
		default :
			break;
	}
}
add_filter( 'manage_edit-slider_sortable_columns', 'upcmc_slider_sortable_columns' );
function upcmc_slider_sortable_columns( $columns ) {
	$columns['slider_position'] = 'slider_position';
	return $columns;
}

/**
 * Abstract class for counting shares 
 */
interface Share_Counter {
  /**
   * Getting the share count
   */
  public static function get_share_count( $url );
}
/**
 * Facebook Shares
 */
class FacebookShareCount implements Share_Counter {
	public static function get_share_count( $url ) {
		$facebook_app_id = "141582589735908";
		$facebook_app_secret = "50b7e286c95e50328b844dc3bb3c8eb9";
		$access_token = $facebook_app_id . '|' . $facebook_app_secret;
		$check_url = 'https://graph.facebook.com/v2.7/?id=' . urlencode(  $url ) . '&fields=share&access_token=' . $access_token;
		$response = wp_remote_retrieve_body( wp_remote_get( $check_url ) );
		$encoded_response = json_decode( $response, true );
		$share_count = intval( $encoded_response['share']['share_count'] );
		return $share_count;
	}
}
/**
 * Twitter Shares
 */
class TwitterShareCount implements Share_Counter {
	public static function get_share_count( $url ) {
		$check_url = 'http://public.newsharecounts.com/count.json?url=' . urlencode( $url );
		$response = wp_remote_retrieve_body( wp_remote_get( $check_url ) );
		$encoded_response = json_decode( $response, true );
		$share_count = intval( $encoded_response['count'] ); 
		return $share_count;
	}
}
/**
 * Google+ Shares
 */
class GoogleShareCount implements Share_Counter {
	public static function get_share_count( $url ) {
		if( !$url ) {
	    	return 0;
	    }
		if ( !filter_var($url, FILTER_VALIDATE_URL) ){
			return 0;
		}
	    foreach (array('apis', 'plusone') as $host) {
	        $ch = curl_init(sprintf('https://%s.google.com/u/0/_/+1/fastbutton?url=%s',
	                                      $host, urlencode($url)));
	        curl_setopt_array($ch, array(
	            CURLOPT_FOLLOWLOCATION => 1,
	            CURLOPT_RETURNTRANSFER => 1,
	            CURLOPT_SSL_VERIFYPEER => 0,
	            CURLOPT_USERAGENT      => 'Mozilla/5.0 (Windows NT 6.1; WOW64) ' .
	                                      'AppleWebKit/537.36 (KHTML, like Gecko) ' .
	                                      'Chrome/32.0.1700.72 Safari/537.36' ));
	        $response = curl_exec($ch);
	        $curlinfo = curl_getinfo($ch);
	        curl_close($ch);
	        if (200 === $curlinfo['http_code'] && 0 < strlen($response)) { break 1; }
	        $response = 0;
	    }
	    if( !$response ) {
	    		return 0;
	    }
	    preg_match_all('/window\.__SSR\s\=\s\{c:\s(\d+?)\./', $response, $match, PREG_SET_ORDER);
	    return (1 === sizeof($match) && 2 === sizeof($match[0])) ? intval($match[0][1]) : 0;
	}
}
/**
 * LinkedIN Shares
 */
class LinkedINShareCount implements Share_Counter {
	public static function get_share_count( $url ) {
		$remote_get = json_decode( file_get_contents('https://www.linkedin.com/countserv/count/share?url=' . urlencode( $url ) . '&format=json'), true);
		$share_count = $remote_get['count'];
		return $share_count; 
	}
}
/**
 * Pinterest Shares
 */
class PinterestShareCount implements Share_Counter {
	public static function get_share_count( $url ) {
		$check_url = 'http://api.pinterest.com/v1/urls/count.json?callback=pin&url=' . urlencode( $url );
		$response = wp_remote_retrieve_body( wp_remote_get( $check_url ) );
		$response = str_replace( 'pin({', '{', $response);
		$response = str_replace( '})', '}', $response);
		$encoded_response = json_decode( $response, true );
		$share_count = intval( $encoded_response['count'] ); 
		return $share_count;
	}
}
/**
 * StumbleUpon Shares
 */
class StumbleUponShareCount implements Share_Counter {
	public static function get_share_count( $url ) {
		$check_url = 'http://www.stumbleupon.com/services/1.01/badge.getinfo?url=' . urlencode( $url );
		$response = wp_remote_retrieve_body( wp_remote_get( $check_url ) );
		$encoded_response = json_decode( $response, true );
		$share_count = intval( $encoded_response['result']['views'] ); 
		return $share_count;
	}
}
function end_prev_letter() {
   end_prev_row();
   echo "</div><!-- End of letter-group -->\n";
   echo "<div class='clear clearfix'></div>\n";
}
function start_new_letter($letter) {
   echo "<div class='letter-group row'>\n";
   echo "\t<div class='letter-cell'>$letter</div>\n";
   start_new_row($letter);
}
function end_prev_row() {
   echo "\t</div><!-- End row-cells -->\n";
}
function start_new_row() {
   global $in_this_row;
   $in_this_row = 0;
   echo "\t<div class='row-cells'>\n";
}
function upcmc_create_glossary_taxonomy(){
    if(!taxonomy_exists('directory')){
        register_taxonomy('directory',array('faculty', 'personnel'),array(
            'show_ui' => false,
            'name' => 'Directory',
            'label' => 'Directory'
        ));
    }
}
add_action('init','upcmc_create_glossary_taxonomy');
/* When the post is saved, saves our custom data */
function upcmc_save_first_letter( $post_id ) {
    // verify if this is an auto save routine.
    // If it is our form has not been submitted, so we dont want to do anything
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return $post_id;
    //check location (only run for posts)
    $limitPostTypes = array('faculty', 'personnel');
    if (!in_array($_POST['post_type'], $limitPostTypes)) 
        return $post_id;
    // Check permissions
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;
    // OK, we're authenticated: we need to find and save the data
    $taxonomy = 'directory';
    //set term as first letter of post title, lower case
    if(get_field('last_name',$post_id) ){
	$last_name = get_field('last_name',$post_id);
        wp_set_post_terms( $post_id, strtolower(substr($last_name, 0, 1)), $taxonomy );
    }
    //wp_set_post_terms( $post_id, strtolower(substr($_POST['post_title'], 0, 1)), $taxonomy );
    //delete the transient that is storing the alphabet letters
    delete_transient( 'upcmc_archive_alphabet');
}
add_action( 'save_post', 'upcmc_save_first_letter' );
//create array from existing posts
function upcmc_run_once(){
    if ( false === get_transient( 'upcmc_run_once' ) ) {
        $taxonomy = 'directory';
        $alphabet = array();
        $posts = get_posts(array('numberposts' => -1) );
        foreach( $posts as $p ) :
        //set term as first letter of post title, lower case
	if(get_field('last_name',$p->ID) ){
		$last_name = get_field('last_name',$p->ID);
	        wp_set_post_terms( $p->ID, strtolower(substr($last_name, 0, 1)), $taxonomy );
	}
        endforeach;
        set_transient( 'upcmc_run_once', 'true' );
    }
}
add_action('init','upcmc_run_once');
function upcmc_add_custom_types( $query ) {
    if( is_tax() && $query->is_main_query() ) {
        // this gets all post types:
        $post_types = get_post_types();
        // alternately, you can add just specific post types using this line instead of the above:
        // $post_types = array( 'post', 'your_custom_type' );
        $query->set( 'post_type', $post_types );
    }
}
add_filter( 'pre_get_posts', 'upcmc_add_custom_types' );
function upcmc_mime_types($mime_types){
    $mime_types['vcf'] = 'text/x-vcard';
    return $mime_types;
}
add_filter('upload_mimes', 'upcmc_mime_types', 1, 1);
add_action('init', 'custom_taxonomy_flush_rewrite');
function custom_taxonomy_flush_rewrite() {
    global $wp_rewrite;
    $wp_rewrite->flush_rules();
}

// Bike Magazine Custom Widgets
class bikemagazine_social_media_widget extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'bikemagazine_social_media_widget',
			'description' => 'Custom widget for social network icon links.'
		);

		parent::__construct( 'bikemagazine_social_media_widget', 'Bike Magazine Social Network Icon Links Widget', $widget_ops );
	}

	function form($instance) {
		$title   = esc_attr( isset( $instance['title'] ) ? $instance['title'] : '' );

?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?><input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		// Fields
		$instance['title'] = strip_tags($new_instance['title']);

		return $instance;
	}

	function widget($args, $instance) {
		extract( $args );

		$title = apply_filters('widget_title', $instance['title']);

		echo $before_widget;
		echo '<div class="socialnetworkiconwidget">';
		
		if($title){
			echo $before_title . $title . $after_title;
		}

		?>

			<div class="social-network">
				<?php
					if( have_rows('social_network', 'option' ) ): ?>
						<ul class="footer_sn">
							<?php
								while ( have_rows('social_network', 'option' ) ) : the_row();
									$sn_name = get_sub_field('sn_name');
									$sn_type = get_sub_field('sn_type');
									$sn_url = get_sub_field('sn_url');
							?>
								<li class="<?php echo $sn_type; ?>"><a href="<?php echo $sn_url ?>" title="<?php echo $sn_name ?>" rel="nofollow" target="_blank"><i class="fa <?php echo str_replace('sn_','fa-', $sn_type); ?>"></i></a></li>
							<?php endwhile; ?>
						</ul>
				<?php
					endif;
				?>
			</div>
		<?php
		
		echo '</div>';
		echo $after_widget;
	}
}

function load_bikemagazine_widgets(){
	register_widget("bikemagazine_social_media_widget");
}
add_action( 'widgets_init', 'load_bikemagazine_widgets' );

?>