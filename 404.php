<?php get_header(); ?>

<!-- Start Middle - includes sidebar -->
<div class="middle">
<!-- Start Content - does not include sidebar-->
<div class="content fourzerofour">
  
  <div id="page-content-<?php the_ID(); ?>" class="page-content">
  	<h1>404 Error:</h1>
  	<p>The page you are looking for does not exist... Try a search?</p>
  	<?php get_search_form(); ?>
  </div>
  
  <!--<small>404.php</small>-->

</div>
<!-- End Content -->

<?php get_sidebar(); ?>

</div>
<!-- End Middle -->

<?php get_footer() ?>

