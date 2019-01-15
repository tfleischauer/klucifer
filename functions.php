<?php

/*
Theme Name: Klucifer
Author: Troy Fleischauer
Author URI: http://www.portfolio.troyfleischauer.com
Description: Custom theme for rickklu.com
*/

// Register Sidebars
register_sidebars( 3, array(
	'before_widget' => '<div id="%1$s" class="widget %2$s">', // will otherwise be a list item
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>'
));
// End Register Sidebars

// Register My Menus
register_nav_menus( array(
	'main-menu' => _( 'Main' ),
	'footer-menu' => _( 'Footer Menu' ),
));
// End Register My Menus

// Create Post Thumbnails - we are using the post-thumbnail function, 
// but we are creating a 'featured image'. Confusing nomenclature, yes.
add_theme_support( 'post-thumbnails' );
// End Create Post Thumbnails

// Enable Excerpts for Pages
add_post_type_support( 'page', 'excerpt' );
// End Enable Excerpts for Pages

// Declare support for HTML5 Galleries and Captions
// add_theme_support( 'html5', array( 'gallery', 'caption' ) );
add_theme_support( 'html5', array( 'gallery') );
// End Declare support for HTML5 Galleries and Captions

// Enables 'WP Gallery Custom Links' plugin 
// https://wordpress.org/plugins/wp-gallery-custom-links/
add_filter( 'wpgcl_filter_raw_gallery_link_url', 'my_gallery_link_url_filter', 10, 3 );
function my_gallery_link_url_filter( $link, $attachment_id, $post_id ) { return '' . $link; }
// End Enables 'WP Gallery Custom Links' plugin 

// Get My Title Tag by Mike Sinkula
function get_my_title_tag() {
	
	// The post variable exists outside of the function. 
	// We need to tell the post variable to be accessible inside the function.
    global $post;  
    
    if ( is_front_page() ) { // for the site's From Page
    	bloginfo('description'); // retrieve the tagline
    }
    
    elseif ( is_page() || is_single() ) { // for your site's Pages or Postings
    	the_title(); // retrieve the page or posting title
    }
	
	else { // for everything else
		bloginfo('description'); // retrieve the site tagline
	}
	
	if ($post->post_parent) { // if there is a parent
		echo ' | '; // seperator with spaces
		echo get_the_title($post->post_parent); // retrieve the Parent Page title (aka Category)
	}
	
	echo ' | '; // seperator with spaces
	bloginfo('name'); // retrieve the site name
	echo ' | ';
	echo 'Seattle, WA'; // write in the location
}
// End Get My Title Tag by Mike Sinkula

// Add Flexslider by Mike Sinkula
function add_flexslider() {
	
	global $post;	
	
	$attachments = get_children(array('post_parent' => $post->ID, 'order' => 'ASC', 'orderby' => 'menu_order', 'post_type' => 'attachment', 'post_mime_type' => 'image' ));
				   
	if ($attachments) { // see if there are images attached to the posting
		
		echo '<div class="flexslider">';
		echo '<ul class="slides">';
		
		foreach ( $attachments as $attachment_id => $attachment ) { // create the list items for images with captions
			
			// $img_source = wp_get_attachment_image_src( $attachment_id, 'large' ); // to attach to larger image
			
			echo '<li>';
			// echo '<a href="'.$img_source[0].'">'; // to attach to larger image
			echo wp_get_attachment_image($attachment_id, 'large');
			// echo '</a>'; // to attach to larger image
			// echo '<p>'; // not using post fields or paragraphs for home page on this site
			// echo get_post_field('post_excerpt', $attachment->ID);
			// echo '</p>';
			echo '</li>';
			
		}
		
		echo '</ul>';
		echo '</div>';
	} // End see if there are images attached to the posting
	
}
// End Add Flexslider by Mike Sinkula

// Show Gravatar in Comments	
function show_avatar($comment, $size) {				
	 $email=strtolower(trim($comment->comment_author_email));
	 $rating = "G"; // [G | PG | R | X]
	 
	if (function_exists('get_avatar')) {
      echo get_avatar($email, $size);
   	} 
   	else {
      
      $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=
         " . md5($emaill) . "&size=" . $size."&rating=".$rating;
      echo "<img src='$grav_url'/>";
   	}		
}
// End Show Gravatar in Comments

// Add External Link to Featured Image with Custom Field
add_filter('post_thumbnail_html','add_external_link_on_page_post_thumbnail',10);
    function add_external_link_on_page_post_thumbnail( $html ) {
    if( is_singular() ) {
            global $post;
            $name = get_post_meta($post->ID, 'ExternalUrl', true);
            if( $name ) {
                    $html = '<a href="' . ( $name ) . '" target="_blank" >' . $html . '</a>';
            }
    }
    return $html;
    }
// End Add External Link to Featured Image with Custom Field

/* function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 150,
		'single_image_width'    => 300,

        'product_grid'          => array(
            'default_rows'    => 3,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 4,
            'min_columns'     => 2,
            'max_columns'     => 5,
        ),
	) );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' ); */

/* START Change the single product template */
/* https://www.sitepoint.com/customize-woocommerce-product-pages/ */
/* function get_custom_post_type_template($single_template) {
 global $post;

 if ($post->post_type == 'product') {
      $single_template = dirname( __FILE__ ) . '/single-template.php';
 }
 return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template' ); */

/* as well as following code include in template _include */
/* add_filter( 'template_include', 'portfolio_page_template', 99 );

function portfolio_page_template( $template ) {

    if ( is_page( 'slug' )  ) {
        $new_template = locate_template( array( 'single-template.php' ) );
        if ( '' != $new_template ) {
            return $new_template ;
        }
    }

    return $template;
} */
/* END Change the single product template */

// Note:  WP Admin will not allow log-in if there is any more than one blank line at the end of functions.php.

?>
