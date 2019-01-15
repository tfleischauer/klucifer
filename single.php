<?php get_header(); ?>

<!-- Start Middle - includes sidebar -->
<div class="middle">
<!-- Start Content - does not include sidebar-->
<div class="content">

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); // start the loop ?>
    <article id="post-<?php the_ID(); ?>" class="post">
      <?php the_title('<h1>', '</h1>'); ?>
      
      <small class="by-line">Posted on <?php the_time('F jS, Y') ?> by <?php the_author(); ?> in <?php the_category(', ') ?>. <br/> <?php the_tags( 'Tags: ', ', ', '.' ); ?></small>
      
      <div class="wp-caption aligncenter">
		<?php the_post_thumbnail('large'); // get the featured image ?>
        
        <?php if ( $caption = get_post( get_post_thumbnail_id() )->post_excerpt ) ?>
          <p class="wp-caption-text"><?php echo $caption; ?></p>
      </div>
  
      <?php the_content(''); // get the page or posting written content ?>
      
      <nav class="prev-next-posts">
       <p class="alignleft"><?php next_posts_link('&laquo; Older Posts') ?></p>
       <p class="alignright"><?php previous_posts_link('Newer Posts &raquo;') ?></p>
      </nav>
    </article>
    
    <?php comments_template(''); ?>
  
  <?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; // end the loop ?>
  
  <small>single.php</small>

</div>
<!-- End Content -->

<?php get_sidebar(); ?>

</div>
<!-- End Middle -->

<?php get_footer() ?>

