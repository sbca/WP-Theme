<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>



<head profile="http://gmpg.org/xfn/11">
<!-- TradeDoubler site verification 1861321 -->
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<?php
function is_subpage()
{
	global $post, $wpdb;

	if ( is_page() AND isset( $post->post_parent ) != 0 )
	{
		$aParent = $wpdb->get_row( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE ID = %d AND post_type = 'page' LIMIT 1", $post->post_parent ) );
		if ( $aParent->ID ) return true; else return false;
	}
	else
	{
		return false;
	}
}
?>

<title>

<?php if ( is_page('3')  ) { bloginfo('name'); }

elseif ( is_home()  ) { echo "News - "; bloginfo('name'); } 

elseif ( is_search() ) { echo $s; echo" - "; bloginfo('name'); } 

elseif ( is_single() ) { echo wp_title(''); echo" - News - "; bloginfo('name'); }

elseif ( is_subpage() == "true" ) { echo wp_title(''); echo" - "; $parent_title = get_the_title($post->post_parent); echo $parent_title; echo " - "; bloginfo('name'); }

elseif ( is_page() ) { echo wp_title(''); echo" - "; bloginfo('name'); }

elseif ( is_category() ) { echo"Archive for "; single_cat_title();  echo" - News - "; bloginfo('name'); } 

elseif ( is_month() ) { echo"Archive for ";  the_time('F'); echo" - News - "; bloginfo('name'); }

elseif ( is_tag() ) { echo"Archive for ";  single_tag_title(); echo" - News - "; bloginfo('name'); }

elseif ( is_404() ) { echo"Sorry, not found! - "; bloginfo('name'); } ?>

</title>

<?php

/* This code retrieves all our admin options. */

global $options;

foreach ($options as $value) {

	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }

}

?>

<?php /* Style Schemes */

if ($jq_style_scheme == 'Default') { ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php } ?>

<?php

if ($jq_style_scheme == 'Serif') { ?>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/css/style_serif.css" type="text/css" media="screen" />

<?php } ?>

<?php

if ($jq_style_scheme == 'Dark') { ?>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/css/style_dark.css" type="text/css" media="screen" />

<?php } ?>

<?php

if ($jq_style_scheme == 'Green') { ?>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/lib/css/style_green.css" type="text/css" media="screen" />

<?php } ?>

<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/jquery.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/superfish.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/supersubs.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/cookies.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/fontResizer.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/theme.js"></script>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/lib/js/shortcut.js"></script>

 <script>
	shortcut.add("F2",function() {
   		window.location="http://www.sbca.org.uk/wp-login.php"
	},{
   	'type':'keydown',
   	'propagate':true,
   	'target':document
	});
     </script>
  <!-- End Esc to login -->

<style type="text/css">

<?php /* Sidebar position */

if (!($jq_sidebar_left == "false")) { ?>

div#left {float: right; padding: 10px 0 10px 20px;} 

div#right {float: left; padding: 10px 20px 10px 0;}   

<?php } ?>

<?php /* Custom bg colour */

if ($jq_bg_color) { ?>    

body {background: <?php echo $jq_bg_color; ?>;}               

<?php } ?>

<?php /* Custom page colour */

if ($jq_page_color) { ?>    

div#content {background: <?php echo $jq_page_color; ?>;}  

div#appendix {background: <?php echo $jq_page_color; ?>;}     

<?php } ?>

</style>

<!--[if IE]>

<style type="text/css">

div.date {float:left; position:static; margin:10px 10px 0 0; padding:0;}

div.preview {margin:15px 0;}

.comment-link {background:none;}

#search-submit {margin: 10px 0 0 0; height: 28px;}

</style>

<![endif]-->

<!-- wp_head -->

<?php wp_head(); ?>

</head>

<body>

<div id="outline">

<div id="blog-line">

<!-- blog title and tag line -->

<h1><img src="<?php bloginfo('template_directory'); ?>/img/SBCA-logo-white.gif" width="33" height="40" />
<a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>

</div>

<!-- page navigation -->

<div id="nav" class="clearfix">

<ul class="sf-menu">

<?php /* Navigation */

if ($jq_nav_display == "false") {

wp_list_pages('title_li=&depth=4&sort_column=menu_order'); 

} else { 

wp_list_categories('depth=2&title_li=0&orderby=name&show_count=0');

} ?>			

</ul>
</div>
<!-- ending header template -->

