<section class="contact">
    <a id="contact"></a>
    <div class="contact-wrapper">
        <div class="contact--description">
            <h2>Contact Us</h2>
            <h3>How Can We <span>Help</span></h3>
            <p>The more details, the better! Let us know about the size of the space, the type of work needed, colours or finishes you have in mind, and any specific requests—this helps us provide the most accurate quote. Whether it's a single room, a full home refresh, or a large commercial project, we're happy to help. Prefer email or a quick call? It's completely up to you—just drop us a line in the way that works best for you, and we'll get back to you as soon as possible!</p>
            <div class="quick-contact--wrapper">
                <?php 
                    $email_address = get_option('ci_email_address', '');
                    $phone = get_option('ci_phone', '');
                ?>
                <a href="callto:<?php echo $phone; ?>" class="phone-number"><?php echo $phone; ?></a>
                <a href="mailto:<?php echo $email_address; ?>" class="email-address"><?php echo $email_address; ?></a>
            </div>
        </div>
        <div class="contact--form">
            <?php echo do_shortcode('[contact-form-7 id="540f501" title="Contact Form"]'); ?>
        </div>
    </div>
</section>