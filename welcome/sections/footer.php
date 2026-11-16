<?php
$hashone_pro_demos = array(
    array('Gym & Fitness', 'gym.jpg', 'https://demo.hashthemes.com/total-plus/gym/'),
    array('Medical Center', 'medical.jpg', 'https://demo.hashthemes.com/total-plus/medical/'),
    array('Law Firm', 'law-firm.jpg', 'https://demo.hashthemes.com/total-plus/law-firm/'),
    array('Wave', 'wave.jpg', 'https://demo.hashthemes.com/total-plus/wave/'),
    array('Cafe', 'cafe.jpg', 'https://demo.hashthemes.com/total-plus/cafe/'),
    array('Hotel Plus', 'hotel-plus.jpg', 'https://demo.hashthemes.com/total-plus/hotel/'),
    array('Total', 'total.jpg', 'https://demo.hashthemes.com/total-plus/total/'),
    array('Construction', 'construction.jpg', 'https://demo.hashthemes.com/total-plus/construction/'),
    array('Main Demo', 'main-demo.jpg', 'https://demo.hashthemes.com/total-plus/main/'),
    array('Creative Agency', 'creative-agency.jpg', 'https://demo.hashthemes.com/total-plus/creative-agency'),
    array('One Page', 'one-page.jpg', 'https://demo.hashthemes.com/total-plus/one-page'),
);
?>
<div class="welcome-pro-demos">
    <div class="welcome-pro-demos-head">
        <span class="welcome-kicker"><?php esc_html_e('Premium Demos', 'hashone'); ?></span>
        <h3><?php esc_html_e('Launch Faster with a Total Plus Demo', 'hashone'); ?></h3>
        <p><?php esc_html_e('Total Plus is the premium theme from the makers of HashOne. It comes with 11 professionally designed demos, built with the Customizer or with Elementor. Import one in a single click and have a complete website ready in minutes.', 'hashone'); ?></p>
    </div>

    <div class="welcome-demo-grid">
        <?php foreach ($hashone_pro_demos as $hashone_demo) { ?>
            <a class="welcome-demo" href="<?php echo esc_url($hashone_demo[2]); ?>" target="_blank">
                <span class="welcome-demo-shot">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/welcome/css/' . $hashone_demo[1]); ?>" alt="" loading="lazy">
                </span>
                <span class="welcome-demo-name">
                    <?php echo esc_html($hashone_demo[0]); ?>
                    <span class="welcome-demo-preview"><?php echo esc_html__('Preview', 'hashone'); ?> <span aria-hidden="true">&rarr;</span></span>
                </span>
            </a>
        <?php } ?>
        <a class="welcome-demo welcome-demo-more" href="https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=hashone-welcome-all-demos&utm_campaign=hashone-demo" target="_blank">
            <span class="dashicons dashicons-screenoptions" aria-hidden="true"></span>
            <strong><?php esc_html_e('See All Demos', 'hashone'); ?></strong>
            <span><?php esc_html_e('Browse every Total Plus demo, with a live preview of each one.', 'hashone'); ?></span>
            <span class="welcome-demo-preview"><?php esc_html_e('View on HashThemes', 'hashone'); ?> <span aria-hidden="true">&rarr;</span></span>
        </a>
    </div>
</div>

<div class="welcome-upgrade-box">
    <div class="welcome-guarantee" aria-hidden="true">
        <strong>7</strong>
        <span><?php esc_html_e('Day money back', 'hashone'); ?></span>
    </div>
    <div class="upgrade-box-text">
        <h3><?php echo esc_html__('Upgrade to Total Plus, Risk Free', 'hashone'); ?></h3>
        <p><?php echo esc_html__('Total Plus adds an AI Site Builder and Write with AI, 21 home page sections that you can add more than once, 27 Elementor widgets, 8 Gutenberg blocks, 6 header layouts, a mega menu and 11 one-click demos.', 'hashone'); ?></p>
        <p><?php echo esc_html__('Try it with peace of mind: if it is not right for you, ask within 7 days and we will refund your payment.', 'hashone'); ?></p>
    </div>
    <a class="welcome-btn welcome-btn-pro" href="https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=hashone-footer&utm_campaign=hashone-upgrade" target="_blank"><?php esc_html_e('Upgrade Now', 'hashone'); ?><span class="dashicons dashicons-arrow-right-alt" aria-hidden="true"></span></a>
</div>
