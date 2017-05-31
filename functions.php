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

// === MY PLUGINS === //

// Bootstrap-widgets
require_once('plugins/link-manager/link-manager.php');

// Register custom navigation walker
require_once('plugins/wp_bootstrap_navwalker.php');

// Bootstrap-widgets
require_once('plugins/bootstrap-widgets.php');

/* MY WIDGETS */

// Register my plugins for archive widget
require_once('widgets/paper-simple-blog-archive-widget.php');

// === //



/**
  * Update theme from the GitHub
  * https://linuxgnublog.org/es/como-actualizar-temas-custom-de-wordpress-desde-github/
  */
// set_site_transient('update_themes', null);
function geko_check_update( $transient ) {
  if ( empty( $transient->checked ) ) {
    return $transient;
  }
  $theme_data = wp_get_theme(wp_get_theme()->template);
  $theme_slug = $theme_data->get_template();
  //Delete '-master' from the end of slug
  $theme_uri_slug = preg_replace('/-master$/', '', $theme_slug);

  $remote_version = '0.0.0';
  $style_css = wp_remote_get("https://raw.githubusercontent.com/erm2587/".$theme_uri_slug."/master/style.css")['body'];
    if ( preg_match( '/^[ \t\/*#@]*' . preg_quote( 'Version', '/' ) . ':(.*)$/mi', $style_css, $match ) && $match[1] )
        $remote_version = _cleanup_header_comment( $match[1] );

        if (version_compare($theme_data->version, $remote_version, '<')) {
            $transient->response[$theme_slug] = array(
              'theme'       => $theme_slug,
              'new_version' => $remote_version,
              'url'         => 'https://github.com/aldakur/'.$theme_uri_slug,
              'package'     => 'https://github.com/aldakur/'.$theme_uri_slug.'/archive/master.zip',
            );
          }
          return $transient;
    }
add_filter( 'pre_set_site_transient_update_themes', 'geko_check_update' );


?>
