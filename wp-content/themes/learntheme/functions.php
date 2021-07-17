<?php
add_action('wp_enqueue_scripts', 'style_theme');
function style_theme(){
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style( 'babushka', get_template_directory_uri() . '/assets/css/style.css', '', time() );
    wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css', '', time() );
    wp_enqueue_style( 'google_fonts', 'https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600' );

    wp_enqueue_script( 'anime_min', 'https://unpkg.com/animejs@3.0.1/lib/anime.min.js');
    wp_enqueue_script( 'scrollreveal', 'https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js');
}
add_action( 'wp_footer', 'footer_scripts');
function footer_scripts(){
    wp_enqueue_script( 'main_min',  get_template_directory_uri() . '/assets/js/main.min.js');
}
add_action( 'after_setup_theme', 'theme_register_nav_menu');
function theme_register_nav_menu() {
	register_nav_menu( 'top-menu', 'Верхнее меню' );
}
/**
 * Custom menu
 */

function custom_get_menu( $menu_id )
{
    $items = wp_get_nav_menu_items( $menu_id );
    return  $items ? custom_build_tree( $items, 0 ) : null;
}
function custom_build_tree( array &$elements, $parentId = 0 )
{
    $branch = array();
    foreach ( $elements as &$element )
    {
        if ( $element->menu_item_parent == $parentId )
        {
            $children = custom_build_tree( $elements, $element->ID );
            if ( $children )
                $element->wpse_children = $children;

            $branch[$element->ID] = $element;
            unset( $element );
        }
    }
    return $branch;
}