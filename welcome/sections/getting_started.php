<?php
$hashone_steps = $this->setup_steps();
$hashone_done = count(wp_list_filter($hashone_steps, array('done' => true)));
$hashone_percent = round(100 * $hashone_done / count($hashone_steps));
?>
<div class="welcome-grid welcome-grid-start">
    <div class="welcome-card welcome-setup-checklist">
        <div class="welcome-setup-head">
            <div class="welcome-ring" style="--welcome-progress:<?php echo absint($hashone_percent); ?>" role="progressbar" aria-valuemin="0" aria-valuemax="<?php echo count($hashone_steps); ?>" aria-valuenow="<?php echo absint($hashone_done); ?>" aria-label="<?php esc_attr_e('Setup progress', 'hashone'); ?>">
                <span><?php echo absint($hashone_percent); ?>%</span>
            </div>
            <div>
                <h3><?php esc_html_e('Set Up Your Website', 'hashone'); ?></h3>
                <p class="welcome-setup-count"><?php /* translators: 1: steps done, 2: all steps */ printf(esc_html__('%1$d of %2$d done', 'hashone'), $hashone_done, count($hashone_steps)); ?></p>
            </div>
        </div>

        <ol class="welcome-setup-steps">
            <?php foreach ($hashone_steps as $hashone_step) { ?>
                <li class="<?php echo $hashone_step['done'] ? 'is-done' : 'is-todo'; ?>">
                    <span class="welcome-setup-mark dashicons <?php echo $hashone_step['done'] ? 'dashicons-yes' : ''; ?>" aria-hidden="true"></span>
                    <div class="welcome-setup-text">
                        <strong><?php echo esc_html($hashone_step['title']); ?></strong>
                        <span class="screen-reader-text"><?php echo $hashone_step['done'] ? esc_html__('(done)', 'hashone') : esc_html__('(to do)', 'hashone'); ?></span>
                        <p><?php echo esc_html($hashone_step['text']); ?></p>
                    </div>
                    <?php
                    if ($hashone_step['url']) {
                        echo '<a class="button' . ($hashone_step['done'] ? '' : ' button-primary') . '" href="' . esc_url($hashone_step['url']) . '">' . ($hashone_step['done'] ? esc_html__('Change', 'hashone') : esc_html__('Set up', 'hashone')) . '</a>';
                    } elseif (!$hashone_step['done']) {
                        echo $this->generate_hdi_install_button();
                    }
                    ?>
                </li>
            <?php } ?>
        </ol>
    </div>

    <div class="welcome-card welcome-demo-import">
        <div class="welcome-demo-thumb">
            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php /* translators: %s: theme name */ printf(esc_attr__('%s Demo', 'hashone'), $this->theme_name); ?>">
            <a href="https://demo.hashthemes.com/hashone/" target="_blank" class="welcome-demo-view"><span class="dashicons dashicons-external" aria-hidden="true"></span><?php esc_html_e('View Demo', 'hashone'); ?></a>
        </div>
        <div class="welcome-card-body">
            <h3><?php esc_html_e('Start From a Demo', 'hashone'); ?></h3>
            <p><?php esc_html_e('Import a complete demo website, with its content and settings, in a single click, then replace the content with your own.', 'hashone'); ?></p>
            <?php echo $this->generate_hdi_install_button(); ?>
            <p class="welcome-small"><a href="https://hashthemes.com/documentation/hashone-documentation/#Import-Demo-Content" target="_blank"><?php esc_html_e('How the demo importer works', 'hashone'); ?></a></p>
        </div>
    </div>
</div>

<div class="welcome-block">
    <div class="welcome-block-head">
        <h3><?php esc_html_e('Customize Your Site', 'hashone'); ?></h3>
        <a href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php esc_html_e('Open the Customizer', 'hashone'); ?> <span aria-hidden="true">&rarr;</span></a>
    </div>
    <div class="welcome-quick-links">
        <?php foreach ($this->quick_links() as $hashone_link) { ?>
            <a class="welcome-quick-link" href="<?php echo esc_url($hashone_link['url']); ?>">
                <span class="dashicons <?php echo esc_attr($hashone_link['icon']); ?>" aria-hidden="true"></span>
                <?php echo esc_html($hashone_link['label']); ?>
            </a>
        <?php } ?>
    </div>
</div>

<div class="welcome-block">
    <div class="welcome-block-head">
        <h3><?php esc_html_e('Build Your Home Page', 'hashone'); ?></h3>
        <a href="https://hashthemes.com/documentation/hashone-documentation/#Home-Page-Setup" target="_blank"><?php esc_html_e('Step-by-step guide', 'hashone'); ?> <span aria-hidden="true">&rarr;</span></a>
    </div>
    <p class="welcome-block-intro"><?php echo esc_html__('Build the home page from the theme\'s ready-made sections in the Customizer, or design it freely with Elementor.', 'hashone'); ?></p>

    <div class="welcome-grid welcome-grid-2">
        <div class="welcome-card welcome-method">
            <span class="welcome-method-icon dashicons dashicons-admin-customizer" aria-hidden="true"></span>
            <h4><?php esc_html_e('With the Customizer', 'hashone'); ?></h4>
            <ol>
                <li><?php echo sprintf(esc_html__('Go to Appearance > Customize > %s.', 'hashone'), '<a href="' . esc_url(admin_url('customize.php?autofocus[panel]=hashone_home_panel')) . '">' . esc_html__('Home Page Sections', 'hashone') . '</a>'); ?></li>
                <li><?php echo esc_html__('Fill in the sections you want to show, and switch off the ones you do not need.', 'hashone'); ?></li>
                <li><?php echo esc_html__('The sections show on the front page while it displays your latest posts. To show them on a page of your own, give that page the "Home Page" template.', 'hashone'); ?></li>
            </ol>
        </div>

        <div class="welcome-card welcome-method">
            <span class="welcome-method-icon dashicons dashicons-layout" aria-hidden="true"></span>
            <h4><?php esc_html_e('With Elementor', 'hashone'); ?></h4>
            <ol>
                <li><?php printf(esc_html__('Install and activate Elementor and Hash Elements from the %s.', 'hashone'), '<a href="' . esc_url(admin_url('admin.php?page=hashone-welcome&section=recommended_plugins')) . '">' . esc_html__('Recommended Plugins tab', 'hashone') . '</a>'); ?></li>
                <li><?php echo esc_html__('Create a new page, edit it with Elementor and drag in the widgets to design your home page.', 'hashone'); ?></li>
                <li><?php echo sprintf(esc_html__('In Appearance > Customize > %s, choose "A static page" and select your new page as the Homepage.', 'hashone'), '<a href="' . esc_url(admin_url('customize.php?autofocus[section]=static_front_page')) . '">' . esc_html__('Static Front Page', 'hashone') . '</a>'); ?></li>
            </ol>
        </div>
    </div>
</div>
