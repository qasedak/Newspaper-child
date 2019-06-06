<?php
/*  ----------------------------------------------------------------------------
    Newspaper V9.7+ Child theme - Please do not use this child theme with older versions of Newspaper Theme

    What can be overwritten via the child theme:
     - everything from /parts folder
     - all the loops (loop.php loop-single-1.php) etc
	 - please read the child theme documentation: http://forum.tagdiv.com/the-child-theme-support-tutorial/


     - the rest of the theme has to be modified via the theme api:
       http://forum.tagdiv.com/the-theme-api/

 */




/*  ----------------------------------------------------------------------------
    add the parent style + style.css from this folder
 */
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles', 11);
function theme_enqueue_styles() {
    wp_enqueue_style('td-theme', get_template_directory_uri() . '/style.css', '', TD_THEME_VERSION, 'all' );
    wp_enqueue_style('td-theme-child', get_stylesheet_directory_uri() . '/style.css', array('td-theme'), TD_THEME_VERSION . 'c', 'all' );
    wp_enqueue_style('td-theme-child', get_stylesheet_directory_uri() . '/rtl.css', array('td-theme'), TD_THEME_VERSION . 'c', 'all' );
}
function TD_child_theme_locale() {
  load_child_theme_textdomain( 'newspaper', get_stylesheet_directory() . '/translation' );
}
add_action( 'after_setup_theme', 'TD_child_theme_locale' );

if ( is_user_logged_in() && current_user_can( 'administrator' ) ) {
  // show admin bar
  add_filter('show_admin_bar', '__return_true');
}else{
  // hide admin bar
  add_filter('show_admin_bar', '__return_false');
}