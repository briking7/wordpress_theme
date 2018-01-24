<?php
/*
Author: Eddie Machado
URL: htp://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, ect.
*/

/************* INCLUDE NEEDED FILES ***************/

require_once( 'library/navwalker.php' ); // needed for bootstrap navigation


// REDUX.  Needed for custom admin panel
// https://github.com/ReduxFramework/ReduxFramework
// WIP

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' ) ) {
	require_once( dirname( __FILE__ ) . '/library/admin/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/library/option-config.php' ) ) {
	require_once( dirname( __FILE__ ) . '/library/option-config.php' );
}


// Custom metaboxes and fields
// https://github.com/jaredatch/Custom-Metaboxes-and-Fields-for-WordPress
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
  if ( !class_exists( 'cmb_Meta_Box' ) ) {
    require_once( 'library/metabox/init.php' );
  }
}

// Filter frontpage_template to bypass front-page.php template file when blog posts index is being displayed 
// https://codex.wordpress.org/Creating_a_Static_Front_Page
function themeslug_filter_front_page_template( $template ) {
    return is_home() ? '' : $template;
}
add_filter( 'frontpage_template', 'themeslug_filter_front_page_template' );

/* library/bones.php (functions specific to BREW)
  - navwalker
  - Redux framework
  - Read more > Bootstrap button
  - Bootstrap style pagination
  - Bootstrap style breadcrumbs
*/
require_once( 'library/brew.php' ); // if you remove this, BREW will break
/*
1. library/bones.php
	- head cleanup (remove rsd, uri links, junk css, ect)
	- enqueueing scripts & styles
	- theme support functions
	- custom menu output & fallbacks
	- related post function
	- page-navi function
	- removing <p> from around images
	- customizing the post excerpt
	- custom google+ integration
	- adding custom fields to user profiles
*/
require_once( 'library/bones.php' ); // if you remove this, bones will break
/*
2. library/custom-post-type.php
	- an example custom post type
	- example custom taxonomy (like categories)
	- example custom taxonomy (like tags)
*/
require_once( 'library/custom-post-type.php' ); // you can disable this if you like
/*
3. library/admin.php
	- removing some default WordPress dashboard widgets
	- an example custom dashboard widget
	- adding custom login css
	- changing text in footer of admin
*/
// require_once( 'library/admin.php' ); // this comes turned off by default
/*
4. library/translation/translation.php
	- adding support for other languages
*/
// require_once( 'library/translation/translation.php' ); // this comes turned off by default

/************* CUSTOM HEADER IMAGE *************/

// CUSTOM HEADER 

$header_info = array(
    'width'         => 2000,
	'flex-width'    => true,
    'height'        => 865,
	'flex-height'    => true,
    'default-image' => get_template_directory_uri() . '/library/images/headers/mountain.jpg',
);
add_theme_support( 'custom-header', $header_info );
 
$header_images = array(
    'beach' => array(
            'url'           => get_template_directory_uri() . '/library/images/headers/default.jpg',
            'thumbnail_url' => get_template_directory_uri() . '/library/images/headers/default.jpg',
            'description'   => 'Beach and Sky Landscape View',
    ),
    'reflection' => array(
            'url'           => get_template_directory_uri() . '/library/images/headers/beach_reflection.jpg',
            'thumbnail_url' => get_template_directory_uri() . '/library/images/headers/beach_reflection.jpg',
            'description'   => 'Beach With Reflection of Person',
    ),  
);
register_default_headers( $header_images );

// register secondary nav menu
function register_secondary_menus() {
  register_nav_menus(
    array(
      'footer-menu' => __( 'Footer Social Media Menu' ),
      'social-menu' => __( 'Social Media Menu' )
    )
  );
}
add_action( 'init', 'register_secondary_menus' );

// the social menu
function waywardkin_social_nav() {
	
wp_nav_menu( array( 'theme_location' => 'social-menu',
							'container_class' => 'menu clearfix',
							'container' => false,
							'menu_class' => 'nav navbar-nav navbar navbar-collapse collapse navbar-responsive-collapse',
							'before' => '', // before the menu
							'after' => '', // after the menu
							'link_before' => '<img src="', // before each link
							'link_after' => '">', // after each link
							'depth' => 2, // limit the depth of the nav
							)
			);
}/* end waywardkin social nav */

// the footer menu
function waywardkin_footer_menu() {
	
wp_nav_menu( array( 'theme_location' => 'footer-menu',
							'container_class' => 'menu clearfix',
							'container' => false,
							'menu_class' => 'secondary-footer-menu',
							'before' => '', // before the menu
							'after' => '', // after the menu
							'link_before' => '<img src="', // before each link
							'link_after' => '">', // after each link
							'depth' => 2, // limit the depth of the nav
							)
			);
}/* end waywardkin footer menu */

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes

if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 200, 200, array( 'center', 'center')  ); // 200 pixels wide by 200 pixels tall, crop mode

    // additional image sizes
    add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
	add_image_size( 'product-page-header', 2000, 500, array( 'center', 'center') );
	add_image_size( 'post-header', 2000, 865, true );
}
//add_image_size( 'wk-thumb-sm', 300, 100, true );
//add_image_size( 'wk-thumb-sq', 300, 300, true );
//add_image_size( 'wk-thumb-lg', 600, 150, true );
//add_image_size( 'wk-thumb-lg-sq', 600, 600, true );
//add_image_size( 'wk-thumb-md', 300, 150, true );

//add_image_size( 'post-featured', 2000, 865, true );
//add_image_size( 'post-header', 3000, 865, true );


/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 300 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 100 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

/************* ACTIVE SIDEBARS ********************/

// Sidebars & Widgetizes Areas
function bones_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'Sidebar 1', 'bonestheme' ),
		'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));


// add footer widgets

  register_sidebar(array(
    'id' => 'footer-1',
    'name' => __( 'Footer Widget 1', 'bonestheme' ),
    'description' => __( 'The first footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-2',
    'name' => __( 'Footer Widget 2', 'bonestheme' ),
    'description' => __( 'The second footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

  register_sidebar(array(
    'id' => 'footer-3',
    'name' => __( 'Footer Widget 3', 'bonestheme' ),
    'description' => __( 'The third footer widget.', 'bonestheme' ),
    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<h4 class="widgettitle">',
    'after_title' => '</h4>',
  ));

//    register_sidebar(array(
//    'id' => 'footer-4',
//    'name' => __( 'Footer Widget 4', 'bonestheme' ),
//    'description' => __( 'The fourth footer widget.', 'bonestheme' ),
//    'before_widget' => '<div id="%1$s" class="widget widgetFooter %2$s"> <img src="',
//    'after_widget' => '"></div>',
//    'before_title' => '<h4 class="widgettitle">',
//    'after_title' => '</h4>',
//  ));

	/*
	to add more sidebars or widgetized areas, just copy
	and edit the above sidebar code. In order to call
	your new sidebar just use the following code:

	Just change the name to whatever your new
	sidebar's id is, for example:

	register_sidebar(array(
		'id' => 'sidebar2',
		'name' => __( 'Sidebar 2', 'bonestheme' ),
		'description' => __( 'The second (secondary) sidebar.', 'bonestheme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));

	To call the sidebar in your template, you can just copy
	the sidebar.php file and rename it to your sidebar's name.
	So using the above example, it would be:
	sidebar-sidebar2.php

	*/
} // don't remove this bracket!





/************* COMMENT LAYOUT *********************/

// Comment Layout
function bones_comments( $comment, $args, $depth ) {
   $GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?>>
		<article id="comment-<?php comment_ID(); ?>" class="clearfix comment-container">
			<div class="comment-author vcard">
				<?php
				/*
					this is the new responsive optimized comment image. It used the new HTML5 data-attribute to display comment gravatars on larger screens only. What this means is that on larger posts, mobile sites don't have a ton of requests for comment images. This makes load time incredibly fast! If you'd like to change it back, just replace it with the regular wordpress gravatar call:
					echo get_avatar($comment,$size='32',$default='<path_to_url>' );
				*/
				?>
				<?php // custom gravatar call ?>
				<?php
					// create variable
					$bgauthemail = get_comment_author_email();
				?>
				<img data-gravatar="http://www.gravatar.com/avatar/<?php echo md5( $bgauthemail ); ?>?s=64" class="load-gravatar avatar avatar-48 photo" height="64" width="64" src="<?php echo get_template_directory_uri(); ?>/library/images/nothing.gif" />
				<?php // end custom gravatar call ?>
			</div>
      <div class="comment-content">
        <?php printf(__( '<cite class="fn">%s</cite>', 'bonestheme' ), get_comment_author_link()) ?>
        <time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__( 'F jS, Y', 'bonestheme' )); ?> </a></time>
        <?php edit_comment_link(__( '(Edit)', 'bonestheme' ),'  ','') ?>
  			<?php if ($comment->comment_approved == '0') : ?>
  				<div class="alert alert-info">
  					<p><?php _e( 'Your comment is awaiting moderation.', 'bonestheme' ) ?></p>
  				</div>
  			<?php endif; ?>
  			<section class="comment_content clearfix">
  				<?php comment_text() ?>
  			</section>
  			<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div> <!-- END comment-content -->
		</article>
	<?php // </li> is added by WordPress automatically ?>
<?php
} // don't remove this bracket!

/*************** PINGS LAYOUT **************/

function list_pings( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<li id="comment-<?php comment_ID(); ?>">
		<span class="pingcontent">
			<?php printf(__('<cite class="fn">%s</cite> <span class="says"></span>'), get_comment_author_link()) ?>
			<?php comment_text(); ?>
		</span>
	</li>
<?php } // end list_pings



/*************** Archive Title **************/

//function get_the_archive_title() {
//    if ( is_category() ) {
//        /* translators: Category archive title. 1: Category name */
//        $title = sprintf( __( 'Category: %s' ), single_cat_title( '', false ) );
//    } elseif ( is_tag() ) {
//        /* translators: Tag archive title. 1: Tag name */
//        $title = sprintf( __( 'Tag: %s' ), single_tag_title( '', false ) );
//    } elseif ( is_author() ) {
//        /* translators: Author archive title. 1: Author name */
//        $title = sprintf( __( 'Author: %s' ), '<span class="vcard">' . get_the_author() . '</span>' );
//    } elseif ( is_year() ) {
//        /* translators: Yearly archive title. 1: Year */
//        $title = sprintf( __( 'Year: %s' ), get_the_date( _x( 'Y', 'yearly archives date format' ) ) );
//    } elseif ( is_month() ) {
//        /* translators: Monthly archive title. 1: Month name and year */
//        $title = sprintf( __( 'Month: %s' ), get_the_date( _x( 'F Y', 'monthly archives date format' ) ) );
//    } elseif ( is_day() ) {
//        /* translators: Daily archive title. 1: Date */
//        $title = sprintf( __( 'Day: %s' ), get_the_date( _x( 'F j, Y', 'daily archives date format' ) ) );
//    } elseif ( is_tax( 'post_format' ) ) {
//        if ( is_tax( 'post_format', 'post-format-aside' ) ) {
//            $title = _x( 'Asides', 'post format archive title' );
//        } elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
//            $title = _x( 'Galleries', 'post format archive title' );
//        } elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
//            $title = _x( 'Images', 'post format archive title' );
//        } elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
//            $title = _x( 'Videos', 'post format archive title' );
//        } elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
//            $title = _x( 'Quotes', 'post format archive title' );
//        } elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
//            $title = _x( 'Links', 'post format archive title' );
//        } elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
//            $title = _x( 'Statuses', 'post format archive title' );
//        } elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
//            $title = _x( 'Audio', 'post format archive title' );
//        } elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
//            $title = _x( 'Chats', 'post format archive title' );
//        }
//    } elseif ( is_post_type_archive() ) {
//        /* translators: Post type archive title. 1: Post type name */
//        $title = sprintf( __( 'Archives: %s' ), post_type_archive_title( '', false ) );
//    } elseif ( is_tax() ) {
//        $tax = get_taxonomy( get_queried_object()->taxonomy );
//        /* translators: Taxonomy term archive title. 1: Taxonomy singular name, 2: Current taxonomy term */
//        $title = sprintf( __( '%1$s: %2$s' ), $tax->labels->singular_name, single_term_title( '', false ) );
//    } else {
//        $title = __( 'Archives' );
//    }
// 
//    /**
//     * Filters the archive title.
//     *
//     * @since 4.1.0
//     *
//     * @param string $title Archive title to be displayed.
//     */
//    return apply_filters( 'get_the_archive_title', $title );
//}


function my_theme_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }
  
    return $title;
}
 
add_filter( 'get_the_archive_title', 'my_theme_archive_title' );



remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);


add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div class="container content-wrapper">';
	echo '<div id="content" class="clearfix row">';
	echo '<div id="woocommerce-main" class="col-md-10 col-md-offset-1 clearfix" role="main">';
	echo("<?php get_template_part( 'breadcrumb' ); ?>");
         
}

function my_theme_wrapper_end() {
  echo '</div>';
	echo '</div>';
	echo '</div>';
}

// Woocommerce Theme Support

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Image - Custom Field 
// Function get meta info for images made in custom fields, assigns class
// Make sure to call function in the place you want to display it! 
// get_custom_image($key);

function get_custom_image($key, $alt="", $class_value='home-image') {
	global $post;
	$image = get_post_meta($post->ID, $key, true);
	$alt_tag = get_post_meta($post->ID, $alt, true);
	
	if($image){

	echo '<img src="' . $image .  '" alt="' . $alt_tag . '" class="' . $class_value . ' img-responsive" />';

	}
	
}

// Main Title - Custom Field 
// Function get meta info for the main title of the page made in custom fields, assigns class
// Make sure to call function in the place you want to display it! 
// get_main_title($key);

function get_main_title($key, $class_value='main-title') {
	global $post;
	$main_title = get_post_meta($post->ID, $key, true);
	
	if($main_title){

	echo '<h1 class="' . $class_value . '">' . $main_title . '</h1>';

	}
	
}


// Text Field with Title - Custom Field 
// Function get meta info for the text fields of the page made in custom fields, assigns class
// Make sure to call function in the place you want to display it! 
// get_text_and_title_field_home($key);

function get_text_and_title_field_home($title_key, $text_key, $class_value='text-field-home') {
	global $post;
	$block_title = get_post_meta($post->ID, $title_key, true);
	$block_text = get_post_meta($post->ID, $text_key, true);
	
	if($block_title){

	echo '<h2 class="text-center ' . $class_value . '">' . $block_title . '</h2>';

	}
	
	if($block_text){

	echo '<p class="' . $class_value . '">' . $block_text . '</p>';

	}
	
}


// Text Field with Title - Custom Field 
// Function get meta info for the text fields of the page made in custom fields, assigns class
// Make sure to call function in the place you want to display it! 
// get_text_field_home($key);

function get_text_field_home($text_key, $class_value='text-field-home') {
	global $post;
	$block_text = get_post_meta($post->ID, $text_key, true);
	
	if($block_text){

	echo '<p class="' . $class_value . '">' . $block_text . '</p>';

	}
	
}


// Title Field - Custom Field 
// Function get meta info for the text fields of the page made in custom fields, assigns class
// Make sure to call function in the place you want to display it! 
// get_title_field_home($key);

function get_title_field_home($title_secondary_key, $class_value='title-secondary-field-home') {
	global $post;
	$secondary_title = get_post_meta($post->ID, $title_secondary_key, true);
	
	if($secondary_title){

	echo '<h3 class="' . $class_value . '">' . $secondary_title . '</h3>';

	}
	
}

// Quote Field - Custom Field 
// Function get meta info for the text fields of the page made in custom fields, assigns class
// Make sure to call function in the place you want to display it! 
// get_quote_field_home($key);

function get_quote_field_home($quote_key, $author_key, $class_value='quote-field-home') {
	global $post;
	$quote_text = get_post_meta($post->ID, $quote_key, true);
	$quote_author = get_post_meta($post->ID, $author_key, true);
	
	if($quote_text){

	echo '<blockquote class="quote-text' . $class_value . '">' . $quote_text;

		
		if($quote_author){

	echo '<cite class="clearfix text-right quote-author ' . $class_value . '">' . $quote_author . '</cite>';

	}
	echo '</blockquote>';
	}
	
}

// Shop Header Image - Custom Field on Shop Pages
// Function get meta info for images made in custom fields, assigns class
// Make sure to call function in the place you want to display it! 
// get_shop_header_image($key);

function get_shop_header_image($key, $alt="", $class_value='shop-page-header-image') {
	global $post;
	$header_image_pages = get_post_meta($post->ID, $key, true);
	$alt_tag = get_post_meta($post->ID, $alt, true);
	
	if($header_image_pages){

	echo '<img src="' . $header_image_pages .  '" alt="' . $alt_tag . '" class="' . $class_value . ' img-responsive" />';

	}
	
}

?>