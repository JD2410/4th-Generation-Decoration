<!DOCTYPE html>
<html <?php language_attributes(); ?> <?php blankslate_schema_type(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="wrapper" class="hfeed">
    <header id="header" class="animate-scroll" role="banner">
        <div class='quick-contact--container'>
            <div class="quick-contact--wrapper">
                <?php 
                    $getSocialContact = (array) get_option('fg_settings');
                    if(isset($getSocialContact['mobile']) && $getSocialContact['mobile'] != '') {
                        ?>
                        <a href="callto:<?php echo esc_attr($getSocialContact['mobile']); ?>" class="phone"><span><?php echo esc_attr($getSocialContact['mobile']); ?></span></a>
                        <?php
                    }
                    if(isset($getSocialContact['email']) && $getSocialContact['email'] != '') {
                        ?>
                        <a href="mailto:<?php echo esc_attr($getSocialContact['email']); ?>" class="email"><span><?php echo esc_attr($getSocialContact['email']); ?></span></a>
                        <?php
                    }
                    if(isset($getSocialContact['instagram']) && $getSocialContact['instagram'] != '') {
                        ?>
                        <a href="<?php echo esc_attr($getSocialContact['instagram']); ?>" target="_blank" class="instagram"><img src="<?php echo get_template_directory_uri() . '/assets/images/instagram.svg'; ?>" alt="4th Gen Decorating Instagram" width="20" height="20"></a>
                        <?php
                    }
                ?>
            </div>
        </div>
        <nav id="menu" role="navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
            <div class="menu--wrapper">
                <div class="branding-wrapper">
                    <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri() . '/assets/images/logo-default.webp'; ?>" width="106" height="40" alt="4th Gen Decorating: In the trade for 4 Generations"></a> <div id="mobile-menu"><span></span></div>
                </div>
                <?php wp_nav_menu( array( 'menu' => 'Main Menu', 'link_before' => '<span itemprop="name">', 'link_after' => '</span>' ) ); ?>
            </div>
        </nav>
    </header>
    <div id="container">
        <main id="content" role="main">