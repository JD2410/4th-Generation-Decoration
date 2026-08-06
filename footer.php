        </main>
    </div>
    <footer id="footer" role="contentinfo">
        <div class="footer--wrapper">
            <div class="footer--info">
                <p>As a small independent family of decorators we pass cost savings onto our customers by offering competitive rates without compromising quality.  No job too small - no job too big.  We offer a range of services from repainting the smallest room in the house to redecorating office complexes.  Interiors and Exteriors are our domain. Interested? </p>
            </div>
            <div class="footer--explorer">
                <h4>Explore</h4>
                <?php wp_nav_menu( array( 'menu' => 'Footer') ); ?>
            </div>
            <div class="footer--contact">
                <?php 
                    $email_address = get_option('ci_email_address', '');
                    $phone = get_option('ci_phone', '');
                ?>
                <h4>Contact</h4>
                <ul>
                    <?php 
                        $getSocialContact = (array) get_option('fg_settings');
                        if(isset($getSocialContact['mobile']) && $getSocialContact['mobile'] != '') {
                            ?>
                            <li><a href="callto:<?php echo esc_attr($getSocialContact['mobile']); ?>" class="call"><?php echo esc_attr($getSocialContact['mobile']); ?></a></li>
                            <?php
                        }
                        if(isset($getSocialContact['email']) && $getSocialContact['email'] != '') {
                            ?>
                            <li><a href="mailto:<?php echo esc_attr($getSocialContact['email']); ?>" class="email"> <?php echo esc_attr($getSocialContact['email']); ?></a></li>
                            <?php
                        }
                        if(isset($getSocialContact['instagram']) && $getSocialContact['instagram'] != '') {
                            ?>
                            <li><a href="<?php echo esc_attr($getSocialContact['instagram']); ?>" target="_blank" class="instagram">Instagram</a></li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>

