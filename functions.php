<?php

// Defines
define( 'FL_CHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FL_CHILD_THEME_URL', get_stylesheet_directory_uri() );

// Classes
require_once 'classes/class-fl-child-theme.php';

// Actions
add_action( 'fl_head', 'FLChildTheme::stylesheet' );



		//==============================add pagination=====================*/

function pagination($pages = '', $range = 4)
    {  
         $showitems = ($range * 2)+1;  

         global $paged;
         if(empty($paged)) $paged = 1;

         if($pages == '')
         {
             global $wp_query;
             $pages = $wp_query->max_num_pages;
             if(!$pages)
             {
                 $pages = 1;
             }
         }   

         if(1 != $pages)
         {
             echo "<ul class=\"pagination\"><li class='page_number'>Page ".$paged." of ".$pages."</li>";
             if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>&laquo; First</a></li>";
             if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a></li>";

             for ($i=1; $i <= $pages; $i++)
             {
                 if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
                 {
                     echo ($paged == $i)? "<li><span class=\"current\">".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a></li>";
                 }
             }

             if ($paged < $pages && $showitems < $pages) echo "<li><a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a></li>";  
             if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>Last &raquo;</a></li>";
             echo "</ul>\n";
         }
    } 
	
	


//==============================add custom post=====================*/

	add_action( 'init', 'create_post_type' );
	function create_post_type() {
		
		
		// Home Slider
			register_post_type( 'rtm_slider',
					array(
							'labels' => array(
									'name' => __( 'Home Slider' ),
									'singular_name' => __( 'Slider' ),
									'add_new' => __( 'Add Slider' ),
									'add_new_item' => __( 'Add New Slider' ),
									'edit_item' => __( 'Edit Slider' ),
									'new_item' => __( 'New Slider' ),
									'view_item' => __( 'View Slider' ),
									'featured_image' => __( 'Slider Image' ),
									'set_featured_image' => __( 'Set Slider Image' ),
									'remove_featured_image' => __( 'Remove Slider Image' ),
									'use_featured_image' => __( 'Use Slider Image' ),
									'not_found' => __( 'Sorry, we couldn\'t find the Slider you are looking for.' )
									
							),
					'public' => true,
					'publicly_queryable' => false,
					'exclude_from_search' => true,
					'menu_icon' => 'dashicons-format-gallery',
					'menu_position' => 14,
					'has_archive' => false,
					'hierarchical' => false,
					'capability_type' => 'page',
					'rewrite' => array( 'slug' => 'slider' ),
					'supports' => array( 'title','thumbnail' )
					)
			);



			//============================== Memos =====================*/
			register_post_type( 'memos',
					array(
							'labels' => array(
									'name' => __( 'Memos' ),
									'singular_name' => __( 'Memo' ),
									'add_new' => __( 'Add Memo' ),
									'add_new_item' => __( 'Add New Memo' ),
									'edit_item' => __( 'Edit Memo' ),
									'new_item' => __( 'New Memo' ),
									'view_item' => __( 'View Memo' ),
									'featured_image' => __( 'Memo Image' ),
									'set_featured_image' => __( 'Set Memo Image' ),
									'remove_featured_image' => __( 'Remove Memo Image' ),
									'use_featured_image' => __( 'Use Memo Image' ),
									'not_found' => __( 'Sorry, we couldn\'t find the Memo you are looking for.' )
									
							),
					'public' => true,
					'publicly_queryable' => true,
					'exclude_from_search' => true,
					'menu_icon' => 'dashicons-nametag',
					'menu_position' => 14,
					'has_archive' => false,
					'hierarchical' => false,
					'capability_type' => 'page',
					'rewrite' => array( 'slug' => 'memo' ),
					'supports' => array( 'title','thumbnail','editor' )
					)
			);
			
	}
	



	
	
// Menu
register_nav_menu( 'social-menu', __( 'Top Social Menu', 'rtm' ) );





// Add Thumbnail Support
add_theme_support('post-thumbnails', array ('post','event','party'));



// Image Size
add_image_size( 'recent-news-image', 500, 250, true );
add_image_size( 'slide-image', 1350, 550, true );





		// Slider Shortcode
		
function slider_shortcode( $atts ){
	ob_start();
?>
			
		<div class="slider_area">
		  <div id="owl-demo" class="owl-carousel">
			<?php query_posts('post_type=rtm_slider&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>
				<?php if(have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>        
					<div class="item">
						<div class="slider_bg">
							<?php the_post_thumbnail('slide-image', array('class' => 'slide-thumb')); ?>
						</div>
						<?php if ( get_field('slide_contents') ) : ?>
							<div class="slider_contents slider-<?php the_id(); ?>">
								<?php echo get_field('slide_contents'); ?>
								<div class="button_area">
									<?php if ( get_field('link') ) : ?>
									<a href="<?php echo get_field('link'); ?>">Read More</a>
									<?php else : ?>
									<?php endif; ?>
								</div>
							</div>
						<?php elseif( get_field('link') ) : ?>
							<div class="slider_contents slider-<?php the_id(); ?>">
								<div class="button_area">
									<?php if ( get_field('link') ) : ?>
									<a href="<?php echo get_field('link'); ?>">Read More</a>
									<?php else : ?>
									<?php endif; ?>
								</div>
							</div>
							<?php else : ?>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>    
				<?php endif; ?>
		  </div>
		</div>
			
<?php wp_reset_query(); ?>
<?php	
	return ob_get_clean();
}
add_shortcode( 'slider', 'slider_shortcode' );


	
// Home Recent News Shortcode
function recent_news( $atts ){
	ob_start();
?>
	<ul class="home_recent_news">
		<?php query_posts('post_type=post&post_status=publish&posts_per_page=4&paged='. get_query_var('paged')); ?>
		<?php if(have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>        
				<li>
					<div class="news_contents">
						<div class="date_news"><?php the_time( 'F j, Y' ); ?></div>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					</div>
				</li>
		<?php endwhile; ?> 
		<?php else : ?>
		<h3 class="no_content"><?php _e('Sorry. No Post(s) found!'); ?></h3>			
		<?php endif; ?>
	</ul>

	<?php wp_reset_query(); ?>
<?php	
	return ob_get_clean();
}
add_shortcode( 'recentnews', 'recent_news' );


// Social Menu Shortcode
function social_menu( $atts ){
	ob_start();
?>

	<?php
		wp_nav_menu(array(
			'theme_location' => 'social-menu',
			'items_wrap' => '<ul id="%1$s" class="nav navbar-nav %2$s">%3$s</ul>',
			'container' => false,
			'menu_class' => 'social_menu',
			'fallback_cb' => 'FLTheme::nav_menu_fallback'
		));

	?>
	
<?php	
	return ob_get_clean();
}
add_shortcode( 'socialmenu', 'social_menu' );



// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');


//Define the key to store in the database
define( 'CF7_COUNTER', 'cf7-counter' );
 
//Create the shortcode which will set the value for the DTX field
function cf7dtx_counter(){
    $val = get_option( CF7_COUNTER, 0) + 1;  //Increment the current count
    return $val;
}
add_shortcode('CF7_counter', 'cf7dtx_counter');
 
//Action performed when the mail is actually sent by CF7
function cf7dtx_increment_mail_counter(){
    $val = get_option( CF7_COUNTER, 0) + 1; //Increment the current count
    update_option(CF7_COUNTER, $val); //Update the settings with the new count
}
add_action('wpcf7_mail_sent', 'cf7dtx_increment_mail_counter');



/* visionequipment.net theme functions */

/* added by Abby on 9/16/25 for CSS enqueueing */
// Enqueue Order: If the child CSS isn’t enqueued last (after parent + Beaver front-end), overrides won’t stick.

<?php
add_action('wp_enqueue_scripts', function() {
  // Parent theme CSS
  wp_enqueue_style('bb-theme', get_template_directory_uri().'/style.css', [], null);

  // Child theme CSS (base + responsive, loaded last)
  $dir = get_stylesheet_directory();
  wp_enqueue_style('bb-child', get_stylesheet_directory_uri().'/style.css', ['bb-theme'], filemtime("$dir/style.css"));
  wp_enqueue_style('bb-child-responsive', get_stylesheet_directory_uri().'/responsive.css', ['bb-child'], filemtime("$dir/responsive.css"));
}, 20);

  /* end added by Abby on 9/16/25 for CSS enqueueing */