<?php
/*
Template Name: Page with no Sidebar
*/
?>


<?php get_header(); ?>

<div id="content" class="clearfix">

<div id="left-noside">
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
