<?php /* Template Name: Page-No-Dynamic-Sidebar */ ?>
<!-- This page is for the Contact page. No dynamic sidebar is displayed with this template. -->

<?php get_header(); ?>

<!-- Start Middle - includes sidebar -->
<div class="middle">
<!-- Start Content - does not include sidebar -->
<div class="content page">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // start the loop ?>
    <!--<article class="blog-excerpt">-->
    
      <?php the_title("<h1>", "</h1>"); ?>
      
      <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); // put anchor tag around the URL for the permalink ?>">
	  	<?php echo get_the_post_thumbnail( $page->ID, 'thumbnail'); ?>
      </a>
      
      <?php the_content(); ?>
      <?php // get_child_pages(); ?>
      
    <!--</article>-->
  <?php endwhile; else : ?>
	<p><?php // _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; // end the loop ?>
  
  <!--<small>page-no-dynamic-sidebar.php</small>-->

</div>
<!-- End Content -->
  
</div>
<!-- End Middle -->

<?php get_footer() ?>

