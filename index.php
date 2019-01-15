<?php get_header(); ?>

<!-- Start Middle - includes sidebar -->
<div class="middle">
<!-- Start Content - does not include sidebar-->
<div class="content">

  <h1><?php if (is_category()) { single_cat_title(); } else { single_post_title(); } ?></h1>
  <p><?php // get_seo(); ?></p>
  
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // start the loop ?>
    <article class="blog-excerpt">
    
      <h2 id="post-<?php the_ID(); ?>">
      	<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanant Link to <?php the_title(); ?>">
	  	<?php the_title(); // put anchor tag around the title of the current post ?>&nbsp;&raquo;</a>
      </h2>
      
      <small class="by-line">Posted on <?php the_time('F jS, Y') ?> by <?php the_author(); ?> in <?php the_category(', ') ?>. <br/> <?php the_tags( 'Tags: ', ', ', '.' ); ?></small> <!-- the S in jS adds suffix such as 'th', as in Feb 6th -->
      
      <a href="<?php the_permalink(); // links to page or posting ?>" rel="bookmark" title="Permanent Link to <?php the_title(); // put anchor tag around the URL for the permalink ?>">
	  	<?php echo get_the_post_thumbnail( $post->ID, 'thumbnail'); ?>
        <?php // the_post_thumbnail( 'thumbnail' ); ?>
      </a>
      
      <!-- the excerpt automatically is put in <p></p>, strip_tags strip away <p></p> -->
      <p><?php echo strip_tags(get_the_excerpt()); ?> &nbsp;<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">Read More&nbsp;&raquo;</a></p>
      
    </article>
    
    <?php endwhile; else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  	<?php endif; // end the loop ?>
    
    <nav class="prev-next-posts">
     <p class="alignleft"><?php next_posts_link('&laquo; Older Posts') ?></p>
     <p class="alignright"><?php previous_posts_link('Newer Posts &raquo;') ?></p>
  	</nav>
  
  <small>index.php</small>

</div>
<!-- End Content -->

<?php get_sidebar(); ?>

</div>
<!-- End Middle -->

<?php get_footer(); ?>

