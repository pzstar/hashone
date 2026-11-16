<div class="free-vs-pro-info-wrap">
    <div class="free-vs-pro-info">
        <span class="dashicons dashicons-money-alt" aria-hidden="true"></span>
        <h4><?php echo esc_html_x('ONE TIME PAYMENT', 'free vs pro content', 'hashone'); ?></h4>
        <p><?php echo esc_html_x('No renewal needed', 'free vs pro content', 'hashone'); ?></p>
    </div>

    <div class="free-vs-pro-info">
        <span class="dashicons dashicons-admin-site-alt3" aria-hidden="true"></span>
        <h4><?php echo esc_html_x('UNLIMITED DOMAIN LICENSE', 'free vs pro content', 'hashone'); ?></h4>
        <p><?php echo esc_html_x('Use it on as many websites as you need', 'free vs pro content', 'hashone'); ?></p>
    </div>

    <div class="free-vs-pro-info">
        <span class="dashicons dashicons-update" aria-hidden="true"></span>
        <h4><?php echo esc_html_x('FREE LIFETIME UPDATES', 'free vs pro content', 'hashone'); ?></h4>
        <p><?php echo esc_html_x('Every new feature at no extra cost', 'free vs pro content', 'hashone'); ?></p>
    </div>
</div>

<?php
/*
 *  Feature rows carry the .feature-row class and are numbered by a CSS counter
 *  rather than by a number typed into each label. The numbers used to be part
 *  of the translatable strings, which meant inserting a feature renumbered -
 *  and so invalidated the translation of - every row below it.
 */
?>
<table class="comparison-table">
    <tr>
        <td>
            <span><?php echo esc_html_x('Upgrade to Pro', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Everything below, on as many sites as you like, for a single payment. No renewals, and updates stay free for life.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td colspan="2">
            <a target="_blank" class="buy-pro-btn" href="https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=hashone-freevspro-top&utm_campaign=hashone-upgrade"><?php echo esc_html_x('Buy Now for $65', 'free vs pro content', 'hashone'); ?></a>
        </td>
    </tr>
    <tr>
        <th><?php echo esc_html_x('Features', 'free vs pro content', 'hashone'); ?></th>
        <th><?php echo esc_html_x('Free', 'free vs pro content', 'hashone'); ?></th>
        <th><?php echo esc_html_x('Pro', 'free vs pro content', 'hashone'); ?></th>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('AI Site Builder', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#AI-Site-Builder" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Describe your business in a sentence or two, and the AI plans your pages, writes every section and sets your brand color, fonts and header. It builds with the home page sections or with Elementor and the Total Plus widgets. Everything stays in a draft until you publish it, and it never invents prices, reviews or contact details.', 'free vs pro content', 'hashone'); ?></p>
            <p><?php echo esc_html_x('The AI features need WordPress 7.0 or later and an AI provider connected in Settings > Connectors.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Write with AI', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#Write-with-AI-in-the-Customizer" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('A Write with AI button drafts the titles, text and items of the home page sections in the Customizer, and of the Services, FAQ, Timeline and Pricing blocks. You review and edit everything before it is saved.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('AI Agents', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#AI-Agents" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('AI agents connected to your site can read and edit the home page sections, switch them on or off, and change their order. Every change goes into a Customizer draft, so nothing goes live until you approve it.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('One-Click Demo Import', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Import a complete demo website, with its content and settings, in a single click.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><?php echo esc_html_x('1 Demo', 'free vs pro content', 'hashone'); ?></td>
        <td><?php echo esc_html_x('11 Demos', 'free vs pro content', 'hashone'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Maintenance Mode', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/articles/setting-up-maintenance-mode-page/" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Show a maintenance or coming soon screen with a countdown timer while you work on the site, with no extra plugin needed.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Elementor Compatible', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Both versions work with Elementor. Total Plus goes further, with its own widgets, section extenders and templates, and custom home page sections that you design in Elementor.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'hashone'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'hashone'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Elementor Widgets', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#I.ElementorModule" target="_blank"><?php echo esc_html_x('View Demo', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Total Plus adds its own Elementor widgets, including sliders, featured and highlight blocks, services, portfolio, team, testimonials, counters, pricing, tabs, news, logo carousel, progress bar, animated text, animation layers, video, video popup, FAQ and timeline. Any widget you do not need can be switched off in Theme Options.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><?php echo esc_html_x('27 Widgets', 'free vs pro content', 'hashone'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Elementor Section Extenders', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#III.ElementorExtender" target="_blank"><?php echo esc_html_x('View Demo', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Add interactive effects to Elementor sections with 9 extenders: Parallax Background, Parallax Animation, Parallax Effect, Colors Animation, Water Ripples, Particles Background, Background Effect, Float Effect and Transform.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Elementor Sticky Column and Sticky Container', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Make any Elementor column or container stay in view as the visitor scrolls, with control over the offset and the screen sizes it applies to.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Elementor Template and Section Importer', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/articles/import-elementor-template/" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Import individual Elementor templates and sections with one click, without importing a whole demo.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Gutenberg Blocks', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Services, team, testimonials, counters, pricing table, FAQ, timeline and portfolio blocks for the block editor, each with its own settings in the block sidebar.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><?php echo esc_html_x('8 Blocks', 'free vs pro content', 'hashone'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Header Layouts and Settings', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/wordpress-theme/total/#totalplus-headers" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Choose from 6 header layouts, and set the header background, text color, height and more.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Menu Search, Cart and Button', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Total Plus adds a search icon, a mini cart, a call-to-action button and social icons next to the menu, with several button styles.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Transparent Header', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('HashOne shows the header over the slider on the home page. Total Plus can place it over the slider or page banner on any page, with its own menu color, and turn it on or off for each page.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><?php echo esc_html_x('Home Page Only', 'free vs pro content', 'hashone'); ?></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Off-Canvas Panel', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('An icon in the header opens a panel that slides in from the left or right, filled with the widgets of your choice.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Mega Menu', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/articles/create-mega-menu/" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Build large, multi-column menus with the built-in mega menu, with no extra plugin needed.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Page Banner (Title Bar) Settings', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Choose from 3 page banner styles, and set the banner background, height, alignment, breadcrumbs and typography for the whole site.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Typography', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#TypographySettings" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Set the typography of each part of the site separately, including the body text, H1 to H6, home page section titles, the site title and tagline, menu, page banner, sidebar and footer, with 1400+ Google Fonts and web-safe system fonts.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Color Options', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('The free version sets the header and site background. Total Plus lets you set colors throughout the site, including the theme color, header, posts and pages, footer and each home page section.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'hashone'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'hashone'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Section Reorder', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Arrange the home page sections in the order you want.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Unlimited Blocks for Each Section', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Add as many items as you need to every home page section, including slides, featured and highlight blocks, services, team members, testimonials, counters, pricing plans, tabs, news and logos, and choose how many columns each row shows.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Video, Motion and Gradient Backgrounds', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/articles/configure-advanced-settings/#totalplus-background-types" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Give any home page section a video, moving image or gradient background.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Sections', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#HomePageSection/Settings" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('HashOne has 11 home page sections. Total Plus has 21, including Highlight, Pricing, News and Updates, Tabs, FAQ, Video, Timeline and two custom sections that you design in Elementor.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td>11</td>
        <td>21</td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Add Any Section, More Than Once', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Build the home page from only the sections you need, each starting with sample content. Add any section more than once, like a second FAQ, Pricing or Team section, each with its own content, style and colors, and give each one its own name in the Customizer.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Block Styles', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Switch between several designs for each home page block:', 'free vs pro content', 'hashone'); ?></p>
            <ul>
                <li><a href="https://demo.hashthemes.com/total-plus/featured-block/" target="_blank"><?php echo esc_html_x('Featured Block - 8 styles', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/highlights-block/" target="_blank"><?php echo esc_html_x('Highlight Block - 4 styles', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/service-toggle-block/" target="_blank"><?php echo esc_html_x('Service Block - 4 styles', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/el-portfolio-masonary/" target="_blank"><?php echo esc_html_x('Portfolio - 6 styles', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/counter-block/" target="_blank"><?php echo esc_html_x('Counter - 4 styles', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/team-block/" target="_blank"><?php echo esc_html_x('Team - 6 styles', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/testimonial-block/" target="_blank"><?php echo esc_html_x('Testimonial - 4 styles', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/pricing-block/" target="_blank"><?php echo esc_html_x('Pricing - 4 styles', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/news-block/" target="_blank"><?php echo esc_html_x('News and Updates Block - 3 styles', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/tab-block/" target="_blank"><?php echo esc_html_x('Tabs - 5 styles', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/blog-section/" target="_blank"><?php echo esc_html_x('Blog Block - 4 styles', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/logo-carousel/" target="_blank"><?php echo esc_html_x('Client Logos - 4 styles', 'free vs pro content', 'hashone'); ?></a></li>
                <li><?php echo esc_html_x('Call to Action - 4 styles', 'free vs pro content', 'hashone'); ?></li>
                <li><?php echo esc_html_x('FAQ - 4 styles', 'free vs pro content', 'hashone'); ?></li>
                <li><?php echo esc_html_x('Video - 4 styles', 'free vs pro content', 'hashone'); ?></li>
                <li><?php echo esc_html_x('Timeline - 4 styles', 'free vs pro content', 'hashone'); ?></li>
            </ul>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Shape Dividers', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/articles/configure-advanced-settings/#totalplus-shape-divider" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Choose from 16 shape dividers for smooth transitions between sections.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Full Screen Home Page Sections', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/articles/configure-advanced-settings/#totalplus-full-window-height" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Make any home page section fill the height of the screen, however little content it has. Ideal for one-page websites.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Home Page Slider', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#HomeSlider" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Choose a simple slider, Revolution Slider or a single banner image, each with advanced settings.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'hashone'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'hashone'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Top Header Bar', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#TopHeader" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('A bar above the header for your contact details, social icons, a language switcher or a short message.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Social Links', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Enter your social profiles once in the Customizer. HashOne shows them in the contact section; Total Plus also uses them in the top header, the menu, the footer, the author box and the social icons widget.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><?php echo esc_html_x('Contact Section', 'free vs pro content', 'hashone'); ?></td>
        <td><?php echo esc_html_x('Everywhere', 'free vs pro content', 'hashone'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Add New Widget Area', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/articles/add-new-widget-area/" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Create as many extra widget areas as you need, for example to show a different sidebar on individual pages.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Custom Widgets', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/wordpress-theme/total/#totalplus-widgets" target="_blank"><?php echo esc_html_x('View Demo', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Ready-made widgets for sidebars and footers, which you can also use to build page layouts with SiteOrigin Page Builder.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td>25</td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Switch Off Unused Features', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Enable or disable each widget, Elementor widget, section extender and icon library in Theme Options, so your site loads only the assets it actually uses.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Preloader', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#PreloaderOption" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Show a loading animation until the page has fully loaded. Choose from 16 preloaders or upload your own image.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Admin and Login Logo', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Replace the WordPress logo on the login screen with your own, so the site carries your client\'s brand from the moment they sign in.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Sidebar Layout Options', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#SidebarSettings" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php printf(esc_html_x('Total Plus sets a site-wide sidebar layout, lets you change it on each post and page, offers 3 sidebar styles and lets you %1$schoose unique sidebar widgets for individual posts/pages%2$s.', 'free vs pro content', 'hashone'), '<a href="https://hashthemes.com/articles/change-the-sidebar-layout-and-choose-unique-widget/" target="_blank">', '</a>'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Advanced Blog Settings', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#Blog/SinglePostSettings" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('The free version shows either an excerpt or the full post on the blog page. Total Plus adds a show or hide setting for every element of the blog page.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'hashone'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'hashone'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Blog Layouts', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('The free version has one blog layout. Total Plus has 5 distinct layouts, including a card grid.', 'free vs pro content', 'hashone'); ?></p>
            <ul>
                <li><a href="https://demo.hashthemes.com/total-plus/total/blog/" target="_blank"><?php echo esc_html_x('Blog Layout 1 Demo', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/creative-agency/blog/" target="_blank"><?php echo esc_html_x('Blog Layout 2 Demo', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/construction/blog/" target="_blank"><?php echo esc_html_x('Blog Layout 3 Demo', 'free vs pro content', 'hashone'); ?></a></li>
                <li><a href="https://demo.hashthemes.com/total-plus/one-page/blog/" target="_blank"><?php echo esc_html_x('Blog Layout 4 Demo', 'free vs pro content', 'hashone'); ?></a></li>
            </ul>
        </td>
        <td>1</td>
        <td>5</td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Reorder and Show or Hide Single Post Elements', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#SinglePostSettings" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Put the parts of a single post, such as the post meta, featured image, content, categories, tags and share icons, in the order you want, and hide any you do not need.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Reading Progress Bar', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('A bar at the top of single posts that fills as the visitor reads, in the color and height you choose.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Author Box, Social Sharing and Related Posts', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Below each post: an author box with a short bio and social icons, share buttons for the major social networks with no extra plugin, and related posts from the same category.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Unique Page Banner for Each Post and Page', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/articles/changing-the-title-bar-background/" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Give any post or page its own page banner background.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Custom Background and Text Colors for Each Post and Page', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/articles/change-the-background-and-text-color/" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Set a custom background color, background image and text color for any post or page.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Hide Header and Footer for Each Post and Page', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/articles/hide-header-and-footer/" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Hide the header or footer on individual posts and pages, which is useful for landing pages and infographics.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Full Width Pages and Spacing Control', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Total Plus can make any page full width and remove the space below the header or above the footer, which is ideal for pages built with Elementor.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Advanced Footer Settings', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/documentation/total-plus-plugin-documentation/#FooterSection" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Choose from 5 footer styles, set the number of footer columns and drag to resize them.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Remove Footer Credit Text', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Remove or change the footer credit text, or replace it with a widget.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Google Map', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Show your location on an interactive map, alongside a contact form.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Icon Picker', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('The free version uses Font Awesome icons. Total Plus includes 4 icon packs with more than 11,000 icons, for the home page sections, widgets and Elementor widgets. Switch off any pack you do not use, so its font is never loaded.', 'free vs pro content', 'hashone'); ?></p>
            <ul>
                <li><?php echo esc_html_x('IcoFont', 'free vs pro content', 'hashone'); ?></li>
                <li><?php echo esc_html_x('Font Awesome', 'free vs pro content', 'hashone'); ?></li>
                <li><?php echo esc_html_x('Essential Icons', 'free vs pro content', 'hashone'); ?></li>
                <li><?php echo esc_html_x('Material Design Icons', 'free vs pro content', 'hashone'); ?></li>
            </ul>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'hashone'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'hashone'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('WooCommerce Compatible', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Both versions support WooCommerce. Total Plus adds a cart icon and mini cart in the header, product page settings, shop sidebar layouts and more.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><?php echo esc_html_x('Basic', 'free vs pro content', 'hashone'); ?></td>
        <td><?php echo esc_html_x('Advanced', 'free vs pro content', 'hashone'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('GDPR Compliance and Cookie Consent', 'free vs pro content', 'hashone'); ?> - <a href="https://hashthemes.com/articles/configuring-gdpr-settings/" target="_blank"><?php echo esc_html_x('Details', 'free vs pro content', 'hashone'); ?></a></span>
            <p><?php echo esc_html_x('Neither version collects any visitor data on its own. Total Plus adds a cookie consent bar with your own text, buttons and a link to your privacy policy.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Block Patterns', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Total Plus includes ready-made sections and full pages, including about, services, contact, FAQ, video and timeline, to insert from the block editor.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><?php echo esc_html_x('19 Patterns', 'free vs pro content', 'hashone'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('RTL Ready', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Total Plus fully supports right-to-left languages such as Arabic and Hebrew.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-no" role="img" aria-label="<?php esc_attr_e('No', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Multilingual Ready', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Total Plus is fully compatible with WPML and Polylang, so you can run your website in several languages.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><?php echo esc_html_x('Partially', 'free vs pro content', 'hashone'); ?></td>
        <td><?php echo esc_html_x('Fully', 'free vs pro content', 'hashone'); ?></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Translation Ready', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Both versions are ready to be translated into any language.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Search Engine Optimization', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Clean, well-structured code that follows SEO best practices.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Major Browser Compatible', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Works smoothly in all major browsers.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Responsive and Mobile Friendly', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Adapts to every screen size, from phones to large desktops.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr class="feature-row">
        <td>
            <span><?php echo esc_html_x('Support', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Total Plus customers get a reply from our support team in 10 hours or less.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
        <td><span class="welcome-mark is-yes" role="img" aria-label="<?php esc_attr_e('Yes', 'hashone'); ?>"></span></td>
    </tr>
    <tr>
        <td>
            <span><?php echo esc_html_x('Upgrade to Pro', 'free vs pro content', 'hashone'); ?></span>
            <p><?php echo esc_html_x('Everything above, on as many sites as you like, for a single payment. No renewals, and updates stay free for life.', 'free vs pro content', 'hashone'); ?></p>
        </td>
        <td colspan="2">
            <a target="_blank" class="buy-pro-btn" href="https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=hashone-freevspro-bottom&utm_campaign=hashone-upgrade"><?php echo esc_html_x('Buy Now for $65', 'free vs pro content', 'hashone'); ?></a>
        </td>
    </tr>
</table>
