<?php

// Widget Settings
if ( function_exists('register_sidebar') )
        {
        register_sidebar(array(
        'name' => 'sidebar_right',
        'before_widget' => '<div id="%1$s" class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
        ));

        register_sidebar(array(
        'name' => 'sidebar_bottom_left',
        'before_widget' => '<div id="%1$s" class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
        ));

        register_sidebar(array(
        'name' => 'sidebar_bottom_middle',
        'before_widget' => '<div id="%1$s" class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
        ));

        register_sidebar(array(
        'name' => 'sidebar_bottom_right',
        'before_widget' => '<div id="%1$s" class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
        ));
}

?>
<?php
$themename = "jQ";
$shortname = "jq";

$options = array (

	array(	"name" => "Here you find various options to change the appearance of the theme.",
			"type" => "title"),
			
	array(	"type" => "open"),

        array(	"name" => "Style Schemes",
			"desc" => "Choose a style scheme.",
			"id" => $shortname."_style_scheme",
			"std" => "Default",
			"type" => "select",
			"options" => array("Default", "Serif", "Dark", "Green")),
	
	array(	"name" => "Background colour",
			"desc" => "Enter a value for the background colour (without CSS mark-up, like <em>#ff0000</em>).",
			"id" => $shortname."_bg_color",
			"std" => "",
			"type" => "text"),

	array(	"name" => "Page colour",
			"desc" => "Enter a value for the page colour (without CSS mark-up, like <em>#ff0000</em>).",
			"id" => $shortname."_page_color",
			"std" => "",
			"type" => "text"),

	array(  "name" => "Display sidebar on the left?",
			"desc" => "Check this box if you would like to display the sidebar on the left of the page.",
            "id" => $shortname."_sidebar_left",
            "type" => "checkbox",
            "std" => "false"),

	array(  "name" => "Display categories in navigation?",
			"desc" => "Check this box if you would like to display categories instead of pages in the navigation.",
            "id" => $shortname."_nav_display",
            "type" => "checkbox",
            "std" => "false"),

	array(  "name" => "Show the excerpt on index pages?",
			"desc" => "Check this box if you would like to show the excerpt instead of the entire post on index pages.",
            "id" => $shortname."_post_display",
            "type" => "checkbox",
            "std" => "false"),

	array(  "name" => "Hide admin email in navigation?",
			"desc" => "Check this box if you would like to hide the admin email address.",
            "id" => $shortname."_mail_display",
            "type" => "checkbox",
            "std" => "false"),
	
	array(	"type" => "close")
	
);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p>'.$themename.' settings saved.</p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p>'.$themename.' settings reset.</p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>

<form method="post">



<?php foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		?>
        <table width="100%" border="0" style="color:#333;">		    
        
		<?php break;
		
		case "close":
		?>
		
        </table><br />
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0"><tr>
        	<td colspan="2"><h3 style="font:normal 14px Verdana,sans-serif;color:#21759b;"><?php echo $value['name']; ?></h3></td>
        </tr>

		<?php break;
		
		case 'select':
		?>
        <tr>
            <td width="25%" rowspan="2" valign="middle"><?php echo $value['name']; ?></td>
	            <td width="75%"><select style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
	                <?php foreach ($value['options'] as $option) { ?>
	                <option <?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
	                <?php } ?>
	            </select></td></tr>
                        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ccc;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
        
		<?php break;

		case 'text':
		?>
        
        <tr>
            <td width="25%" rowspan="2" valign="middle"><?php echo $value['name']; ?></td>
            <td width="75%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ccc;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="25%" rowspan="2" valign="middle"><?php echo $value['name']; ?></td>
                <td width="75%"><?php if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #ccc;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
        <?php 		break;	
 
} 
}
?>
<!--</table>-->
<p class="submit" style="margin:0;padding:0;">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}
add_action('admin_menu', 'mytheme_add_admin'); 

//Register custom menus

function register_my_menus() {
  register_nav_menus(
    array('guides-menu' => __( 'Guides Menu' ) )
  );
}

add_action( 'init', 'register_my_menus' );

?>
