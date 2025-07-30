<?php
add_action( 'wp_enqueue_scripts', 'reset_style' );
function reset_style() {
    wp_enqueue_style( 'reset-style', get_stylesheet_uri() );
}

add_action( 'after_setup_theme', 'theme_setup' );
function theme_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'menus' );
}

function blankslate_schema_type() {
    $schema = 'https://schema.org/';
    if ( is_single() ) {
        $type = "Article";
    } elseif ( is_author() ) {
        $type = 'ProfilePage';
    } elseif ( is_search() ) {
        $type = 'SearchResultsPage';
    } else {
        $type = 'WebPage';
    }
    echo 'itemscope itemtype="' . esc_url( $schema ) . esc_attr( $type ) . '"';
}

add_filter( 'nav_menu_link_attributes', 'blankslate_schema_url', 10 );
function blankslate_schema_url( $atts ) {
    $atts['itemprop'] = 'url';
    return $atts;
}
if ( !function_exists( 'blankslate_wp_body_open' ) ) {
    function blankslate_wp_body_open() {
        do_action( 'wp_body_open' );
    }
}

function theme_scripts() {
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/script.js'); 
}
add_action('wp_enqueue_scripts', 'theme_scripts');

function theme_enqueue_styles() {
    wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/style-min.css' );
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function enqueue_leaflet_assets() {
    wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css');
    wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_leaflet_assets');

add_action('init', function() {
  if (isset($_GET['force404'])) {
    status_header(404);
    include get_template_directory() . '/404.php';
    exit;
  }
});