<?php
/**
 * HashOne Theme Customizer
 *
 * @package HashOne
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hashone_customize_register($wp_customize) {
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    global $wp_registered_sidebars;

    $hashone_widget_list[] = esc_html__("-- Don't Replace --", "hashone");
    foreach ($wp_registered_sidebars as $wp_registered_sidebar) {
        $hashone_widget_list[$wp_registered_sidebar['id']] = $wp_registered_sidebar['name'];
    }

    $hashone_categories = get_categories(array('hide_empty' => 0));
    $hashone_pages = get_pages(array('hide_empty' => 0));
    foreach ($hashone_pages as $hashone_pages_single) {
        $hashone_page_choice[$hashone_pages_single->ID] = $hashone_pages_single->post_title;
    }

    for ($i = 1; $i <= 100; $i++) {
        $hashone_percentage[$i] = $i;
    }

    for ($i = 1; $i <= 10; $i++) {
        if ($i % 2 == 0) {
            $hashone_post_count_choice[$i] = $i;
        }
    }

    foreach ($hashone_categories as $hashone_category) {
        $hashone_cat[$hashone_category->term_id] = $hashone_category->cat_name;
    }

    $hashone_page = '';
    $hashone_page_array = get_pages();
    if (is_array($hashone_page_array)) {
        $hashone_page = $hashone_page_array[0]->ID;
    }

    $hashone_header_bg_choices = array(
        'hs-black' => esc_html__('Black', 'hashone'),
        'hs-white' => esc_html__('White', 'hashone')
    );

    $wp_customize->register_section_type('Hashone_Customize_Section_Pro');
    
    // Register sections.
    $wp_customize->add_section(new Hashone_Customize_Section_Pro($wp_customize, 'hashone-pro-section', array(
        'priority' => 0,
        'pro_text' => esc_html__('Upgrade to Pro', 'hashone'),
        'pro_url' => 'https://hashthemes.com/wordpress-theme/total/?utm_source=wordpress&utm_medium=hashone-customizer-button&utm_campaign=hashone-upgrade'
    )));

    $wp_customize->add_section(new Hashone_Customize_Section_Pro($wp_customize, 'hashone-doc-section', array(
        'title' => esc_html__('Documentation', 'hashone'),
        'priority' => 1000,
        'pro_text' => esc_html__('View', 'hashone'),
        'pro_url' => 'https://hashthemes.com/documentation/hashone-documentation/'
    )));

    $wp_customize->add_section(new Hashone_Customize_Section_Pro($wp_customize, 'hashone-demo-import-section', array(
        'title' => esc_html__('Import Demo Content', 'hashone'),
        'priority' => 1001,
        'pro_text' => esc_html__('Import', 'hashone'),
        'pro_url' => admin_url('/themes.php?page=hashone-welcome')
    )));

    /* ============GENERAL SETTINGS PANEL============ */
    $wp_customize->add_panel('hashone_general_settings_panel', array(
        'title' => esc_html__('General Settings', 'hashone'),
        'priority' => 10
    ));

    //STATIC FRONT PAGE
    $wp_customize->add_section('static_front_page', array(
        'title' => esc_html__('Static Front Page', 'hashone'),
        'panel' => 'hashone_general_settings_panel',
        'description' => esc_html__('Your theme supports a static front page.', 'hashone'),
    ));

    //TITLE AND TAGLINE SETTINGS
    $wp_customize->add_section('title_tagline', array(
        'title' => esc_html__('Site Title & Tagline', 'hashone'),
        'panel' => 'hashone_general_settings_panel',
    ));

    //HEADER LOGO 
    $wp_customize->add_section('header_image', array(
        'title' => esc_html__('Header Logo', 'hashone'),
        'panel' => 'hashone_general_settings_panel',
    ));

    //HEADER BACKGROUND 
    $wp_customize->add_section('hashone_header_bg_sec', array(
        'title' => esc_html__('Header Background', 'hashone'),
        'panel' => 'hashone_general_settings_panel'
    ));

    $wp_customize->add_setting('hashone_header_bg', array(
        'default' => 'hs-black',
        'transport' => 'postMessage',
        'sanitize_callback' => 'hashone_sanitize_choices'
    ));

    $wp_customize->add_control(new Hashone_Dropdown_Chooser($wp_customize, 'hashone_header_bg', array(
        'settings' => 'hashone_header_bg',
        'section' => 'hashone_header_bg_sec',
        'type' => 'select',
        'label' => esc_html__('Header Background Color', 'hashone'),
        'choices' => $hashone_header_bg_choices,
        'description' => esc_html__('Only appears in sticky header in featured frontpage.', 'hashone')
    )));

    //PAGE HEADER BACKGROUND 
    $wp_customize->add_section('hashone_page_header_bg_sec', array(
        'title' => esc_html__('Page Header Banner', 'hashone'),
        'panel' => 'hashone_general_settings_panel'
    ));

    $wp_customize->add_setting('hashone_page_header_bg', array(
        'default' => get_template_directory_uri() . '/images/bg.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hashone_page_header_bg', array(
        'label' => esc_html__('Page Header Banner', 'hashone'),
        'settings' => 'hashone_page_header_bg',
        'section' => 'hashone_header_bg_sec',
        'description' => esc_html__('Recommended Image Size: 1800X400px', 'hashone')
    )));

    //BLOG SETTINGS
    $wp_customize->add_section('hashone_blog_section', array(
        'title' => esc_html__('Blog Settings', 'hashone'),
        'panel' => 'hashone_general_settings_panel'
    ));

    $wp_customize->add_setting('hashone_blog_format', array(
        'default' => 'excerpt',
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control('hashone_blog_format', array(
        'label' => esc_html__('Blog Content Format', 'hashone'),
        'section' => 'hashone_blog_section',
        'settings' => 'hashone_blog_format',
        'type' => 'radio',
        'choices' => array(
            'excerpt' => esc_html__('Excerpt', 'hashone'),
            'full_content' => esc_html__('Full Content', 'hashone')
        )
    ));

    //BACKGROUND IMAGE
    $wp_customize->add_section('background_image', array(
        'title' => esc_html__('Background Image', 'hashone'),
        'panel' => 'hashone_general_settings_panel',
    ));

    //COLOR SETTINGS
    $wp_customize->add_section('colors', array(
        'title' => esc_html__('Colors', 'hashone'),
        'panel' => 'hashone_general_settings_panel',
    ));

    /* ============HOME PAGE PANEL============ */
    $wp_customize->add_panel('hashone_home_panel', array(
        'title' => esc_html__('Home Page Sections', 'hashone'),
        'priority' => 10
    ));

    $wp_customize->add_section('hashone_slider_sec', array(
        'title' => esc_html__('Slider Section', 'hashone'),
        'panel' => 'hashone_home_panel'
    ));

    //SLIDERS
    for ($i = 1; $i < 4; $i++) {

        $wp_customize->add_setting('hashone_slider_heading' . $i, array(
            'sanitize_callback' => 'hashone_sanitize_text'
        ));

        $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_slider_heading' . $i, array(
            'settings' => 'hashone_slider_heading' . $i,
            'section' => 'hashone_slider_sec',
            'label' => esc_html__('Slider ', 'hashone') . $i
        )));

        $wp_customize->add_setting('hashone_slider_page' . $i, array(
            'sanitize_callback' => 'absint'
        ));

        $wp_customize->add_control('hashone_slider_page' . $i, array(
            'settings' => 'hashone_slider_page' . $i,
            'section' => 'hashone_slider_sec',
            'type' => 'dropdown-pages',
            'label' => esc_html__('Select a Page', 'hashone'),
        ));
    }

    $wp_customize->add_setting('hashone_slider_info', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Info_Text($wp_customize, 'hashone_slider_info', array(
        'settings' => 'hashone_slider_info',
        'section' => 'hashone_slider_sec',
        'label' => esc_html__('Note:', 'hashone'),
        'description' => esc_html__('The Page featured image works as a slider banner and the title & content work as a slider caption.', 'hashone') . '<br/>' . esc_html__('Recommended Image Size: 1900X600', 'hashone'),
    )));

    /* ============ABOUT US SECTION============ */
    //ABOUT US PAGE
    $wp_customize->add_section('hashone_about_sec', array(
        'title' => esc_html__('About Us Section', 'hashone'),
        'panel' => 'hashone_home_panel'
    ));

    $wp_customize->add_setting('hashone_disable_about_sec', array(
        'default' => 'off',
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Hashone_Switch_Control($wp_customize, 'hashone_disable_about_sec', array(
        'settings' => 'hashone_disable_about_sec',
        'section' => 'hashone_about_sec',
        'label' => esc_html__('Disable About Section ', 'hashone'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'hashone'),
            'off' => esc_html__('No', 'hashone')
        )
    )));

    $wp_customize->add_setting('hashone_about_page_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_about_page_heading', array(
        'settings' => 'hashone_about_page_heading',
        'section' => 'hashone_about_sec',
        'label' => esc_html__('About Us Page', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_about_page', array(
        'default' => $hashone_page,
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control('hashone_about_page', array(
        'settings' => 'hashone_about_page',
        'section' => 'hashone_about_sec',
        'type' => 'dropdown-pages',
        'label' => esc_html__('Select a Page', 'hashone'),
    ));

    $wp_customize->add_setting('hashone_progressbar_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_progressbar_heading', array(
        'settings' => 'hashone_progressbar_heading',
        'section' => 'hashone_about_sec',
        'label' => esc_html__('Progress Bars', 'hashone'),
    )));

    //ABOUT US PROGRESS BAR
    $wp_customize->add_setting('hashone_about_widget', array(
        'sanitize_callback' => 'hashone_sanitize_choices'
    ));

    $wp_customize->add_control('hashone_about_widget', array(
        'settings' => 'hashone_about_widget',
        'section' => 'hashone_about_sec',
        'type' => 'select',
        'label' => esc_html__('Replace Progress Bar by widget', 'hashone'),
        'choices' => $hashone_widget_list
    ));

    for ($i = 1; $i < 6; $i++) {
        $wp_customize->add_setting('hashone_about_progressbar_heading' . $i, array(
            'sanitize_callback' => 'hashone_sanitize_text'
        ));

        $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_about_progressbar_heading' . $i, array(
            'settings' => 'hashone_about_progressbar_heading' . $i,
            'section' => 'hashone_about_sec',
            'label' => esc_html__('Progress Bar ', 'hashone') . $i,
        )));

        $wp_customize->add_setting('hashone_about_progressbar_title' . $i, array(
            'default' => esc_html__('Progress Bar Title', 'hashone') . $i,
            'sanitize_callback' => 'hashone_sanitize_text',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_setting('hashone_about_progressbar_disable' . $i, array(
            'sanitize_callback' => 'absint'
        ));

        $wp_customize->add_control('hashone_about_progressbar_disable' . $i, array(
            'settings' => 'hashone_about_progressbar_disable' . $i,
            'section' => 'hashone_about_sec',
            'label' => esc_html__('Check to Disable', 'hashone'),
            'type' => 'checkbox'
        ));

        $wp_customize->add_control('hashone_about_progressbar_title' . $i, array(
            'settings' => 'hashone_about_progressbar_title' . $i,
            'section' => 'hashone_about_sec',
            'type' => 'text',
            'label' => esc_html__('Title', 'hashone')
        ));

        $wp_customize->add_setting('hashone_about_progressbar_percentage' . $i, array(
            'default' => rand(60, 100),
            'sanitize_callback' => 'hashone_sanitize_choices'
        ));

        $wp_customize->add_control(new Hashone_Dropdown_Chooser($wp_customize, 'hashone_about_progressbar_percentage' . $i, array(
            'settings' => 'hashone_about_progressbar_percentage' . $i,
            'section' => 'hashone_about_sec',
            'label' => esc_html__('Percentage', 'hashone'),
            'choices' => $hashone_percentage
        )));
    }

    /* ============FEATURED SECTION ============ */
    $wp_customize->add_section('hashone_featured_sec', array(
        'title' => esc_html__('Featured Section', 'hashone'),
        'panel' => 'hashone_home_panel'
    ));

    $wp_customize->add_setting('hashone_disable_featured_sec', array(
        'default' => 'off',
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Hashone_Switch_Control($wp_customize, 'hashone_disable_featured_sec', array(
        'settings' => 'hashone_disable_featured_sec',
        'section' => 'hashone_featured_sec',
        'label' => esc_html__('Disable Featured Section ', 'hashone'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'hashone'),
            'off' => esc_html__('No', 'hashone')
        )
    )));

    $wp_customize->add_setting('hashone_featured_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_featured_heading', array(
        'settings' => 'hashone_featured_heading',
        'section' => 'hashone_featured_sec',
        'label' => esc_html__('Featured Title / SubTitle ', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_featured_title', array(
        'default' => esc_html__('Our Features', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_featured_title', array(
        'settings' => 'hashone_featured_title',
        'section' => 'hashone_featured_sec',
        'type' => 'text',
        'label' => esc_html__('Title', 'hashone')
    ));

    $wp_customize->add_setting('hashone_featured_desc', array(
        'default' => esc_html__('Check out cool featured of the theme', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_featured_desc', array(
        'settings' => 'hashone_featured_desc',
        'section' => 'hashone_featured_sec',
        'type' => 'textarea',
        'label' => esc_html__('Sub Title', 'hashone')
    ));


    //FEATURED PAGES

    for ($i = 1; $i < 5; $i++) {

        $wp_customize->add_setting('hashone_featured_page_header' . $i, array(
            'sanitize_callback' => 'hashone_sanitize_text'
        ));

        $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_featured_page_header' . $i, array(
            'settings' => 'hashone_featured_page_header' . $i,
            'section' => 'hashone_featured_sec',
            'label' => esc_html__('Featured Page ', 'hashone') . $i
        )));

        $wp_customize->add_setting('hashone_featured_page' . $i, array(
            'default' => $hashone_page,
            'sanitize_callback' => 'absint'
        ));

        $wp_customize->add_control('hashone_featured_page' . $i, array(
            'settings' => 'hashone_featured_page' . $i,
            'section' => 'hashone_featured_sec',
            'type' => 'dropdown-pages',
            'label' => esc_html__('Select a Page', 'hashone')
        ));

        $wp_customize->add_setting('hashone_featured_page_icon' . $i, array(
            'default' => 'fa fa-bell',
            'sanitize_callback' => 'hashone_sanitize_text',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new Hashone_Fontawesome_Icon_Chooser($wp_customize, 'hashone_featured_page_icon' . $i, array(
            'settings' => 'hashone_featured_page_icon' . $i,
            'section' => 'hashone_featured_sec',
            'label' => esc_html__('FontAwesome Icon', 'hashone'),
        )));
    }

    /* ============PORTFOLIO SECTION============ */

    $wp_customize->add_section('hashone_portfolio_sec', array(
        'title' => esc_html__('Portfolio Section', 'hashone'),
        'panel' => 'hashone_home_panel'
    ));

    $wp_customize->add_setting('hashone_disable_portfolio_sec', array(
        'default' => 'off',
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Hashone_Switch_Control($wp_customize, 'hashone_disable_portfolio_sec', array(
        'settings' => 'hashone_disable_portfolio_sec',
        'section' => 'hashone_portfolio_sec',
        'label' => esc_html__('Disable Portfolio Section ', 'hashone'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'hashone'),
            'off' => esc_html__('No', 'hashone')
        )
    )));

    $wp_customize->add_setting('hashone_portfolio_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_portfolio_heading', array(
        'settings' => 'hashone_portfolio_heading',
        'section' => 'hashone_portfolio_sec',
        'label' => esc_html__('Portfolio Title/SubTitle', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_portfolio_title', array(
        'default' => esc_html__('What we do it love', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_portfolio_title', array(
        'settings' => 'hashone_portfolio_title',
        'section' => 'hashone_portfolio_sec',
        'type' => 'text',
        'label' => esc_html__('Title', 'hashone')
    ));

    $wp_customize->add_setting('hashone_portfolio_sub_title', array(
        'default' => esc_html__('Check our beautiful works we do', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_portfolio_sub_title', array(
        'settings' => 'hashone_portfolio_sub_title',
        'section' => 'hashone_portfolio_sec',
        'type' => 'textarea',
        'label' => esc_html__('Sub Title', 'hashone')
    ));

    //PORTFOLIO CHOICES
    $wp_customize->add_setting('hashone_portfolio_cat_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_portfolio_cat_heading', array(
        'settings' => 'hashone_portfolio_cat_heading',
        'section' => 'hashone_portfolio_sec',
        'label' => esc_html__('Portfolio Category', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_portfolio_cat', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Checkbox_Multiple($wp_customize, 'hashone_portfolio_cat', array(
        'label' => 'Select Category',
        'section' => 'hashone_portfolio_sec',
        'settings' => 'hashone_portfolio_cat',
        'choices' => $hashone_cat
    )));


    /* ============SERVICE SECTION============ */
    $wp_customize->add_section('hashone_service_sec', array(
        'title' => esc_html__('Service Section', 'hashone'),
        'panel' => 'hashone_home_panel'
    ));

    $wp_customize->add_setting('hashone_disable_service_sec', array(
        'default' => 'off',
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Hashone_Switch_Control($wp_customize, 'hashone_disable_service_sec', array(
        'settings' => 'hashone_disable_service_sec',
        'section' => 'hashone_service_sec',
        'label' => esc_html__('Disable Service Section ', 'hashone'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'hashone'),
            'off' => esc_html__('No', 'hashone')
        )
    )));

    $wp_customize->add_setting('hashone_service_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_service_heading', array(
        'settings' => 'hashone_service_heading',
        'section' => 'hashone_service_sec',
        'label' => esc_html__('Serivce Title / SubTitle', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_service_title', array(
        'default' => esc_html__('Why Choose Us', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_service_title', array(
        'settings' => 'hashone_service_title',
        'section' => 'hashone_service_sec',
        'type' => 'text',
        'label' => esc_html__('Title', 'hashone')
    ));

    $wp_customize->add_setting('hashone_service_sub_title', array(
        'default' => esc_html__('Let us do all things for you', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_featured_sub_title', array(
        'settings' => 'hashone_service_sub_title',
        'section' => 'hashone_service_sec',
        'type' => 'textarea',
        'label' => esc_html__('Sub Title', 'hashone')
    ));

    //SERVICE PAGES
    $wp_customize->add_setting('hashone_service_left_bg_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_service_left_bg_heading', array(
        'settings' => 'hashone_service_left_bg_heading',
        'section' => 'hashone_service_sec',
        'label' => esc_html__('Service Left Banner Image', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_service_left_bg', array(
        'default' => get_template_directory_uri() . '/images/bg.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hashone_service_left_bg', array(
        'label' => 'Left Image',
        'section' => 'hashone_service_sec',
        'settings' => 'hashone_service_left_bg',
        'description' => esc_html__('Image Size: 770X650px', 'hashone')
    )));

    for ($i = 1; $i < 7; $i++) {
        $wp_customize->add_setting('hashone_service_header' . $i, array(
            'sanitize_callback' => 'hashone_sanitize_text'
        ));

        $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_service_header' . $i, array(
            'settings' => 'hashone_service_header' . $i,
            'section' => 'hashone_service_sec',
            'label' => esc_html__('Service Page ', 'hashone') . $i
        )));

        $wp_customize->add_setting('hashone_service_page' . $i, array(
            'default' => $hashone_page,
            'sanitize_callback' => 'absint'
        ));

        $wp_customize->add_control('hashone_service_page' . $i, array(
            'settings' => 'hashone_service_page' . $i,
            'section' => 'hashone_service_sec',
            'type' => 'dropdown-pages',
            'label' => esc_html__('Select a Page', 'hashone')
        ));

        $wp_customize->add_setting('hashone_service_page_icon' . $i, array(
            'default' => 'fa fa-globe',
            'sanitize_callback' => 'hashone_sanitize_text',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new Hashone_Fontawesome_Icon_Chooser($wp_customize, 'hashone_service_page_icon' . $i, array(
            'settings' => 'hashone_service_page_icon' . $i,
            'section' => 'hashone_service_sec',
            'label' => esc_html__('FontAwesome Icon', 'hashone')
        )));
    }

    /* ============TEAM SECTION============ */
    $wp_customize->add_section('hashone_team_sec', array(
        'title' => esc_html__('Team Section', 'hashone'),
        'panel' => 'hashone_home_panel'
    ));

    $wp_customize->add_setting('hashone_disable_team_sec', array(
        'default' => 'off',
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Hashone_Switch_Control($wp_customize, 'hashone_disable_team_sec', array(
        'settings' => 'hashone_disable_team_sec',
        'section' => 'hashone_team_sec',
        'label' => esc_html__('Disable Team Section ', 'hashone'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'hashone'),
            'off' => esc_html__('No', 'hashone')
        )
    )));

    $wp_customize->add_setting('hashone_team_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_team_heading', array(
        'settings' => 'hashone_team_heading',
        'section' => 'hashone_team_sec',
        'label' => esc_html__('Team Title / SubTitle ', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_team_title', array(
        'default' => esc_html__('Meet Our Team', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_team_title', array(
        'settings' => 'hashone_team_title',
        'section' => 'hashone_team_sec',
        'type' => 'text',
        'label' => esc_html__('Title', 'hashone')
    ));

    $wp_customize->add_setting('hashone_team_sub_title', array(
        'default' => esc_html__('Experts who works for us', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_team_sub_title', array(
        'settings' => 'hashone_team_sub_title',
        'section' => 'hashone_team_sec',
        'type' => 'textarea',
        'label' => esc_html__('Sub Title', 'hashone')
    ));

    //TEAM PAGES
    for ($i = 1; $i < 5; $i++) {
        $wp_customize->add_setting('hashone_team_page_heading' . $i, array(
            'sanitize_callback' => 'hashone_sanitize_text'
        ));

        $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_team_page_heading' . $i, array(
            'settings' => 'hashone_team_page_heading' . $i,
            'section' => 'hashone_team_sec',
            'label' => esc_html__('Team ', 'hashone') . $i,
        )));

        $wp_customize->add_setting('hashone_team_page' . $i, array(
            'default' => $hashone_page,
            'sanitize_callback' => 'absint'
        ));

        $wp_customize->add_control('hashone_team_page' . $i, array(
            'settings' => 'hashone_team_page' . $i,
            'section' => 'hashone_team_sec',
            'type' => 'dropdown-pages',
            'label' => esc_html__('Select a Page', 'hashone')
        ));

        $wp_customize->add_setting('hashone_team_designation' . $i, array(
            'default' => esc_html__('CEO', 'hashone'),
            'sanitize_callback' => 'hashone_sanitize_text'
        ));

        $wp_customize->add_control('hashone_team_designation' . $i, array(
            'settings' => 'hashone_team_designation' . $i,
            'section' => 'hashone_team_sec',
            'type' => 'text',
            'label' => esc_html__('Team Member Designation', 'hashone')
        ));

        $wp_customize->add_setting('hashone_team_facebook' . $i, array(
            'default' => 'https://facebook.com',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control('hashone_team_facebook' . $i, array(
            'settings' => 'hashone_team_facebook' . $i,
            'section' => 'hashone_team_sec',
            'type' => 'url',
            'label' => esc_html__('Facebook Url', 'hashone')
        ));

        $wp_customize->add_setting('hashone_team_twitter' . $i, array(
            'default' => 'https://twitter.com',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control('hashone_team_twitter' . $i, array(
            'settings' => 'hashone_team_twitter' . $i,
            'section' => 'hashone_team_sec',
            'type' => 'url',
            'label' => esc_html__('Twitter Url', 'hashone')
        ));

        $wp_customize->add_setting('hashone_team_linkedin' . $i, array(
            'default' => 'https://linkedin.com',
            'sanitize_callback' => 'esc_url_raw'
        ));

        $wp_customize->add_control('hashone_team_linkedin' . $i, array(
            'settings' => 'hashone_team_linkedin' . $i,
            'section' => 'hashone_team_sec',
            'type' => 'url',
            'label' => esc_html__('Linkedin Url', 'hashone')
        ));
    }

    /* ============COUNTER SECTION============ */

    $wp_customize->add_section('hashone_counter_sec', array(
        'title' => esc_html__('Counter Section', 'hashone'),
        'panel' => 'hashone_home_panel'
    ));

    $wp_customize->add_setting('hashone_disable_counter_sec', array(
        'default' => 'off',
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Hashone_Switch_Control($wp_customize, 'hashone_disable_counter_sec', array(
        'settings' => 'hashone_disable_counter_sec',
        'section' => 'hashone_counter_sec',
        'label' => esc_html__('Disable Counter Section ', 'hashone'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'hashone'),
            'off' => esc_html__('No', 'hashone')
        )
    )));

    $wp_customize->add_setting('hashone_counter_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_counter_heading', array(
        'settings' => 'hashone_counter_heading',
        'section' => 'hashone_counter_sec',
        'label' => esc_html__('Counter Title / SubTitle', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_counter_title', array(
        'default' => esc_html__('OUR FACTS', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_counter_title', array(
        'settings' => 'hashone_counter_title',
        'section' => 'hashone_counter_sec',
        'type' => 'text',
        'label' => esc_html__('Title', 'hashone')
    ));

    $wp_customize->add_setting('hashone_counter_sub_title', array(
        'default' => esc_html__('Some Numbers that Speaks', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_counter_sub_title', array(
        'settings' => 'hashone_counter_sub_title',
        'section' => 'hashone_counter_sec',
        'type' => 'textarea',
        'label' => esc_html__('Sub Title', 'hashone')
    ));

    $wp_customize->add_setting('hashone_counter_bg_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_counter_bg_heading', array(
        'settings' => 'hashone_counter_bg_heading',
        'section' => 'hashone_counter_sec',
        'label' => esc_html__('Counter Section Background', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_counter_bg', array(
        'default' => get_template_directory_uri() . '/images/bg.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hashone_counter_bg', array(
        'label' => 'Background Image',
        'section' => 'hashone_counter_sec',
        'settings' => 'hashone_counter_bg',
        'description' => esc_html__('Image Size: 1800X400px', 'hashone')
    )));

    //COUNTERS
    for ($i = 1; $i < 5; $i++) {
        $wp_customize->add_setting('hashone_counters_heading' . $i, array(
            'sanitize_callback' => 'hashone_sanitize_text'
        ));

        $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_counters_heading' . $i, array(
            'settings' => 'hashone_counters_heading' . $i,
            'section' => 'hashone_counter_sec',
            'label' => esc_html__('Counter ', 'hashone') . $i,
        )));

        $wp_customize->add_setting('hashone_counter_title' . $i, array(
            'default' => esc_html__('Cups of Coffee', 'hashone'),
            'sanitize_callback' => 'hashone_sanitize_text',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control('hashone_counter_title' . $i, array(
            'settings' => 'hashone_counter_title' . $i,
            'section' => 'hashone_counter_sec',
            'type' => 'text',
            'label' => esc_html__('Title', 'hashone')
        ));

        $wp_customize->add_setting('hashone_counter_count' . $i, array(
            'default' => rand(600, 2000),
            'sanitize_callback' => 'absint',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control('hashone_counter_count' . $i, array(
            'settings' => 'hashone_counter_count' . $i,
            'section' => 'hashone_counter_sec',
            'type' => 'number',
            'label' => esc_html__('Counter Value', 'hashone')
        ));

        $wp_customize->add_setting('hashone_counter_icon' . $i, array(
            'default' => 'fa fa-coffee',
            'sanitize_callback' => 'hashone_sanitize_text',
            'transport' => 'postMessage'
        ));

        $wp_customize->add_control(new Hashone_Fontawesome_Icon_Chooser($wp_customize, 'hashone_counter_icon' . $i, array(
            'settings' => 'hashone_counter_icon' . $i,
            'section' => 'hashone_counter_sec',
            'label' => esc_html__('Counter Icon', 'hashone')
        )));
    }

    /* ============CLIENTS LOGO SECTION============ */
    $wp_customize->add_section('hashone_logo_sec', array(
        'title' => esc_html__('Clients Logo Section', 'hashone'),
        'panel' => 'hashone_home_panel'
    ));

    $wp_customize->add_setting('hashone_disable_logo_sec', array(
        'default' => 'off',
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Hashone_Switch_Control($wp_customize, 'hashone_disable_logo_sec', array(
        'settings' => 'hashone_disable_logo_sec',
        'section' => 'hashone_logo_sec',
        'label' => esc_html__('Disable Logo Section ', 'hashone'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'hashone'),
            'off' => esc_html__('No', 'hashone')
        )
    )));

    $wp_customize->add_setting('hashone_logo_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_logo_heading', array(
        'settings' => 'hashone_logo_heading',
        'section' => 'hashone_logo_sec',
        'label' => esc_html__('Client Logo Title / SubTitle ', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_logo_title', array(
        'default' => esc_html__('We are Associated with', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_logo_title', array(
        'settings' => 'hashone_logo_title',
        'section' => 'hashone_logo_sec',
        'type' => 'text',
        'label' => esc_html__('Title', 'hashone')
    ));

    $wp_customize->add_setting('hashone_logo_sub_title', array(
        'default' => esc_html__('Meet our Awesome Clients', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_logo_sub_title', array(
        'settings' => 'hashone_logo_sub_title',
        'section' => 'hashone_logo_sec',
        'type' => 'textarea',
        'label' => esc_html__('Sub Title', 'hashone')
    ));

    //CLIENTS LOGOS

    $wp_customize->add_setting('hashone_client_upload_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_client_upload_heading', array(
        'settings' => 'hashone_client_upload_heading',
        'section' => 'hashone_logo_sec',
        'label' => esc_html__('Upload Clients Logos ', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_client_logo_image', array(
        'default' => '',
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Display_Gallery_Control($wp_customize, 'hashone_client_logo_image', array(
        'settings' => 'hashone_client_logo_image',
        'section' => 'hashone_logo_sec',
        'label' => esc_html__('Upload Clients Logos', 'hashone'),
    )));

    /* ============TESTIMONIAL SECTION============ */

    $wp_customize->add_section('hashone_testimonial_sec', array(
        'title' => esc_html__('Testimonial Section', 'hashone'),
        'panel' => 'hashone_home_panel'
    ));

    $wp_customize->add_setting('hashone_disable_testimonial_sec', array(
        'default' => 'off',
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Hashone_Switch_Control($wp_customize, 'hashone_disable_testimonial_sec', array(
        'settings' => 'hashone_disable_testimonial_sec',
        'section' => 'hashone_testimonial_sec',
        'label' => esc_html__('Disable Testimonial Section ', 'hashone'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'hashone'),
            'off' => esc_html__('No', 'hashone')
        )
    )));

    $wp_customize->add_setting('hashone_testimonial_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_testimonial_heading', array(
        'settings' => 'hashone_testimonial_heading',
        'section' => 'hashone_testimonial_sec',
        'label' => esc_html__('Testimonial Title / SubTitle ', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_testimonial_title', array(
        'default' => esc_html__('Testimonials', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_testimonial_title', array(
        'settings' => 'hashone_testimonial_title',
        'section' => 'hashone_testimonial_sec',
        'type' => 'text',
        'label' => esc_html__('Title', 'hashone')
    ));

    $wp_customize->add_setting('hashone_testimonial_sub_title', array(
        'default' => esc_html__('What our client says', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_testimonial_sub_title', array(
        'settings' => 'hashone_testimonial_sub_title',
        'section' => 'hashone_testimonial_sec',
        'type' => 'textarea',
        'label' => esc_html__('Sub Title', 'hashone')
    ));

    //TESTIMONIAL PAGES
    $wp_customize->add_setting('hashone_testimonial_page_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_testimonial_page_heading', array(
        'settings' => 'hashone_testimonial_page_heading',
        'section' => 'hashone_testimonial_sec',
        'label' => esc_html__('Testimonial Pages', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_testimonial_page', array(
        'default' => array($hashone_page),
        'sanitize_callback' => 'hashone_sanitize_choices_array'
    ));

    $wp_customize->add_control(new Hashone_Dropdown_Multiple_Chooser($wp_customize, 'hashone_testimonial_page', array(
        'settings' => 'hashone_testimonial_page',
        'section' => 'hashone_testimonial_sec',
        'choices' => $hashone_page_choice,
        'label' => esc_html__('Select the Pages', 'hashone'),
        'placeholder' => esc_html__('Select Some Pages', 'hashone')
    )));

    /* ============BLOG PANEL============ */

    $wp_customize->add_section('hashone_blog_sec', array(
        'title' => esc_html__('Blog Section', 'hashone'),
        'panel' => 'hashone_home_panel'
    ));

    $wp_customize->add_setting('hashone_disable_blog_sec', array(
        'default' => 'off',
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Hashone_Switch_Control($wp_customize, 'hashone_disable_blog_sec', array(
        'settings' => 'hashone_disable_blog_sec',
        'section' => 'hashone_blog_sec',
        'label' => esc_html__('Disable Blog Section ', 'hashone'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'hashone'),
            'off' => esc_html__('No', 'hashone')
        )
    )));

    $wp_customize->add_setting('hashone_blog_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_blog_heading', array(
        'settings' => 'hashone_blog_heading',
        'section' => 'hashone_blog_sec',
        'label' => esc_html__('Blog Title / SubTitle ', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_blog_title', array(
        'default' => esc_html__('Latest blogs', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_blog_title', array(
        'settings' => 'hashone_blog_title',
        'section' => 'hashone_blog_sec',
        'type' => 'text',
        'label' => esc_html__('Title', 'hashone')
    ));

    $wp_customize->add_setting('hashone_blog_sub_title', array(
        'default' => esc_html__('Check out the latest post from our blog', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_blog_sub_title', array(
        'settings' => 'hashone_blog_sub_title',
        'section' => 'hashone_blog_sec',
        'type' => 'textarea',
        'label' => esc_html__('Sub Title', 'hashone')
    ));

    //BLOG SETTINGS
    $wp_customize->add_setting('hashone_blog_cat_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_blog_cat_heading', array(
        'settings' => 'hashone_blog_cat_heading',
        'section' => 'hashone_blog_sec',
        'label' => esc_html__('Blog Count/Category', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_blog_post_count', array(
        'default' => '4',
        'sanitize_callback' => 'hashone_sanitize_choices'
    ));

    $wp_customize->add_control(new Hashone_Dropdown_Chooser($wp_customize, 'hashone_blog_post_count', array(
        'settings' => 'hashone_blog_post_count',
        'section' => 'hashone_blog_sec',
        'label' => esc_html__('Number of Posts to show', 'hashone'),
        'choices' => $hashone_post_count_choice
    )));

    $wp_customize->add_setting('hashone_blog_cat_exclude', array(
        'default' => '',
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Checkbox_Multiple($wp_customize, 'hashone_blog_cat_exclude', array(
        'label' => 'Exclude Category from Blog Posts',
        'section' => 'hashone_blog_sec',
        'settings' => 'hashone_blog_cat_exclude',
        'choices' => $hashone_cat
    )));

    /* ============CONTACT SECTION============ */

    $wp_customize->add_section('hashone_contact_sec', array(
        'title' => esc_html__('Contact Section', 'hashone'),
        'panel' => 'hashone_home_panel'
    ));

    $wp_customize->add_setting('hashone_disable_contact_sec', array(
        'default' => 'off',
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control(new Hashone_Switch_Control($wp_customize, 'hashone_disable_contact_sec', array(
        'settings' => 'hashone_disable_contact_sec',
        'section' => 'hashone_contact_sec',
        'label' => esc_html__('Disable Contact Section ', 'hashone'),
        'on_off_label' => array(
            'on' => esc_html__('Yes', 'hashone'),
            'off' => esc_html__('No', 'hashone')
        )
    )));

    $wp_customize->add_setting('hashone_contact_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_contact_heading', array(
        'settings' => 'hashone_contact_heading',
        'section' => 'hashone_contact_sec',
        'label' => esc_html__('Contact Title / SubTitle ', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_contact_title', array(
        'default' => esc_html__('Contact Us', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_contact_title', array(
        'settings' => 'hashone_contact_title',
        'section' => 'hashone_contact_sec',
        'type' => 'text',
        'label' => esc_html__('Title', 'hashone')
    ));

    $wp_customize->add_setting('hashone_contact_sub_title', array(
        'default' => esc_html__('We would love to hear from you', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control('hashone_contact_sub_title', array(
        'settings' => 'hashone_contact_sub_title',
        'section' => 'hashone_contact_sec',
        'type' => 'textarea',
        'label' => esc_html__('Sub Title', 'hashone')
    ));

    $wp_customize->add_setting('hashone_contact_bg_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_contact_bg_heading', array(
        'settings' => 'hashone_contact_bg_heading',
        'section' => 'hashone_contact_sec',
        'label' => esc_html__('Contact Section Background', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_contact_bg', array(
        'default' => get_template_directory_uri() . '/images/bg.jpg',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hashone_contact_bg', array(
        'label' => 'Background Image',
        'section' => 'hashone_contact_sec',
        'settings' => 'hashone_contact_bg',
        'description' => esc_html__('Recommended Image Size: 1800X800px', 'hashone')
    )));

    $wp_customize->add_setting('hashone_contact_form_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_contact_form_heading', array(
        'settings' => 'hashone_contact_form_heading',
        'section' => 'hashone_contact_sec',
        'label' => esc_html__('Contact Details', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_contact_form', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control('hashone_contact_form', array(
        'settings' => 'hashone_contact_form',
        'section' => 'hashone_contact_sec',
        'type' => 'text',
        'label' => esc_html__('Contact Form ShortCode', 'hashone'),
        'description' => esc_html__('Add shortcode for Contact form or go to to widget page to add your own widget.', 'hashone'),
    ));

    $wp_customize->add_setting('hashone_contact_detail', array(
        'default' => esc_html__('Contact us on the detail given below', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control('hashone_contact_detail', array(
        'settings' => 'hashone_contact_detail',
        'section' => 'hashone_contact_sec',
        'type' => 'textarea',
        'label' => esc_html__('Contact Detail', 'hashone')
    ));

    $wp_customize->add_setting('hashone_contact_address', array(
        'default' => esc_html__('Address: 2400 South Avenue', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control('hashone_contact_address', array(
        'settings' => 'hashone_contact_address',
        'section' => 'hashone_contact_sec',
        'type' => 'text',
        'label' => esc_html__('Contact Address', 'hashone')
    ));

    $wp_customize->add_setting('hashone_contact_phone', array(
        'default' => esc_html__('Phone: +928 336 2000', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control('hashone_contact_phone', array(
        'settings' => 'hashone_contact_phone',
        'section' => 'hashone_contact_sec',
        'type' => 'text',
        'label' => esc_html__('Phone', 'hashone')
    ));

    $wp_customize->add_setting('hashone_contact_email', array(
        'default' => esc_html__('Email: info@website.com', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control('hashone_contact_email', array(
        'settings' => 'hashone_contact_email',
        'section' => 'hashone_contact_sec',
        'type' => 'text',
        'label' => esc_html__('Email', 'hashone')
    ));

    $wp_customize->add_setting('hashone_contact_website', array(
        'default' => esc_html__('Website: http://hashthemes.com', 'hashone'),
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control('hashone_contact_website', array(
        'settings' => 'hashone_contact_website',
        'section' => 'hashone_contact_sec',
        'type' => 'text',
        'label' => esc_html__('Website', 'hashone')
    ));

    /* ============SOCIAL ICONS SECTION============ */
    $wp_customize->add_setting('hashone_social_heading', array(
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control(new Hashone_Customize_Heading($wp_customize, 'hashone_social_heading', array(
        'settings' => 'hashone_social_heading',
        'section' => 'hashone_contact_sec',
        'label' => esc_html__('Social Icons', 'hashone'),
    )));

    $wp_customize->add_setting('hashone_social_facebook', array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('hashone_social_facebook', array(
        'settings' => 'hashone_social_facebook',
        'section' => 'hashone_contact_sec',
        'type' => 'text',
        'label' => esc_html__('Facebook', 'hashone')
    ));

    $wp_customize->add_setting('hashone_social_twitter', array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('hashone_social_twitter', array(
        'settings' => 'hashone_social_twitter',
        'section' => 'hashone_contact_sec',
        'type' => 'text',
        'label' => esc_html__('Twitter', 'hashone')
    ));

    $wp_customize->add_setting('hashone_social_pinterest', array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('hashone_social_pinterest', array(
        'settings' => 'hashone_social_pinterest',
        'section' => 'hashone_contact_sec',
        'type' => 'text',
        'label' => esc_html__('Pinterest', 'hashone')
    ));

    $wp_customize->add_setting('hashone_social_youtube', array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('hashone_social_youtube', array(
        'settings' => 'hashone_social_youtube',
        'section' => 'hashone_contact_sec',
        'type' => 'text',
        'label' => esc_html__('Youtube', 'hashone')
    ));

    $wp_customize->add_setting('hashone_social_linkedin', array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('hashone_social_linkedin', array(
        'settings' => 'hashone_social_linkedin',
        'section' => 'hashone_contact_sec',
        'type' => 'text',
        'label' => esc_html__('Linkedin', 'hashone')
    ));

    /* ============COPYRIGHT TEXT============ */
    $wp_customize->add_section('hashone_copyright_sec', array(
        'title' => esc_html__('Copyright Text', 'hashone'),
    ));

    $wp_customize->add_setting('hashone_copyright', array(
        'default' => sprintf(esc_html__('© Copyright 2020 %s', 'hashone'), get_bloginfo('name')),
        'transport' => 'postMessage',
        'sanitize_callback' => 'hashone_sanitize_text'
    ));

    $wp_customize->add_control('hashone_copyright', array(
        'settings' => 'hashone_copyright',
        'section' => 'hashone_copyright_sec',
        'type' => 'text',
        'label' => esc_html__('Copyright Text', 'hashone')
    ));
}

add_action('customize_register', 'hashone_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hashone_customize_preview_js() {
    wp_enqueue_script('hashone-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20130508', true);
}

add_action('customize_preview_init', 'hashone_customize_preview_js');

function hashone_customizer_script() {
    wp_enqueue_script('hashone-customizer-script', get_template_directory_uri() . '/inc/js/customizer-scripts.js', array('jquery'), '', true);
    wp_enqueue_script('chosen-jquery', get_template_directory_uri() . '/inc/js/chosen.jquery.js', array('jquery'), '1.4.1', true);
    wp_enqueue_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.css');
    wp_enqueue_style('hashone-customizer-chosen', get_template_directory_uri() . '/inc/css/chosen.css');
    wp_enqueue_style('hashone-customizer-style', get_template_directory_uri() . '/inc/css/customizer-style.css');
}

add_action('customize_controls_enqueue_scripts', 'hashone_customizer_script');

if (class_exists('WP_Customize_Control')):

    class Hashone_Switch_Control extends WP_Customize_Control {

        public $type = 'switch';
        public $on_off_label = array();

        public function __construct($manager, $id, $args = array()) {
            $this->on_off_label = $args['on_off_label'];
            parent::__construct($manager, $id, $args);
        }

        public function render_content() {
            ?>
            <span class="customize-control-title">
                <?php echo esc_html($this->label); ?>
            </span>

            <?php if ($this->description) { ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
            <?php } ?>

            <?php
            $switch_class = ($this->value() == 'on') ? 'switch-on' : '';
            $on_off_label = $this->on_off_label;
            ?>
            <div class="onoffswitch <?php echo $switch_class; ?>">
                <div class="onoffswitch-inner">
                    <div class="onoffswitch-active">
                        <div class="onoffswitch-switch"><?php echo esc_html($on_off_label['on']) ?></div>
                    </div>

                    <div class="onoffswitch-inactive">
                        <div class="onoffswitch-switch"><?php echo esc_html($on_off_label['off']) ?></div>
                    </div>
                </div>	
            </div>
            <input <?php $this->link(); ?> type="hidden" value="<?php echo esc_attr($this->value()); ?>"/>
            <?php
        }

    }

    class Hashone_Fontawesome_Icon_Chooser extends WP_Customize_Control {

        public $type = 'icon';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title">
                    <?php echo esc_html($this->label); ?>
                </span>

                <?php if ($this->description) { ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php } ?>

                <div class="hashone-selected-icon">
                    <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
                    <span><i class="fa fa-angle-down"></i></span>
                </div>

                <ul class="hashone-icon-list clearfix">
                    <?php
                    $hashone_font_awesome_icon_array = hashone_font_awesome_icon_array();
                    foreach ($hashone_font_awesome_icon_array as $hashone_font_awesome_icon) {
                        $icon_class = $this->value() == $hashone_font_awesome_icon ? 'icon-active' : '';
                        echo '<li class=' . $icon_class . '><i class="' . $hashone_font_awesome_icon . '"></i></li>';
                    }
                    ?>
                </ul>
                <input type="hidden" value="<?php $this->value(); ?>" <?php $this->link(); ?> />
            </label>
            <?php
        }

    }

    class Hashone_Display_Gallery_Control extends WP_Customize_Control {

        public $type = 'gallery';

        public function render_content() {
            ?>
            <label>
                <span class="customize-control-title">
                    <?php echo esc_html($this->label); ?>
                </span>

                <?php if ($this->description) { ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php } ?>

                <div class="gallery-screenshot clearfix">
                    <?php {
                        $ids = explode(',', $this->value());
                        foreach ($ids as $attachment_id) {
                            $img = wp_get_attachment_image_src($attachment_id, 'thumbnail');
                            echo '<div class="screen-thumb"><img src="' . esc_url($img[0]) . '" /></div>';
                        }
                    }
                    ?>
                </div>

                <input id="edit-gallery" class="button upload_gallery_button" type="button" value="<?php esc_attr_e('Add/Edit Gallery', 'hashone') ?>" />
                <input id="clear-gallery" class="button upload_gallery_button" type="button" value="<?php esc_attr_e('Clear', 'hashone') ?>" />
                <input type="hidden" class="gallery_values" <?php echo $this->link() ?> value="<?php echo esc_attr($this->value()); ?>">
            </label>
            <?php
        }

    }

    class Hashone_Customize_Checkbox_Multiple extends WP_Customize_Control {

        public $type = 'checkbox-multiple';

        public function render_content() {

            if (empty($this->choices))
                return;
            ?>

            <?php if (!empty($this->label)) : ?>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
            <?php endif; ?>

            <?php if (!empty($this->description)) : ?>
                <span class="description customize-control-description"><?php echo esc_html($this->description); ?></span>
            <?php endif; ?>

            <?php $multi_values = !is_array($this->value()) ? explode(',', $this->value()) : $this->value(); ?>

            <ul>
                <?php foreach ($this->choices as $value => $label) : ?>

                    <li>
                        <label>
                            <input type="checkbox" value="<?php echo esc_attr($value); ?>" <?php checked(in_array($value, $multi_values)); ?> /> 
                            <?php echo esc_html($label); ?>
                        </label>
                    </li>

                <?php endforeach; ?>
            </ul>

            <input type="hidden" <?php $this->link(); ?> value="<?php echo esc_attr(implode(',', $multi_values)); ?>" />
            <?php
        }

    }

    class Hashone_Customize_Heading extends WP_Customize_Control {

        public function render_content() {
            ?>

            <?php if (!empty($this->label)) : ?>
                <h3 class="hashone-accordion-section-title"><?php echo esc_html($this->label); ?></h3>
            <?php endif; ?>
            <?php
        }

    }

    class Hashone_Dropdown_Chooser extends WP_Customize_Control {

        public function render_content() {
            if (empty($this->choices))
                return;
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php if ($this->description) { ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php } ?>
                <select class="hs-chosen-select" <?php $this->link(); ?>>
                    <?php
                    foreach ($this->choices as $value => $label)
                        echo '<option value="' . esc_attr($value) . '"' . selected($this->value(), $value, false) . '>' . esc_html($label) . '</option>';
                    ?>
                </select>
            </label>
            <?php
        }

    }

    class Hashone_Dropdown_Multiple_Chooser extends WP_Customize_Control {

        public $type = 'dropdown_multiple_chooser';
        public $placeholder = '';

        public function __construct($manager, $id, $args = array()) {
            $this->placeholder = $args['placeholder'];
            parent::__construct($manager, $id, $args);
        }

        public function render_content() {
            if (empty($this->choices))
                return;
            ?>
            <label>
                <span class="customize-control-title">
                    <?php echo esc_html($this->label); ?>
                </span>

                <?php if ($this->description) { ?>
                    <span class="description customize-control-description">
                        <?php echo wp_kses_post($this->description); ?>
                    </span>
                <?php } ?>

                <select data-placeholder="<?php echo esc_html($this->placeholder); ?>" multiple="multiple" class="hs-chosen-select" <?php $this->link(); ?>>
                    <?php
                    foreach ($this->choices as $value => $label) {
                        $selected = '';
                        if (in_array($value, $this->value())) {
                            $selected = 'selected="selected"';
                        }
                        echo '<option value="' . esc_attr($value) . '"' . $selected . '>' . esc_html($label) . '</option>';
                    }
                    ?>
                </select>
            </label>
            <?php
        }

    }

    class Hashone_Category_Dropdown extends WP_Customize_Control {

        private $cats = false;

        public function __construct($manager, $id, $args = array(), $options = array()) {
            $this->cats = get_categories($options);

            parent::__construct($manager, $id, $args);
        }

        public function render_content() {
            if (!empty($this->cats)) {
                ?>
                <label>
                    <span class="customize-category-select-control"><?php echo esc_html($this->label); ?></span>
                    <select <?php $this->link(); ?>>
                        <?php
                        foreach ($this->cats as $cat) {
                            printf('<option value="%s" %s>%s</option>', esc_attr($cat->term_id), selected($this->value(), $cat->term_id, false), esc_html($cat->name));
                        }
                        ?>
                    </select>
                </label>
                <?php
            }
        }

    }

    class Hashone_Info_Text extends WP_Customize_Control {

        public function render_content() {
            ?>
            <span class="customize-control-title">
                <?php echo esc_html($this->label); ?>
            </span>

            <?php if ($this->description) { ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
                <?php
            }
        }

    }

    endif;


if (class_exists('WP_Customize_Section')):

    /**
     * Pro customizer section.
     *
     * @since  1.0.0
     * @access public
     */
    class Hashone_Customize_Section_Pro extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'pro-section';

        /**
         * Custom button text to output.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_text = '';

        /**
         * Custom pro button URL.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_url = '';

        /**
         * Add custom parameters to pass to the JS via JSON.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function json() {
            $json = parent::json();

            $json['pro_text'] = $this->pro_text;
            $json['pro_url'] = $this->pro_url;

            return $json;
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        protected function render_template() {
            ?>

            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

                <h3 class="accordion-section-title">
                    <# if ( data.title ) { #>
                    {{ data.title }}
                    <# } #>

                    <# if ( data.pro_text && data.pro_url ) { #>
                    <a href="{{ data.pro_url }}" class="button button-primary" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            </li>
            <?php
        }

    }

    endif;

//SANITIZATION FUNCTIONS
function hashone_sanitize_text($input) {
    return wp_kses_post(force_balance_tags($input));
}

function hashone_sanitize_checkbox($input) {
    if ($input == 1) {
        return 1;
    } else {
        return '';
    }
}

function hashone_sanitize_integer($input) {
    if (is_numeric($input)) {
        return intval($input);
    }
}

function hashone_sanitize_choices($input, $setting) {
    global $wp_customize;

    $control = $wp_customize->get_control($setting->id);

    if (array_key_exists($input, $control->choices)) {
        return $input;
    } else {
        return $setting->default;
    }
}

function hashone_sanitize_choices_array($input) {

    $input = array_map('absint', $input);

    return $input;
}
