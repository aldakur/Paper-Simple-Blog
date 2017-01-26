<?php // Para que wordpress registre un nuevo menu, cuyo nombre sera Menu Superior

/*
register_nav_menus( array(
'menu' => 'Menu head'
));*/

/* Theme setup */
add_action( 'after_setup_theme', 'wpt_setup' );
    if ( ! function_exists( 'wpt_setup' ) ):
        function wpt_setup() {  
            register_nav_menu( 'primary', __( 'Primary navigation', 'wptuts' ) );
        } endif;

// Para agregar nuestros Thumbails
add_theme_support( 'post-thumbnails' );
//add_image_size( 'list_articles_thumbs',329, 164.5, true );
//add_image_size( 'list_articles_thumbs',150, 150, true );
/* to remove wp-post-image class
remove_action( 'begin_fetch_post_thumbnail_html', '_wp_post_thumbnail_class_filter_add' );*/

// Para agregar Widgets. En mi Sidebar
register_sidebar(array (
'name'=>'Sidebar',
        'before_widget' => '<div class="mywidget">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
        'class' => 'list-group'
     ));

/* MY PLUGINS */

// Bootstrap-widgets
require_once('plugins/link-manager/link-manager.php');

// Register custom navigation walker
require_once('plugins/wp_bootstrap_navwalker.php');

// Bootstrap-widgets
require_once('plugins/bootstrap-widgets.php');

/* MY WIDGETS */

// Register my plugins for archive widget
require_once('widgets/paper-simple-blog-archive-widget.php');


?>