<?php
if (!class_exists('Hashone_Welcome')) :

    class Hashone_Welcome {
        public $theme_name = ''; // For storing Theme Name
        public $theme_version = ''; // For Storing Theme Current Version Information
        public $free_plugins = array(); // For Storing the list of the Recommended Free Plugins

        /**
         * Constructor for the Welcome Screen
         */

        public function __construct() {

            /** Useful Variables */
            $theme = wp_get_theme();
            $this->theme_name = $theme->Name;
            $this->theme_version = $theme->Version;

            /** List of Recommended Free Plugins */
            $this->free_plugins = array(
                'hashthemes-demo-importer' => array(
                    'name' => 'HashThemes Demo Importer',
                    'slug' => 'hashthemes-demo-importer',
                    'filename' => 'hashthemes-demo-importer',
                    'thumb_path' => 'https://ps.w.org/hashthemes-demo-importer/assets/icon-256x256.png'
                ),
                'elementor' => array(
                    'name' => 'Elementor Page Builder',
                    'slug' => 'elementor',
                    'filename' => 'elementor',
                    'thumb_path' => 'https://ps.w.org/elementor/assets/icon-256x256.gif'
                ),
                'easy-elementor-addons' => array(
                    'name' => 'Easy Elementor Addons',
                    'slug' => 'easy-elementor-addons',
                    'filename' => 'easy-elementor-addons',
                    'thumb_path' => 'https://ps.w.org/easy-elementor-addons/assets/icon-256x256.png'
                ),
                'hash-form' => array(
                    'name' => 'Hash Form Builder',
                    'slug' => 'hash-form',
                    'filename' => 'hash-form',
                    'thumb_path' => 'https://ps.w.org/hash-form/assets/icon-256x256.gif'
                ),
                'hash-elements' => array(
                    'name' => 'Hash Elements',
                    'slug' => 'hash-elements',
                    'filename' => 'hash-elements',
                    'thumb_path' => 'https://ps.w.org/hash-elements/assets/icon-256x256.png'
                ),
                'simple-floating-menu' => array(
                    'name' => 'Simple Floating Menu',
                    'slug' => 'simple-floating-menu',
                    'filename' => 'simple-floating-menu',
                    'thumb_path' => 'https://ps.w.org/simple-floating-menu/assets/icon-256x256.png'
                ),
                'mini-ajax-woo-cart' => array(
                    'name' => 'Ajax Cart for WooCommerce',
                    'slug' => 'mini-ajax-woo-cart',
                    'filename' => 'mini-ajax-woo-cart',
                    'thumb_path' => 'https://ps.w.org/mini-ajax-woo-cart/assets/icon-256x256.gif'
                ),
                'onyx-dark-mode-switcher' => array(
                    'name' => 'Onyx Dark Mode Switcher',
                    'slug' => 'onyx-dark-mode-switcher',
                    'filename' => 'onyx-dark-mode-switcher',
                    'thumb_path' => 'https://ps.w.org/onyx-dark-mode-switcher/assets/icon-256x256.png'
                )
            );

            /* Create a Welcome Page */
            add_action('admin_menu', array($this, 'welcome_register_menu'));

            /* Enqueue Styles & Scripts for Welcome Page */
            add_action('admin_enqueue_scripts', array($this, 'welcome_styles_and_scripts'));

            /* Adds Footer Rating Text */
            add_filter('admin_footer_text', array($this, 'admin_footer_text'));

            add_filter('wp_loaded', array($this, 'hide_admin_notice'), 10);

            /* Create a Welcome Page */
            add_action('wp_loaded', array($this, 'admin_notice'), 20);

            add_action('after_switch_theme', array($this, 'erase_hide_notice'));

            add_action('wp_ajax_hashone_activate_plugin', array($this, 'activate_plugin'));
        }

        /** Trigger Welcome Message Notification */
        public function admin_notice() {
            $hide_notice = get_option('hashone_hide_notice');
            if (!$hide_notice) {
                add_action('admin_notices', array($this, 'admin_notice_content'));
            }
        }

        /** Welcome Message Notification */
        public function admin_notice_content() {
            $screen = get_current_screen();

            if ('toplevel_page_hashone-welcome' === $screen->id || (isset($screen->parent_file) && 'plugins.php' === $screen->parent_file && 'update' === $screen->id) || 'theme-install' === $screen->id) {
                return;
            }

            $slug = $filename = 'hashthemes-demo-importer';
            ?>
            <div class="updated notice hashone-welcome-notice">
                <div class="hashone-welcome-notice-wrap">
                    <h2><?php esc_html_e('Congratulations!', 'hashone'); ?></h2>
                    <p><?php /* translators: %1$s: theme name */ printf(esc_html__('%1$s is installed and ready to use. Start from the ready-made demo, or set up the site yourself.', 'hashone'), $this->theme_name); ?></p>

                    <div class="hashone-welcome-info">
                        <div class="hashone-welcome-thumb">
                            <img src="<?php echo esc_url(get_stylesheet_directory_uri() . '/screenshot.png'); ?>" alt="<?php echo esc_attr__('Hashone Demo', 'hashone'); ?>">
                        </div>

                        <?php
                        if ('appearance_page_hdi-demo-importer' !== $screen->id) {
                            ?>
                            <div class="hashone-welcome-import">
                                <h3><?php esc_html_e('Import Demo', 'hashone'); ?></h3>
                                <p><?php esc_html_e('Install and activate the HashThemes Demo Importer plugin to import the demo in one click.', 'hashone'); ?></p>
                                <p><?php echo $this->generate_hdi_install_button(); ?></p>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="hashone-welcome-getting-started">
                            <h3><?php esc_html_e('Get Started', 'hashone'); ?></h3>
                            <p><?php /* translators: %s: theme name */ printf(esc_html__('A setup checklist, Customizer shortcuts and help for getting the most out of %s.', 'hashone'), $this->theme_name); ?></p>
                            <p><a href="<?php echo esc_url(admin_url('admin.php?page=hashone-welcome')); ?>" class="button button-primary"><?php esc_html_e('Go to Settings Page', 'hashone'); ?></a></p>
                        </div>
                    </div>

                    <a href="<?php echo wp_nonce_url(add_query_arg('hashone_hide_notice', 1), 'hashone_hide_notice_nonce', '_hashone_notice_nonce'); ?>" class="notice-close"><?php esc_html_e('Dismiss', 'hashone'); ?></a>
                </div>

            </div>
            <?php
        }

        /** Hide Admin Notice */
        public function hide_admin_notice() {
            if (isset($_GET['hashone_hide_notice']) && isset($_GET['_hashone_notice_nonce']) && current_user_can('manage_options')) {
                if (!wp_verify_nonce(wp_unslash($_GET['_hashone_notice_nonce']), 'hashone_hide_notice_nonce')) {
                    wp_die(esc_html__('Action Failed. Something is Wrong.', 'hashone'));
                }

                update_option('hashone_hide_notice', true);
            }
        }

        /** Register Menu for Welcome Page */
        public function welcome_register_menu() {
            add_menu_page(esc_html__('Welcome', 'hashone'), sprintf(esc_html__('%s Settings', 'hashone'), esc_html(str_replace(' ', '', $this->theme_name))), 'manage_options', 'hashone-welcome', array($this, 'welcome_screen'), '', 60);
        }

        /** Welcome Page */
        public function welcome_screen() {
            /** Define Tabs Sections */
            $tabs = array(
                'getting_started' => array(esc_html__('Getting Started', 'hashone'), 'dashicons-flag'),
                'recommended_plugins' => array(esc_html__('Recommended Plugins', 'hashone'), 'dashicons-admin-plugins'),
                'support' => array(esc_html__('Help & Support', 'hashone'), 'dashicons-sos'),
                'free_vs_pro' => array(esc_html__('Free vs Pro', 'hashone'), 'dashicons-star-filled')
            );
            $section = isset($_GET['section']) && array_key_exists($_GET['section'], $tabs) ? sanitize_key($_GET['section']) : 'getting_started';
            ?>
            <div class="welcome-wrap">
                <?php require_once get_template_directory() . '/welcome/sections/header.php'; ?>

                <div class="welcome-section welcome-section-<?php echo esc_attr($section); ?>">
                    <?php require_once get_template_directory() . '/welcome/sections/' . $section . '.php'; ?>
                </div>

                <?php require_once get_template_directory() . '/welcome/sections/footer.php'; ?>
            </div>
            <?php
        }

        /** Enqueue Necessary Styles and Scripts for the Welcome Page */
        public function welcome_styles_and_scripts($hook) {
            if ('theme-install.php' !== $hook) {
                $importer_params = array(
                    'installing_text' => esc_html__('Installing Demo Importer Plugin', 'hashone'),
                    'activating_text' => esc_html__('Activating Demo Importer Plugin', 'hashone'),
                    'importer_page' => esc_html__('Go to Demo Importer Page', 'hashone'),
                    'importer_url' => admin_url('themes.php?page=hdi-demo-importer'),
                    'error' => esc_html__('Error! Reload the page and try again.', 'hashone'),
                    'ajax_nonce' => wp_create_nonce('hashone_activate_hdi_plugin')
                );
                // One stylesheet for both directions: it uses logical properties.
                wp_enqueue_style('hashone-welcome', get_template_directory_uri() . '/welcome/css/welcome.css', array('dashicons'), HASHONE_VERSION);
                wp_enqueue_script('hashone-welcome', get_template_directory_uri() . '/welcome/js/welcome.js', array('plugin-install', 'updates'), HASHONE_VERSION, true);
                wp_localize_script('hashone-welcome', 'importer_params', $importer_params);
            }
        }

        /* Check if plugin is installed */

        public function check_plugin_installed_state($slug, $filename) {
            return file_exists(ABSPATH . 'wp-content/plugins/' . $slug . '/' . $filename . '.php') ? true : false;
        }

        /* Check if plugin is activated */

        public function check_plugin_active_state($slug, $filename) {
            return is_plugin_active($slug . '/' . $filename . '.php') ? true : false;
        }

        /** Generate Url for the Plugin Button */
        public function plugin_generate_url($status, $slug, $file_name) {
            switch ($status) {
                case 'install':
                    return wp_nonce_url(add_query_arg(array(
                        'action' => 'install-plugin',
                        'plugin' => esc_attr($slug)
                                    ), network_admin_url('update.php')), 'install-plugin_' . esc_attr($slug));
                    break;

                case 'inactive':
                    return add_query_arg(array(
                        'action' => 'deactivate',
                        'plugin' => rawurlencode(esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('deactivate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                            ), network_admin_url('plugins.php'));
                    break;

                case 'active':
                    return add_query_arg(array(
                        'action' => 'activate',
                        'plugin' => rawurlencode(esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                        'plugin_status' => 'all',
                        'paged' => '1',
                        '_wpnonce' => wp_create_nonce('activate-plugin_' . esc_attr($slug) . '/' . esc_attr($file_name) . '.php'),
                            ), network_admin_url('plugins.php'));
                    break;
            }
        }

        /** Ajax Plugin Activation */
        public function activate_plugin() {
            if (!current_user_can('manage_options')) {
                return;
            }

            check_ajax_referer('hashone_activate_hdi_plugin', 'security');

            $slug = isset($_POST['slug']) ? $_POST['slug'] : '';
            $file = isset($_POST['file']) ? $_POST['file'] : '';
            $success = false;

            if (!empty($slug) && !empty($file)) {
                $result = activate_plugin($slug . '/' . $file . '.php');
                update_option('hashone_hide_notice', true);
                if (!is_wp_error($result)) {
                    $success = true;
                }
            }
            echo wp_json_encode(array('success' => $success));
            die();
        }

        /** Adds Footer Notes */
        public function admin_footer_text($text) {
            $screen = get_current_screen();

            if ('toplevel_page_hashone-welcome' == $screen->id) {
                /* translators: %s: five-star link */
                $text = sprintf(esc_html__('Enjoying HashOne? Please leave us a %s rating on WordPress.org. Thank you from the HashThemes team!', 'hashone'), '<a href="https://wordpress.org/support/theme/hashone/reviews/?filter=5#new-post" target="_blank">&#9733;&#9733;&#9733;&#9733;&#9733;</a>');
            }

            return $text;
        }

        /** Generate HashThemes Demo Importer Install Button Link */
        public function generate_hdi_install_button() {
            $slug = $filename = 'hashthemes-demo-importer';
            $import_url = '#';

            if ($this->check_plugin_installed_state($slug, $filename) && !$this->check_plugin_active_state($slug, $filename)) {
                $import_class = 'button button-primary hashone-activate-plugin';
                $import_button_text = esc_html__('Activate Demo Importer Plugin', 'hashone');
            } elseif ($this->check_plugin_installed_state($slug, $filename)) {
                $import_class = 'button button-primary';
                $import_button_text = esc_html__('Go to Demo Importer Page', 'hashone');
                $import_url = admin_url('themes.php?page=hdi-demo-importer');
            } else {
                $import_class = 'button button-primary hashone-install-plugin';
                $import_button_text = esc_html__('Install Demo Importer Plugin', 'hashone');
            }
            return '<a data-slug="' . esc_attr($slug) . '" data-filename="' . esc_attr($filename) . '" class="' . esc_attr($import_class) . '" href="' . $import_url . '">' . esc_html($import_button_text) . '</a>';
        }

        /*
         *  Setup checklist. Built on demand, not in the constructor: the class is
         *  created before init, and translating there makes WordPress load the
         *  text domain too early.
         */
        public function setup_steps() {
            $demo_active = $this->check_plugin_active_state('hashthemes-demo-importer', 'hashthemes-demo-importer');
            return array(
                array(
                    'title' => esc_html__('Add your slides', 'hashone'),
                    'text' => esc_html__('Pick the pages to show in the home page slider. Each page\'s featured image becomes the slide.', 'hashone'),
                    'done' => (bool) get_theme_mod('hashone_slider_page1'),
                    'url' => admin_url('customize.php?autofocus[section]=hashone_slider_sec'),
                ),
                array(
                    'title' => esc_html__('Fill in the home page sections', 'hashone'),
                    'text' => esc_html__('Add your content to each section under Home Page Sections, and switch off the ones you do not need.', 'hashone'),
                    'done' => (bool) get_theme_mod('hashone_about_page'),
                    'url' => admin_url('customize.php?autofocus[panel]=hashone_home_panel'),
                ),
                array(
                    'title' => esc_html__('Add your logo', 'hashone'),
                    'text' => esc_html__('Upload a logo, or keep the site title as text.', 'hashone'),
                    'done' => has_custom_logo(),
                    'url' => admin_url('customize.php?autofocus[control]=custom_logo'),
                ),
                array(
                    'title' => esc_html__('Set up the main menu', 'hashone'),
                    'text' => esc_html__('Create a menu and assign it to the Primary Menu location.', 'hashone'),
                    'done' => has_nav_menu('primary'),
                    'url' => admin_url('customize.php?autofocus[panel]=nav_menus'),
                ),
                array(
                    'title' => esc_html__('Import the demo (optional)', 'hashone'),
                    'text' => esc_html__('Start from a ready-made website instead of an empty one.', 'hashone'),
                    'done' => (bool) get_option('hdi_last_imported_demo'),
                    'url' => $demo_active ? admin_url('themes.php?page=hdi-demo-importer') : '',
                ),
            );
        }

        // Shortcuts into the Customizer panels people look for most.
        public function quick_links() {
            $links = array(
                array('dashicons-id', esc_html__('Site Identity', 'hashone'), 'section', 'title_tagline'),
                array('dashicons-admin-appearance', esc_html__('Header', 'hashone'), 'section', 'hashone_header_bg_sec'),
                array('dashicons-admin-home', esc_html__('Home Page Sections', 'hashone'), 'panel', 'hashone_home_panel'),
                array('dashicons-images-alt2', esc_html__('Slider', 'hashone'), 'section', 'hashone_slider_sec'),
                array('dashicons-art', esc_html__('Colors', 'hashone'), 'section', 'colors'),
                array('dashicons-menu', esc_html__('Menus', 'hashone'), 'panel', 'nav_menus'),
                array('dashicons-admin-post', esc_html__('Blog', 'hashone'), 'section', 'hashone_blog_section'),
                array('dashicons-welcome-widgets-menus', esc_html__('Widgets', 'hashone'), 'panel', 'widgets'),
                array('dashicons-editor-insertmore', esc_html__('Footer', 'hashone'), 'section', 'hashone_copyright_sec'),
                array('dashicons-admin-generic', esc_html__('General', 'hashone'), 'panel', 'hashone_general_settings_panel'),
            );

            foreach ($links as $i => $link) {
                $links[$i] = array(
                    'icon' => $link[0],
                    'label' => $link[1],
                    'url' => admin_url('customize.php?autofocus[' . $link[2] . ']=' . $link[3]),
                );
            }

            return $links;
        }

        // One-line plugin descriptions, built on demand for the same reason as setup_steps().
        public function plugin_descriptions() {
            return array(
                'hashthemes-demo-importer' => esc_html__('Import the HashOne demo, with its content and settings, in one click.', 'hashone'),
                'elementor' => esc_html__('Design pages visually with drag and drop.', 'hashone'),
                'easy-elementor-addons' => esc_html__('Extra widgets and design tools for Elementor.', 'hashone'),
                'hash-form' => esc_html__('Build contact forms, surveys and quotes with drag and drop.', 'hashone'),
                'hash-elements' => esc_html__('Extra Elementor widgets from the makers of HashOne.', 'hashone'),
                'simple-floating-menu' => esc_html__('Add a floating bar of buttons for calls, chat and social links.', 'hashone'),
                'mini-ajax-woo-cart' => esc_html__('Add a mini cart that updates without reloading the page.', 'hashone'),
                'onyx-dark-mode-switcher' => esc_html__('Let visitors switch your site to dark mode.', 'hashone'),
            );
        }

        public function erase_hide_notice() {
            delete_option('hashone_hide_notice');
        }

    }

    new Hashone_Welcome();

endif;
