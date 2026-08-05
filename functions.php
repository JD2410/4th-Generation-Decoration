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

function fc_plugin_menu() {
    add_options_page(
        'Settings Group',
        'Settings Group',
        'manage_options',
        'intro_wp_random_page',
        'fc_settings_page'
    );
}
add_action('admin_menu', 'fc_plugin_menu');

function fc_settings_page() {
    ?>
    <h1>Group Settings</h1>
    <form action="options.php" method="POST">
        <?php 
            settings_fields('fc_settings_group');
            do_settings_fields('intro_wp_random_page');
            submit_button();
        ?>
    </form>
    <?php
}

function fc_setup_settings() {
    register_setting('fc_setting_group', 'fc_settings');
    add_settings_section(
        'fc_settings_section',
        'Main Settings',
        'fc_generate_section',
        'intro_wp_random_page'
    );
    add_settings_field (
        'fc_color_field',
        'Favourite color',
        'fc_color_field',
        'intro_wp_random_page',
        'fc_settings_section'
    );
}

add_action('admin_init', 'fc_setup_settings');

function fc_generate_section() {
    ?>
    <p>Description Goes Here</p>
    <?php
}

function fc_color_field() {

$settings = (array) get_option('fc_settings');
$color = 'Blue';
if(isset($settings['color'])) {
    $color = esc_attr($settings['color']);
}
echo "<input type='text' name='fc_settings[color]' id='fc_settings[color]' value='$color'>";

}