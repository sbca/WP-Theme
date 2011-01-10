<?php
/*
Template Name: Guides
*/
?>

<?php get_header(); ?>
<div id="guides-header">
	<div id="guides-logo"><a href="http://www.sbca.org.uk/guides/"><img src="http://www.sbca.org.uk/wp-content/themes/jq/img/guides-logo.png" /></a></div><!--/guides-logo-->
	<div id="guides-menu">
   			
  				<?php
				wp_nav_menu( array( 'theme_location' => 'guides-menu' ) );
				?>
  			

	</div><!--/guides-meni-->
</div><!--/guides-header-->

<div id="content" class="clearfix">

<?php get_sidebar(); ?>

<div id="left">
<div class="single_content">
<!-- page content -->

<?php if (have_posts()) : ?>

<?php while (have_posts()) : the_post(); ?>

<h1 class="page_headline"><?php the_title(); ?></h1>
<div class="clearfix"></div>

<?php the_content(); ?>
<?php comments_template(); ?>

<?php endwhile; ?>

<?php else : ?>

<?php _e('Sorry, no posts matched your criteria.'); ?>

<?php include (TEMPLATEPATH . "/searchform.php"); ?>

<?php endif; ?>

</div>
</div>

</div>

<?php get_footer(); ?>
