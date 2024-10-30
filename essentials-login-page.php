<?php
/*
Plugin Name: Essentials Login Page
Plugin URI: http://www.pressessentials.com
Description: Removes default login styling and loads new stylesheet from the theme directory. This plugin does not have an administrative component.
Author: Patriek Jeuriens
Version: 1.0
Author URI: http://www.pressessentials.com
*/

// Hook in
add_filter("login_headerurl","custom_loginpage_logo_link");
add_filter("login_headertitle","custom_login_logo_link");
add_action("login_head","custom_login_head");

if (basename($_SERVER['PHP_SELF']) == 'wp-login.php') 
	add_action('style_loader_tag', 'remove_login_css'); 
	

/* Supporting functions */      
function remove_login_css($tag) { 
        return ''; 
} 
function custom_login_logo_link($url)
{
     return get_bloginfo('wpurl');
}
function custom_login_logo_title($message)
{
     return get_bloginfo('name');
}
function custom_login_head()
{
     /* Add a stylesheet to the login page; add your styling in here, for example to change the logo use something like:
     #login h1 a {
          background:url(images/logo.jpg) no-repeat top;
     }
     */
     $stylesheet_uri = get_bloginfo('template_url')."/login.css";
     echo '<link rel="stylesheet" href="'.$stylesheet_uri.'" type="text/css" media="screen" />';
}
?>
