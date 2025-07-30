<?php /* Template Name: About Us */ ?>
<?php 

$main_text = get_field('about_hero_text');
$where = get_field('where_we_come_from');
$sean = get_field('sean_canning');
$jason = get_field('jason_canning');
$keith = get_field('keith_canning');
$harold = get_field('harold_canning');

?>
<?php get_header(); ?>
<section class="about-us-section hero-area">
    <span class="circles"></span>
    <div class="about-container">
        <h1>Our Roots</h1>
        <?php if($main_text): ?>
            <?php echo $main_text; ?>
        <?php endif; ?>
        <a href="#contact" class="primary-button button-anim about hero">Get in touch</a>
    </div>
</section>
<section class="where">
    <div class="gen-container">
        <div class="where-contents">
            <h2>Where we come from</h2>
            <?php if($where): ?>
                <?php echo $where; ?>
            <?php endif; ?>
        </div>
        <div class="where-images">
            <img src="<?php echo get_template_directory_uri() . "/assets/images/our-roots/annie-spratt-lnLKvhr3-hI-unsplash.png" ?>" alt="Chignford in the 1960's">
            <img src="<?php echo get_template_directory_uri() . "/assets/images/our-roots/krisztina-anna-berecz-43xBKW-xl3Y-unsplash.png" ?>" alt="Modern day Chingford">
        </div>
    </div>
</section>
<section class="generations">
    <div class="gen-container">
        <h1>4 Generations of <span>Decorators</span></h1>
        <article class="sean-canning profile">
            <div>
                <img src="<?php echo get_template_directory_uri() . "/assets/images/our-roots/sean-canning.png" ?>" alt="">
            </div>
            <div>
                <h2>Sean Canning (4th Generation)</h2>
                <?php if($sean): ?>
                    <?php echo $sean; ?>
                <?php endif; ?>
            </div>
        </article>
        <article class="jason-canning profile">
            <div>
                <h2>Jason Canning (3rd Generation)</h2>
                <?php if($jason): ?>
                    <?php echo $jason; ?>
                <?php endif; ?>
            </div>
            <div>
                <img src="<?php echo get_template_directory_uri() . "/assets/images/our-roots/jason-canning.png" ?>" alt="">
            </div>
        </article>
        <article class="keith-canning profile">
            <div>
                <img src="<?php echo get_template_directory_uri() . "/assets/images/our-roots/keith-canning.png" ?>" alt="">
            </div>
            <div>
                <h2>Keith Canning (2nd Generation)</h2>
                <?php if($keith): ?>
                    <?php echo $keith; ?>
                <?php endif; ?>
            </div>
        </article>
        <article class="harold-canning profile">
            <div>
                <h2>Harold Canning (1st Generation)</h2>
                <?php if($keith): ?>
                    <?php echo $keith; ?>
                <?php endif; ?>
            </div>
            <div>
                <img src="<?php echo get_template_directory_uri() . "/assets/images/our-roots/harold-canning.png" ?>" alt="">
            </div>
        </article>
    </div>
</section>
<?php include "includes/onpage-contact-form.php"; ?>
<?php get_footer(); ?>