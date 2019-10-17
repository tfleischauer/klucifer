<?php /* Template Name: Page-About */ ?>

<?php get_header(); ?>

<!-- Start Middle - includes sidebar area -->
<div class="middle">
<!-- Start Content - does not include sidebar -->
<!--<div class="content page">-->

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // start the loop ?>
  	<!-- Start About Page -->
    <div class="about-content">
    
      <?php the_title("<h1>", "</h1>"); ?>
      
      <?php the_content(); ?>
      <?php // get_child_pages(); ?>
      
    </div>
    <!-- End About Content -->
 
  <?php endwhile; else : ?>
	<p><?php // _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; // end the loop ?>
  
  <!--<small>page-about.php</small>-->

<!--</div>-->
<!-- End Content -->

</div>
<!-- End Middle -->

<?php get_footer() ?>

