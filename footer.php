<!-- Start Footer -->
<footer>

<!-- Start Footer Basic (displays on small screen sizes only)-->       
<p class="footer-basic">&copy; <?php print ("" . date ('Y') . ""); ?> Rick Klu <!--<a href="site-map.php">Site Map</a>--></p>
<!-- End Footer Basic --> 

<!-- Start Footer Navigation -->
<!--<nav id="nav-footer">-->
<?php wp_nav_menu( array('theme_location' => 'footer-menu', 'container' => 'nav', 'container_id' => 'nav-footer')); ?>
<!--</nav>-->

<nav class="nav-footer-utility">
    <ul>
      <li>&copy; <?php print ("" . date ('Y') . ""); ?> Rick Klu</li>
      <li>  | </li>
      <li><a href="<?php get_template_directory_uri(); ?>/site-map">Site Map</a></li>
      <li> | </li>
      <li><a href="<?php get_template_directory_uri(); ?>/web-design">Web Design</a></li>
      <li> | </li>
      <li><span class="login"><?php wp_loginout(); ?></span></li>
      <!--<li> | </li>-->
      <li><?php // wp_register('','.'); ?></li>
    </ul>
</nav>
<!-- End Footer Navigation -->

<!--<small>footer.php</small>-->

</footer>
<!-- End Footer -->

<!-- Start Analytics -->
<!-- End Analytics -->

</div>
<!-- End Wrapper -->

<!-- Start WP Footer -->
<?php wp_footer(); ?>
<!-- End WP Footer -->

</body>
</html>

