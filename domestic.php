<?php /* Template Name: Domestic */ ?>
<?php 

$main_text = get_field('domestic_hero_text');
$service_text = get_field('domestic_services_text');

?>
<?php get_header(); ?>
<section class="domestic hero-area">
    <span class="circles"></span>
    <div id="domesticContainer">
        <h1>Domestic Services</h1>
        <?php if($main_text): ?>
            <?php echo $main_text; ?>
        <?php endif; ?>
        <div class="more-text" data-extend="domesticContainer">more...</div>
        <div class="actions">
            <a href="#contact" class="primary-button button-anim">Get in touch</a>
            <a href="#gallery" class="primary-button button-anim-inverse">Our Work</a>
        </div>
    </div>
</section>
<section class="domestic-services">
    <div class="services--container">
        <h2>Services</h2>
        <?php if($service_text): ?>
            <?php echo $service_text; ?>
        <?php endif; ?>
        <div class="listed-services">
            <div class="interior-services">
                <h3>Interior Decorating</h3>
                
                <ul>
                    <?php
                    $query = new WP_Query( array( 'category_name' => 'Domestic Interior Service', 'posts_per_page' => 100 ) );
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
                    $query = new WP_Query( array( 'category_name' => 'Domestic Exterior Service', 'posts_per_page' => 100 ) );
                    $interior = $query->posts;

                    foreach ($interior as $service) { ?>
                        <li><?php echo esc_html( get_the_title($service) ); ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        
    </div>
</section>
<section class="domestic-gallery">
    <div class="gallery--container">
        <a id="gallery"></a>
        <h2>Transforming Spaces, Creating Smiles!</h2>
        <p>We believe every space has the potential to shine, and our decorator's expertise makes it happen! Check out these incredible before-and-after transformations that showcase the care, creativity, and craftsmanship we bring to every project. Whether it's a cozy home or a bustling business, we're here to turn your vision into reality.</p>
        <?php echo do_shortcode('[foogallery id="100"]') ?>
    </div>
</section>
<?php include "includes/onpage-contact-form.php"; ?>
<?php get_footer(); ?>