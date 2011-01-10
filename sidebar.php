<div id="right">
<p id="toggle-all"><a href="#" id="toggle" class="hide-all">Toggle posts</a></p>

<p id="font-resize">
<a id="default" href="#">A </a><a id="larger" href="#">A+ </a><a id="largest" href="#">A++</a>

</p>

<!-- widget -->
<div id="fbconnet">
<?php
	echo fbc_render_login_state();
?>
</div>

<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar_right') ) : ?>
<div class="widget">

<h4>Categories</h4>

<ul>

<?php wp_list_categories('title_li=0&categorize=0'); ?>

</ul>
</div>

<div class="widget">

<h4>Blogroll</h4>

<ul>

<?php wp_list_bookmarks('title_li=0&categorize=0'); ?>

</ul>
</div>
<div class="widget">

<h4>Meta</h4>	

<ul>

<?php wp_register(); ?>

<li><?php wp_loginout(); ?></li>

<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Syndicate this site using RSS'); ?>"><?php _e('<abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>

<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('The latest comments to all posts in RSS'); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>

<?php wp_meta(); ?>

</ul>

</div>

<?php endif; // endif widget ?>     

</div>

