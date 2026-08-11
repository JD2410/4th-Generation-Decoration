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
    if ( is_front_page() ) {
        wp_enqueue_script('loading-home-script', get_template_directory_uri() . '/assets/home.js'); 
    } else {
        wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/script.js'); 

    }
}
add_action('wp_enqueue_scripts', 'theme_scripts');

function theme_enqueue_styles() {
    if ( is_front_page() ) {
        wp_enqueue_style('loading-home-theme', get_template_directory_uri() . '/assets/temp-loading.css' );
    } else {
        wp_enqueue_style('theme-style', get_template_directory_uri() . '/assets/style-min.css' );
    }
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


// Admin area Functionality
function admin_theme_enqueue_styles() {
    wp_enqueue_style('admin-theme-style', get_template_directory_uri() . '/assets/admin.css' );
}
add_action('admin_enqueue_scripts', 'admin_theme_enqueue_styles');


function fc_plugin_menu() {
    add_options_page(
        '4th Generation Website Setting',
        '4th Gen Settings',
        'manage_options',
        '4th_gen_settings',
        'fg_settings_page'
    );
}
add_action('admin_menu', 'fc_plugin_menu');

function fg_settings_page() {
    ?>
    <h1>4th Generation Decorating Settings</h1>
    <form action="options.php" method="POST">
        <?php 
            settings_fields('fg_settings_group');
            do_settings_sections('fourth_gen_page');
            submit_button();
        ?>
    </form>
    <?php
}

function fc_setup_settings() {
    add_settings_section(
        'fg_settings_section',
        'Settings',
        'fg_generate_section',
        'fourth_gen_page'
    );

    register_setting('fg_settings_group', 'fg_settings');
    add_settings_field (
        'fg_mobile',
        'Contact Number',
        'fg_settings_mobile',
        'fourth_gen_page',
        'fg_settings_section',
        array('class' => 'options mobile')
    );
    add_settings_field (
        'fg_email',
        'Email Address',
        'fg_settings_email',
        'fourth_gen_page',
        'fg_settings_section',
        array('class' => 'options email')
    );
    add_settings_field (
        'fg_instagram',
        'Instagram',
        'fg_settings_instagram',
        'fourth_gen_page',
        'fg_settings_section',
        array('class' => 'options instagram')
    );
}
add_action('admin_init', 'fc_setup_settings');

function fg_generate_section() {
    ?>
    <p>This section allows you to change the contact and instagram links located in the header and footer of the website</p>
    <?php
}

function fg_settings_mobile() {
    $settings = (array) get_option('fg_settings');
    $mobileNumber = '07836277294';
    if(isset($settings['mobile'])) {
        $mobileNumber = esc_attr($settings['mobile']);
    }
    echo "<input type='text' name='fg_settings[mobile]' id='fg_settings[mobile]' value='$mobileNumber' placeholder='$mobileNumber'>";
}

function fg_settings_instagram() {
    $settings = (array) get_option('fg_settings');
    $instagram = 'https://www.instagram.com/4thgendecorating';
    if(isset($settings['instagram'])) {
        $instagram = esc_attr($settings['instagram']);
    }
    echo "<input type='text' name='fg_settings[instagram]' id='fg_settings[instagram]' value='$instagram' placeholder='$instagram'>";
}

function fg_settings_email() {
    $settings = (array) get_option('fg_settings');
    $emailAddress= 'jkcanning@outlook.com';
    if(isset($settings['email'])) {
        $emailAddress = esc_attr($settings['email']);
    }
    echo "<input type='text' name='fg_settings[email]' id='fg_settings[email]' value='$emailAddress' placeholder='$emailAddress'>";
}