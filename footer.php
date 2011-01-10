<!-- footer template -->

<div id="appendix" class="clearfix">
<div class="app_widget_bottom">

<!-- sidebar_bottom_left -->
<?php if (date(n) == 12) { 
	echo '<div id="xmas-tree"><img src="http://www.sbca.org.uk/wp-content/themes/jq/img/xmas-tree.gif" /></div>';
}
?>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_bottom_left') ) : ?>
<div class="widget_bottom">

</div>

<?php endif; // endif widget ?>
</div>
<div class="app_widget_bottom">


<a id="totop" href="#">To top</a>
<p class="copyright">&copy; <?php echo date("Y"); ?> <?php bloginfo('name'); ?> </p> <p class="advertise"><a href="http://www.sbca.org.uk/advertise/">Advertise with Us</a></p> <p class="privacy"><a href="http://www.sbca.org.uk/privacy-policy/">Privacy Policy</a></p>
</div>

</div>

</div>
<!-- wp_footer -->

<?php wp_footer(); ?>

</body>

</html>

