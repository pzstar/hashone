<?php
/*
 *  Seasonal sale banner.
 *
 *  This used to be a commented-out block that had to be uncommented each
 *  November and remembered again in January. It now opens and closes on the
 *  same campaign window as the customizer banner.
 */
$hashone_header_campaign = hashone_get_active_campaign();

if ($hashone_header_campaign && !empty($hashone_header_campaign['image'])) {
    ?>
    <a class="welcome-sale-banner" target="_blank" href="<?php echo esc_url('https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=hashone-welcome-banner&utm_campaign=hashone-upgrade&utm_content=welcome-banner-' . $hashone_header_campaign['id']); ?>">
        <img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/' . $hashone_header_campaign['image']); ?>" alt="<?php echo esc_attr($hashone_header_campaign['title']); ?>">
    </a>
    <?php
}
?>
<div class="welcome-hero">
    <div class="welcome-hero-main">
        <div class="welcome-brand">
            <svg class="welcome-brand-mark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" aria-hidden="true"><path d="M7 0h18a7 7 0 0 1 7 7v18a7 7 0 0 1-7 7H7a7 7 0 0 1-7-7V7a7 7 0 0 1 7-7Zm1 8v16h3.2v-6.6h5.6V24H20V8h-3.2v6.4h-5.6V8Zm15.2 0-3.2 2v2.6l1.6-1V24H24V8Z"/></svg>
            <span class="welcome-version">
                <?php
                /* translators: %s: theme version */
                printf(esc_html__('Version %s', 'hashone'), esc_html($this->theme_version));
                ?>
            </span>
        </div>

        <h1>
            <?php
            /* translators: %s: theme name */
            printf(esc_html__('Welcome to %s', 'hashone'), esc_html($this->theme_name));
            ?>
        </h1>
        <p class="welcome-hero-text">
            <?php
            /* translators: %s: theme name */
            printf(esc_html__('Thank you for choosing %s. Everything you need to set up your website is on this page: a setup checklist, shortcuts into the Customizer, recommended plugins and help when you need it.', 'hashone'), esc_html($this->theme_name));
            ?>
        </p>

        <div class="welcome-hero-actions">
            <a class="welcome-btn welcome-btn-light" href="<?php echo esc_url(admin_url('customize.php')); ?>"><span class="dashicons dashicons-admin-customizer" aria-hidden="true"></span><?php esc_html_e('Customize Your Site', 'hashone'); ?></a>
            <a class="welcome-btn welcome-btn-ghost" href="https://demo.hashthemes.com/hashone/" target="_blank"><span class="dashicons dashicons-visibility" aria-hidden="true"></span><?php esc_html_e('Free Demo', 'hashone'); ?></a>
            <a class="welcome-btn welcome-btn-ghost" href="https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=hashone-welcome-premium-demos&utm_campaign=hashone-upgrade" target="_blank"><span class="dashicons dashicons-cart" aria-hidden="true"></span><?php esc_html_e('Premium Demos', 'hashone'); ?></a>
        </div>
    </div>

    <div class="welcome-pro-card">
        <div class="welcome-pro-top">
            <span class="welcome-pro-badge"><span class="dashicons dashicons-star-filled" aria-hidden="true"></span>Total Plus</span>
            <p class="welcome-pro-price"><strong>$65</strong> <span><?php esc_html_e('one-time', 'hashone'); ?></span></p>
        </div>

        <ul class="welcome-pro-points">
            <li><span class="dashicons dashicons-yes" aria-hidden="true"></span><?php esc_html_e('One time payment, no renewals', 'hashone'); ?></li>
            <li><span class="dashicons dashicons-yes" aria-hidden="true"></span><?php esc_html_e('Use on unlimited websites', 'hashone'); ?></li>
            <li><span class="dashicons dashicons-yes" aria-hidden="true"></span><?php esc_html_e('Lifetime updates included', 'hashone'); ?></li>
        </ul>

        <a href="<?php echo esc_url('https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=hashone-welcome-banner&utm_campaign=hashone-upgrade'); ?>" target="_blank" class="welcome-btn welcome-btn-pro"><?php esc_html_e('Upgrade to Pro', 'hashone'); ?><span class="dashicons dashicons-arrow-right-alt" aria-hidden="true"></span></a>
    </div>
</div>

<nav class="welcome-nav" aria-label="<?php esc_attr_e('Settings sections', 'hashone'); ?>">
    <?php foreach ($tabs as $section_id => $tab) { ?>
        <a href="<?php echo esc_url(admin_url('admin.php?page=hashone-welcome&section=' . $section_id)); ?>" class="welcome-nav-tab<?php echo $section_id === $section ? ' is-active' : ''; ?>"<?php echo $section_id === $section ? ' aria-current="page"' : ''; ?>>
            <span class="dashicons <?php echo esc_attr($tab[1]); ?>" aria-hidden="true"></span><?php echo esc_html($tab[0]); ?>
        </a>
    <?php } ?>
</nav>
