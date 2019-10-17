<?php /* Template Name: Page-Merch */ ?>

<?php get_header(); ?>

<!-- Start Middle - includes sidebar -->
<div class="middle">
<!-- Start Content - does not include sidebar -->
<div class="content page-category">

  <h1><?php if (is_category()) { single_cat_title(); } else { single_post_title(); } ?></h1>

	<?php
      // Creates a new query based on category name, then loops through displaying posts.
      $categoryQuery = new WP_Query( array( 'category_name' => 'merch' ) );
      if($categoryQuery->have_posts()) : while($categoryQuery->have_posts()) : $categoryQuery->the_post();
    ?>
      
      <article class="blog-excerpt">
    
         <h2 id="post-<?php the_ID(); ?>">
            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanant Link to <?php the_title(); ?>">
            <?php the_title(); // put anchor tag around the title of the current post ?></a>
         </h2>
         <small class="by-line">Posted in: <?php the_category(', ') ?> <br/> <?php the_tags( 'Tags: ', ', ', '.' ); ?></small>
      
         <div class="wp-caption aligncenter">
           <a href="<?php the_permalink(); ?>" rel="bookmark" class="image-in-feed" title="Permanent Link to <?php the_title(); // put anchor tag around the URL for the permalink ?>">
             <?php echo get_the_post_thumbnail( $page->ID, 'large'); ?>
          
             <?php if ( $caption = get_post( get_post_thumbnail_id() )->post_excerpt ) ?>
               <p class="wp-caption-text wp-caption aligncenter"><?php echo $caption; ?></p>
           </a>
         </div>
    
         <?php the_content(); ?>
        
      </article>
    
    <?php endwhile; else : ?>
	  <p>No events are scheduled at this time.</p>
    <?php endif; // end the loop ?>
  
    <!--<small>page-merch.php</small>-->

</div>
<!-- End Content -->

<?php // get_sidebar(); ?>

</div>
<!-- End Middle -->

<?php get_footer(); ?>

