<?php
$fields = get_fields('option');
?>

<footer>
    <div class="footer">
        <div class="footer-main">
            <div class="footer-logo">
                <?php echo get_custom_logo(); ?>
            </div>
            <div class="footer-menu">
                <?php wp_nav_menu(['theme_location' => 'init_menu']); ?>
            </div>
        </div>
        <div class="contacts container">
        <div class="address">
            <h2 class="address-title title"><?php echo $fields['address_title'] ?? ''; ?></h2>
            <div class="contact-info address-info">
                <img src="<?php echo $fields['address_icon'] ?? ''; ?>" alt="">
                <p class="address-description"><?php echo $fields['address_description'] ?? ''; ?></p>
            </div>
        </div>
            <div class="phone">
                <h2 class="phone-title title"><?php echo $fields['phone_title'] ?? ''; ?></h2>
                <div class="contact-info">
                    <img src="<?php echo $fields['phone_icon'] ?? ''; ?>" alt="">
                    <a class="contact-link" href="tel:<?php echo $fields['phone_number'] ?? ''; ?>"><?php echo $fields['phone_number'] ?? ''; ?></a>
                </div>
            </div>
            <div class="mail">
                <h2 class="mail-title title"><?php echo $fields['mail_title'] ?? ''; ?></h2>
                <div class="contact-info">
                    <img src="<?php echo $fields['mail_icon'] ?? ''; ?>" alt="">
                    <a class="contact-link" href="mailto:<?php echo $fields['mail_address'] ?? ''; ?>"><?php echo $fields['mail_address'] ?? ''; ?></a>
                </div>
            </div>
            <div class="social-block">
                <h2 class="social-title title"><?php echo $fields['social_title'] ?? ''; ?></h2>
                <div class="social-links">
                    <?php if (isset($fields['social_links'])) {
                        foreach ($fields['social_links'] as $field) {?>
                            <a class="social-link"
                               href="<?php echo $field['social_link']?? ''; ?>"><img src="<?php echo $field['social_icon'] ?? ''; ?>" alt="">
                            </a>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>

</footer>
<?php wp_footer(); ?>
</body>
</html>
