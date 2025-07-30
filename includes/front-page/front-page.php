<?php

$lead = get_field('lead_line');
$main = get_field('main_line');
$text = get_field('main_text');

$fea_residential = get_field('residential_services');
$fea_commercial = get_field('commercial_services');
$fea_faq = get_field('faq');

$about = get_field("about_us");

$commercial = get_field("commercial");

$residential = get_field("residential");

?>
<section id="hero">
    <div class="hero--image">
        <div class="hero--container">
            <div class="hero--wrapper">
                <img src="<?php echo get_template_directory_uri() . '/assets/images/logo-white.webp'; ?>" width="139" height="50" alt="4-Gen Decorating Logo">
                <?php if($lead): ?>
                    <sub><?php echo $lead; ?></sub>
                <?php endif; ?>
                <?php if($main): ?>
                    <h1><?php echo $main; ?></h1>
                <?php endif; ?>
                <?php if($text): ?>
                    <p><?php echo $text; ?></p>
                <?php endif; ?>
                <a href="#contact" class="primary-button button-anim">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

<section id="features">
    <div class="features--wrapper">
        <div class="card residential">
            <h3>Residential Services</h3>
            <?php if ($fea_residential) : ?>
            <p><?php echo $fea_residential; ?></p>
            <?php endif; ?>
        </div>
        <div class="card commercial">
            <h3>Commercial Services</h3>
            <?php if ($fea_commercial) : ?>
            <p><?php echo $fea_commercial; ?></p>
            <?php endif; ?>
        </div>
        <div class="card faq">
            <h3>FAQ</h3>
            <?php if ($fea_faq) : ?>
            <p><?php echo $fea_faq; ?></p>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="even about">
    <a id="about"></a>
    <div class="wrapper">
        <div class="images" id="profile-container">
            <img src="<?php echo get_template_directory_uri() . "/assets/images/front-page/team-profile/the-team.png" ?>" alt="4th Generation Decorating">
            <div id="profile-images">
                <div class="keith" data-conclass="keith-con"><span>Keith</span></div>
                <div class="sean" data-conclass="sean-con"><span>Sean</span></div>
                <div class="john" data-conclass="john-con"><span>John</span></div>
                <div class="jason" data-conclass="jason-con"><span>Jason</span></div>
                <div class="elliott" data-conclass="elliott-con"><span>Elliott</span></div>
                <div class="dave" data-conclass="dave-con"><span>Dave</span></div>
            </div>
        </div>
        <div class="text">
            <div class="text-lead">
                <ul class="section-chip">
                    <li>Four Generations of Craftsmanship</li>
                    <li>Quality You Can Count On</li>
                </ul>
                <div class="section-head">
                    <h2>About Us</h2>
                    <h3>Painting with <span>Family Values:</span> A Tradition of Craftsmanship</h3>
                </div>
            </div>
            <div class="text-content">
                <?php if($about) : 
                    echo $about;
                endif; 
                ?>
                <a href="#contact" class="primary-button">Get in Touch</a>
            </div>
        </div>
    </div>
</section>
<section class="commercial-home">
    <a id="commercial"></a>
    <div class="commercial--wrapper">
        <div class="commercial--text">
            <div class="commercial--lead-text">
                <ul class="section-chip">
                    <li>Office Renovations</li>
                    <li>Property Refurbishments</li>
                </ul>
                <div class="section-head">
                    <h2>Commerical</h2>
                    <h3>Expert Finishes for <span>Communal Areas, Offices, Schools, Hospitals and More...</span></h3>
                </div>
            </div>
            <div class="commercial--text-content">
                <?php if ($commercial) : 
                    echo $commercial; 
                    endif;
                ?>
                <a href="#contact" class="primary-button">Get in Touch</a>
            </div>
        </div>
        <div class="commercial--images">
            <img src="<?php echo get_template_directory_uri() . "/assets/images/front-page/commercial/commercial-office.webp" ?>" alt="Ofices">
        </div>
    </div>
</section>
<section class="even residential">
    <a id="residential" ></a>
    <div class="wrapper">
        <div class="images">
            <div>
                <img src="<?php echo get_template_directory_uri() . "/assets/images/front-page/domestic/front-room.webp" ?>" height="auto" width="100%" alt="Front Room - Painted">
                <img src="<?php echo get_template_directory_uri() . "/assets/images/front-page/domestic/bathroom.webp" ?>" height="auto" width="100%"  alt="Bathroom">
            </div>
            <div>
                <img src="<?php echo get_template_directory_uri() . "/assets/images/front-page/domestic/house.webp" ?>" height="auto" width="100%"  alt="Outside House painted White">
                <img src="<?php echo get_template_directory_uri() . "/assets/images/front-page/domestic/fireplace.webp" ?>" height="auto" width="100%"  alt="Front Room Fireplace - Painted">
            </div>
            <img src="<?php echo get_template_directory_uri() . "/assets/images/front-page/domestic/kitchen.webp" ?>" height="auto" width="100%" alt="Kitchen - Painted white">
        </div>
        <div class="text">
            <div class="lead-text">
                <ul class="section-chip">
                    <li>Home Renovation Projects</li>
                    <li>Fresh Coat for Doors</li>
                </ul>
                <div class="section-head">
                    <h2>Residential</h2>
                    <h3>Beautifully <span>Decorated Homes,</span> Inside & Out</h3>
                </div>
            </div>
            <div class="text-content">
                <?php if($residential):
                    echo $residential; 
                    endif;
                ?>  
                <a href="#contact" class="primary-button">Get in Touch</a>
            </div>
        </div>
    </div>
</section>
<section id="testimonials" class="animated">
    <div class="testimonials--wrapper">
        <h2>Brushstrokes of Praise</h2>
        <div id="testimonialsgroup" class="transition">
            <?php
            $query = new WP_Query( array( 'category_name' => 'testimonials', 'posts_per_page' => 100  ) );
            $testimonials = $query->posts;

            foreach ($testimonials as $testimonial) { ?>
                <div class="testimonial--card">
                    <h4><?php echo esc_html( get_the_title($testimonial) ); ?></h4>
                    <div class="testimonial--details">
                        <?php echo get_post_field('post_content', $testimonial); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="faq">
    <a id="faq"></a>
    <div class="faq--wrapper">
        <h2>Frequently asked questions</h2>
        <div>
            <?php
            $query = new WP_Query( array( 'category_name' => 'faq', 'posts_per_page' => 100  ) );
            $faqs = $query->posts;

            foreach ($faqs as $faq) { ?>
                <div class="faq--qa">
                    <div class="faq--question"><?php echo esc_html( get_the_title($faq) ); ?></div>
                    <div class="faq--answer">
                        <div class="faq--answer-ele">
                            <?php echo get_post_field('post_content', $faq);  ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<div id="map"></div>
<div id="location-radius">
    <div class="map--wrapper">
        <div class="map--message">
            <h3>Quality Decorating, <span>Wide Coverage</span></h3>
            <p>Our team provides expert painting and decorating services across a wide area, ensuring homes and businesses receive a high-quality finish. The map shows our general coverage, but we're always happy to discuss projects slightly beyond. If you're unsure whether we serve your location, just get in touch—we'll do our best to accommodate you!</p>
        </div>
    </div>
</div>