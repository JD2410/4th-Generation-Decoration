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
    <header id="header" role="banner">
        <div class='quick-contact--container'>
            <div class="quick-contact--wrapper">
                <?php 
                    $email_address = get_option('ci_email_address', '');
                    $phone = get_option('ci_phone', '');
                ?>
                <a href="callto:<?php echo $phone; ?>" class="phone"><?php echo $phone; ?></a>
                <a href="mailto:<?php echo $email_address; ?>" class="email"><?php echo $email_address; ?></a>
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