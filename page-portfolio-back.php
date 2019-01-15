<?php /* Template Name: Page-Portfolio-Back */ ?>

<?php get_header(); ?>

<!-- Start Middle - includes sidebar -->
<div class="middle portfolio">
<!-- Start Content - does not include sidebar -->
<!--<div class="content page">-->
  
  <div>
    <span class="title-width"><?php the_title("<h1>", "</h1>"); ?></span>
    <div id="nav-back-more"><span class="back"><?php echo previous_page_not_post('&laquo; Back'); ?></span></div>
  </div>
    
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // start the loop ?>
    <div>    
      
      <a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title(); // put anchor tag around the URL for the permalink ?>">
        <?php // echo get_the_post_thumbnail( $page->ID, 'thumbnail'); ?>
        
        <?php echo the_post_thumbnail( 'thumbnail' ); // get the featured image ?>
      </a>
      
      <?php the_content(); ?>
      <?php // get_child_pages(); ?>
      
    </div>
  <?php endwhile; else : ?>
	<p><?php // _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; // end the loop ?>
  
  <!--<small>page-portfolio-back.php</small>-->

<!--</div>-->
<!-- End Content -->

</div>
<!-- End Middle -->

<?php get_footer() ?>

