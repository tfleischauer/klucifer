<!-- Begin Sidebar -->
<div class="sidebar">

  <!-- Begin Sub-Navigation -->
  <div id="sub-navigation" class="widget">
    <?php wp_reset_query(); // ?needed for Events templates? ?>
	<?php if (is_page()): // if we are in 'pages'... ?>
      <h2 class="sub-navigation-title">
          <?php // echo get_the_title($post->post_parent); // ... get the gateway page title ?>
      </h2>
      <ul class="sub-navigation-items">
          <?php
              if ($post ->post_parent) { // if the page has a parent...
                  wp_list_pages( array(
				  	'child_of' => $post->post_parent, 
					'title_li' => __('')
				     )); // list the sub-pages with no title
              } else { // if the page does not have a parent... (a gateway page)
                  wp_list_pages( array(
				  	'child_of' => $post->ID, 
					'title_li' => __('')
				     )); // ... list the sub-pages with no title
              }
          ?>
       </ul>
     <?php endif; // end if we are in 'pages' ?>   
  </div>
  <!-- End Sub-Navigation -->
  
  <!-- Begin Widgets -->
  <div class="widget">
      <?php dynamic_sidebar(1); // Show on every page ?>
	  <?php if (!( is_page() || is_search() || is_404() )) : // Show on every page except page.php, 404.php, and search.php ?>
      <?php dynamic_sidebar(2); // Appears on index.php ?>
      <?php endif; ?>
      <?php dynamic_sidebar(3); // Show on every page ?>
  </div>
  <!-- End Widgets -->
  
  <!-- Begin Quote -->
  <?php if(get_post_meta($post->ID, 'Quote', true)) : ?> <!-- 3 parameters: post ID, the key, the value. If the key of Quote exists. -->
    <div class="widget">  
          <blockquote> <?php echo (get_post_meta($post->ID, 'Quote', true)); ?> </blockquote> <!-- use echo to call the value -->
    </div>   
  <?php endif; ?>
  <!-- End Quote -->
  
  <!--<small>sidebar.php</small>-->
     
 </div>
 <!-- End Sidebar -->