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
                    <li><a href="callto:<?php echo $phone; ?>" class="call"><?php echo $phone; ?></a></li>
                    <li><a href="mailto:<?php echo $email_address; ?>" class="email"> <?php echo $email_address; ?></a></li>
                </ul>
            </div>
        </div>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>