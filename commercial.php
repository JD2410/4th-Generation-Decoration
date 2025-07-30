<?php /* Template Name: Commercial */ ?>
<?php 

$main_text = get_field('commercial_hero_text');
$service_text = get_field('commercial_services_text');

?>
<?php get_header(); ?>
<section class="commercial hero-area">
    <span class="circles"></span>
    <div id="commercialContainer">
        <h1>Commercial Services</h1>
        <?php if($main_text): ?>
            <?php echo $main_text; ?>
        <?php endif; ?>
        <div class="more-text" data-extend="commercialContainer">more...</div>
        <div class="actions">
            <a href="#contact" class="primary-button button-anim hero">Get in touch</a>
        </div>
    </div>
</section>
<section class="commercial-services">
    <div class="services--container">
        <div class="services--introduction">
            <h2>Services</h2>
            <?php if($service_text): ?>
                <?php echo $service_text; ?>
            <?php endif; ?>
        </div>
        <div class="listed-services">
            <div class="interior-services">
                <h3>Interior Decorating</h3>
                <ul>
                    <?php
                    $query = new WP_Query( array( 'category_name' => 'Commercial Interior Service', 'posts_per_page' => 100 ) );
                    $interior = $query->posts;

                    foreach ($interior as $service) { ?>
                        <li><?php echo esc_html( get_the_title($service) ); ?></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="exterior-services">
                <h3>Exterior Decorating</h3>
                <ul>
                    <?php
                    $query = new WP_Query( array( 'category_name' => 'Commercial Exterior Service', 'posts_per_page' => 100 ) );
                    $interior = $query->posts;

                    foreach ($interior as $service) { ?>
                        <li><?php echo esc_html( get_the_title($service) ); ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        
    </div>
</section>
<?php include "includes/onpage-contact-form.php"; ?>
<?php get_footer(); ?>