<?php
/*
Template Name: SOAP
*/
?>

<?php get_header(); ?>
<div id="soap-header">
	<div id="soap-logo"><a href="http://www.sbca.org.uk/guides"><img src="http://www.sbca.org.uk/wp-content/themes/jq/img/guides-logo.gif" /></a></div><!--/soap-logo-->
	<div id="soap-menu">
   			<ul>
  				<?php
				wp_nav_menu( array( 'theme_location' => 'guides-menu' ) ); >
				?>
  			</ul>

	</div><!--/soap-meni-->
</div><!--/soap-header-->

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
