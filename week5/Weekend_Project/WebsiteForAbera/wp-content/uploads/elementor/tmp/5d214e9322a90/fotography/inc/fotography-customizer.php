<?php 
// Blog Themes Optins 
function fotography_basic_setting($wp_customize){
    // Start Basic Settings Themes Options
    $wp_customize->add_panel('fotography_basic_settings', array(
        'title'         => esc_html__('Basic Settings','fotography'),
        'description'   => '',
        'capability'    => 'edit_theme_options',
        'priority'      => 10,
        'theme_supports'=>'',
    ));

    $wp_customize->get_section('title_tagline' )->panel = 'fotography_basic_settings';

    // Web Page Layout
    $wp_customize->add_section('fotography_webpage_layout', array(
        'title'     => esc_html__('Webpage Layout','fotography'),
        'description' => '',
        'capability' => 'edit_theme_options',
        'priority' => 12,
        'panel'     => 'fotography_basic_settings',
        ));

    $wp_customize->add_setting( 'fotography_webpage_layout', array(
        'default' => 'fullwidth',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fotography_radio_sanitize_webpagelayout',
        'transport' => 'postMessage'
      
    ) );
 
    $wp_customize->add_control('fotography_webpage_layout', array(
      'type' => 'radio',
      'label' => esc_html__('Choose the layout that you want', 'fotography'),
      'section' => 'fotography_webpage_layout',
      'setting' => 'fotography_webpage_layout',
      'choices' => array(
         'fullwidth' => esc_html__('Full Width', 'fotography'),
         'boxed' => esc_html__('Boxed', 'fotography')
      )
   ));
  

//Logo Settings
$wp_customize->get_section('header_image')->title = esc_html__( 'Logo Settings','fotography' );
$wp_customize->get_section('header_image')->priority = 40;
$wp_customize->get_section('header_image')->panel = 'fotography_basic_settings';

//Color Settings
$wp_customize->get_section('colors')->title = esc_html__( 'Themes Colors', 'fotography' );
$wp_customize->get_section('colors')->priority = 50;
$wp_customize->get_section('colors')->panel = 'fotography_basic_settings';

//Background Settings
$wp_customize->get_section('background_image')->title = esc_html__( 'Background Image', 'fotography' );
$wp_customize->get_section('background_image')->priority = 60;
$wp_customize->get_section('background_image')->panel = 'fotography_basic_settings'; 

    //Footer Copy Right Text
   $wp_customize->add_section('fotography_footer_copyright', array(
        'priority' => 70,
        'title' => esc_html__('Footer Copyright', 'fotography'),
        'panel' => 'fotography_basic_settings'
    ));

    $wp_customize->add_setting('fotography_copyright', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_copyright',array(
        'type' => 'textarea',
        'label' => esc_html__('Copyright', 'fotography'),
        'section' => 'fotography_footer_copyright',
        'setting' => 'fotography_copyright',
    ));

    $wp_customize->add_setting('fotography_copyright_show_caption', array(
      'default' => 'yes',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_yesno'
   ));

   $wp_customize->add_control('fotography_copyright_show_caption', array(
      'type' => 'radio',
      'label' => esc_html__('Show Footer Copyright', 'fotography'),
      'section' => 'fotography_footer_copyright',
      'setting' => 'fotography_copyright_show_caption',
      'choices' => array(
         'yes' => esc_html__('Yes', 'fotography'),
         'no' => esc_html__('No', 'fotography'),
      )
   ));

    // Panel HomePage  Settings Themes Options
    $wp_customize->add_panel('fotography_homepage_settings', array(
        'title'         => esc_html__('HomePage Settings','fotography'),
        'description'   => '',
        'capability'    => 'edit_theme_options',
        'priority'      => 20,
        'theme_supports'=>'',
    ));

    // HomePage Slider Settings 

    $wp_customize->add_section('fotography_homepage_slider_setting', array(
        'priority' => 10,
        'title' => esc_html__('Home Slider Settings', 'fotography')
    ));
    
    $wp_customize->add_setting('fotography_homepage_slider_setting_option', array(
      'default' => 'disable',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_enabledisable',
      'transport' => 'postMessage'
   ));

   $wp_customize->add_control('fotography_homepage_slider_setting_option', array(
      'type' => 'radio',
      'label' => esc_html__('Enable Disable Slider', 'fotography'),
      'section' => 'fotography_homepage_slider_setting',
      'setting' => 'fotography_homepage_slider_setting_option',
      'choices' => array(
         'enable' => esc_html__('Enable', 'fotography'),
         'disable' => esc_html__('Disable', 'fotography'),
      )
   ));
   
   //select category for slider
    $categories = get_categories();
    $cats = array();
    $cats[] = 'Select Category';
    foreach($categories as $category){
        $cats[$category->slug] = $category->name;
    }
 
// Main Slider Section

    $wp_customize->add_setting( 'fotography_homepage_advance_slider', array(
      'sanitize_callback' => 'fotography_sanitize_text',
      'default' => '',
      'transport' => 'postMessage'
    ));

    $wp_customize->add_control( new Fotography_Pro_General_Repeater( $wp_customize, 'fotography_homepage_advance_slider', array(
      'label'   => esc_html__('Main Slider Section','fotography'),
      'section' => 'fotography_homepage_slider_setting',
      'description' => esc_html__('Upload Slider Image With Slider Title, Description, Link & Button Text','fotography'),
          'image_control' => true,
          'title_control' => true,               
          'text_control' => true,
          'link_control' => true,
          'subtitle_control' => true
    )));

// End Advance Slider Type 
      
   
   //slider controls
   $wp_customize->add_setting('fotography_homepage_slider_show_controls', array(
      'default' => 'yes',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_yesno',
      //'transport' => 'postMessage'
   ));

   $wp_customize->add_control('fotography_homepage_slider_show_controls', array(
      'type' => 'radio',
      'label' => esc_html__('Show Pager', 'fotography'),
      'section' => 'fotography_homepage_slider_setting',
      'setting' => 'fotography_homepage_slider_show_controls',
      'choices' => array(
         'yes' => esc_html__('Yes', 'fotography'),
         'no' => esc_html__('No', 'fotography'),
      )
   ));
    
    //slider caption
   $wp_customize->add_setting('fotography_homepage_slider_show_caption', array(
      'default' => 'yes',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_yesno',
      'transport' => 'postMessage'
   ));

   $wp_customize->add_control('fotography_homepage_slider_show_caption', array(
      'type' => 'radio',
      'label' => esc_html__('Show Caption', 'fotography'),
      'section' => 'fotography_homepage_slider_setting',
      'setting' => 'fotography_homepage_slider_show_caption',
      'choices' => array(
         'yes' => esc_html__('Yes', 'fotography'),
         'no' => esc_html__('No', 'fotography'),
      )
   ));

    
  
  // HomePage Layout Settings
    $wp_customize->add_section('fotography_homepage_page_layout', array(
        'title'     => esc_html__('HomePage Gallery Section','fotography'),
        'description' => '',
        'capability' => 'edit_theme_options',
        'priority' => 30,
        'panel'     => 'fotography_homepage_settings',
        ));

    $wp_customize->add_setting('fotography_homepage_gallery_main_title', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_gallery_main_title',array(
        'type' => 'text',
        'label' => esc_html__('Gallery Title', 'fotography'),
        'section' => 'fotography_homepage_page_layout',
        'setting' => 'fotography_homepage_gallery_main_title',
    ));

    $wp_customize->add_setting( 'fotography_homepage_page_layout', array(
        'default' => 'default',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fotography_radio_sanitize_web_page_layout',
    ) );
 
    $wp_customize->add_control('fotography_homepage_page_layout', array(
      'type' => 'radio',
      'label' => esc_html__('Choose the HomePage Layout', 'fotography'),
      'section' => 'fotography_homepage_page_layout',
      'setting' => 'fotography_homepage_page_layout',
      'choices' => array(
         'default' => esc_html__('Default Layout', 'fotography'),
         'thumbnail_view' => esc_html__('Sortable Thumb View', 'fotography'),
         'thumbnail_with_slider' => esc_html__('Thumbnail View', 'fotography')
      )
   ));

    // HomePage Post Display Category Settings

    
  
    $wp_customize->add_setting( 'cstmzr_categories' , array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
 
    $wp_customize->add_control(
        new WP_Category_Checkboxes_Control(
            $wp_customize,
            'cstmzr_categories',
            array(
                'label' => esc_html__('Select Gallery Category','fotography'),
                'section' => 'fotography_homepage_page_layout',
                'settings' => 'cstmzr_categories'
            )
        )
    );

    //select Page for Our Services
   $pages = get_pages();
   $fg_pages = array();
   $fg_pages[0] = esc_html__( 'Select Page', 'fotography' );
    foreach ( $pages as $page ) {
       $fg_pages[$page->ID] = $page->post_title;     
    }   

    $wp_customize->add_section('fotography_homepage_counter_section', array(
        'priority' => 20,
        'title' => esc_html__('Counter Section', 'fotography'),
        'panel' => 'fotography_homepage_settings',
    ));

    $wp_customize->add_setting('fotography_homepage_about_count_option', array(
      'default' => 'enable',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_enabledisable',
      'transport' => 'postMessage'
    ));

    $wp_customize->add_control('fotography_homepage_about_count_option', array(
      'type' => 'radio',
      'label' => esc_html__('Enable/Disable About Count Section', 'fotography'),
      'section' => 'fotography_homepage_counter_section',
      'setting' => 'fotography_homepage_about_count_option',
      'choices' => array(
         'enable' => esc_html__('Enable', 'fotography'),
         'disable' => esc_html__('Disable', 'fotography'),
      )
    ));

    $wp_customize->add_setting('fotography_homepage_about_counter_one', array(
        'default' => '',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_about_counter_one',array(
        'type' => 'text',
        'label' => esc_html__('Counter One', 'fotography'),
        'section' => 'fotography_homepage_counter_section',
        'setting' => 'fotography_homepage_about_counter_one',
    ));

    $wp_customize->add_setting('fotography_homepage_about_title_one', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_about_title_one',array(
        'type' => 'text',
        'label' => esc_html__('Title One', 'fotography'),
        'section' => 'fotography_homepage_counter_section',
        'setting' => 'fotography_homepage_about_title_one',
    ));

    $wp_customize->add_setting('fotography_homepage_about_icon_one', array(
        'default' => 'fa-user-secret',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new Fotography_Customize_Icons_Control( $wp_customize, 'fotography_homepage_about_icon_one', array(
        'type'      => 'fotography_icons',                  
        'label'     => esc_html__( 'Icon One', 'fotography' ),
        'description'   => esc_html__( 'Choose the icon for counter', 'fotography' ),
        'section'   => 'fotography_homepage_counter_section',
        'setting' => 'fotography_homepage_about_icon_one',
    ) ) );


    $wp_customize->add_setting('fotography_homepage_about_counter_two', array(
        'default' => '',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_about_counter_two',array(
        'type' => 'text',
        'label' => esc_html__('Counter Two', 'fotography'),
        'section' => 'fotography_homepage_counter_section',
        'setting' => 'fotography_homepage_about_counter_two',
    ));

    $wp_customize->add_setting('fotography_homepage_about_title_two', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_about_title_two',array(
        'type' => 'text',
        'label' => esc_html__('Title Two', 'fotography'),
        'section' => 'fotography_homepage_counter_section',
        'setting' => 'fotography_homepage_about_title_two',
    ));

    $wp_customize->add_setting('fotography_homepage_about_icon_two', array(
        'default' => 'fa-users',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new Fotography_Customize_Icons_Control( $wp_customize, 'fotography_homepage_about_icon_two', array(
        'type'      => 'fotography_icons',                  
        'label'     => esc_html__( 'Icon Two', 'fotography' ),
        'description'   => esc_html__( 'Choose the icon for counter', 'fotography' ),
        'section'   => 'fotography_homepage_counter_section',
        'setting' => 'fotography_homepage_about_icon_two',
    ) ) );


    $wp_customize->add_setting('fotography_homepage_about_counter_three', array(
        'default' => '',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_about_counter_three',array(
        'type' => 'text',
        'label' => esc_html__('Counter Three', 'fotography'),
        'section' => 'fotography_homepage_counter_section',
        'setting' => 'fotography_homepage_about_counter_three',
    ));

    $wp_customize->add_setting('fotography_homepage_about_title_three', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_about_title_three',array(
        'type' => 'text',
        'label' => esc_html__('Title Three', 'fotography'),
        'section' => 'fotography_homepage_counter_section',
        'setting' => 'fotography_homepage_about_title_three',
    ));

    $wp_customize->add_setting('fotography_homepage_about_icon_three', array(
        'default' => 'fa-tree',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new Fotography_Customize_Icons_Control( $wp_customize, 'fotography_homepage_about_icon_three', array(
        'type'      => 'fotography_icons',                  
        'label'     => esc_html__( 'Icon Three', 'fotography' ),
        'description'   => esc_html__( 'Choose the icon for counter', 'fotography' ),
        'section'   => 'fotography_homepage_counter_section',
        'setting' => 'fotography_homepage_about_icon_three',
    ) ) );

    $wp_customize->add_setting('fotography_homepage_about_counter_four', array(
        'default' => '',
        'sanitize_callback' => 'absint',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_about_counter_four',array(
        'type' => 'text',
        'label' => esc_html__('Counter Four', 'fotography'),
        'section' => 'fotography_homepage_counter_section',
        'setting' => 'fotography_homepage_about_counter_four',
    ));

    $wp_customize->add_setting('fotography_homepage_about_title_four', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_about_title_four',array(
        'type' => 'text',
        'label' => esc_html__('Title Four', 'fotography'),
        'section' => 'fotography_homepage_counter_section',
        'setting' => 'fotography_homepage_about_title_four',
    ));

    $wp_customize->add_setting('fotography_homepage_about_icon_four', array(
        'default' => 'fa-laptop',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new Fotography_Customize_Icons_Control( $wp_customize, 'fotography_homepage_about_icon_four', array(
        'type'      => 'fotography_icons',                  
        'label'     => esc_html__( 'Icon Four', 'fotography' ),
        'description'   => esc_html__( 'Choose the icon for counter', 'fotography' ),
        'section'   => 'fotography_homepage_counter_section',
        'setting' => 'fotography_homepage_about_icon_four',
    ) ) );


    // HomePage About Section Settings   
    $wp_customize->add_section('fotography_homepage_about', array(
        'priority' => 21,
        'title' => esc_html__('About Section', 'fotography'),
        'panel' => 'fotography_homepage_settings',
    ));
    
    $wp_customize->add_setting('fotography_homepage_about_option', array(
      'default' => 'enable',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_enabledisable',
      'transport' => 'postMessage'
   ));

   $wp_customize->add_control('fotography_homepage_about_option', array(
      'type' => 'radio',
      'label' => esc_html__('Enable/Disable About Section', 'fotography'),
      'section' => 'fotography_homepage_about',
      'setting' => 'fotography_homepage_about_option',
      'choices' => array(
         'enable' => esc_html__('Enable', 'fotography'),
         'disable' => esc_html__('Disable', 'fotography'),
      )
   ));  

  
    $wp_customize->add_setting('fotography_homepage_about_page', array(
        'default'        => 0,
        'sanitize_callback' => 'fotography_category',
    ));
    $wp_customize->add_control( 'fotography_homepage_about_page', array(
        'settings' => 'fotography_homepage_about_page',
        'label'   => esc_html__('Select Page For About Section','fotography'),
        'section'  => 'fotography_homepage_about',
        'type'    => 'select',
        'choices' => $fg_pages,
    ));

    // HomePage Our Services Settings   
   $wp_customize->add_section('fotography_homepage_our_services', array(
        'priority' => 40,
        'title' => esc_html__('Our Services Section', 'fotography'),
        'panel' => 'fotography_homepage_settings',
    ));
    
    $wp_customize->add_setting('fotography_homepage_our_service_option', array(
      'default' => 'enable',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_enabledisable',
      'transport' => 'postMessage'
   ));

   $wp_customize->add_control('fotography_homepage_our_service_option', array(
      'type' => 'radio',
      'label' => esc_html__('Enable Disable Services Section', 'fotography'),
      'section' => 'fotography_homepage_our_services',
      'setting' => 'fotography_homepage_our_service_option',
      'choices' => array(
         'enable' => esc_html__('Enable', 'fotography'),
         'disable' => esc_html__('Disable', 'fotography'),
      )
   ));

   $wp_customize->add_setting('fotography_homepage_our_service_title', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_our_service_title',array(
        'type' => 'text',
        'label' => esc_html__('Our Services Title', 'fotography'),
        'section' => 'fotography_homepage_our_services',
        'setting' => 'fotography_homepage_our_service_title',
    ));
     
    $wp_customize->add_setting('fotography_homepage_services_page_one', array(
        'default'        => 0,
        'sanitize_callback' => 'fotography_category',
    ));
    $wp_customize->add_control( 'fotography_homepage_services_page_one', array(
        'settings' => 'fotography_homepage_services_page_one',
        'label'   => esc_html__('Select Page For Services Area One','fotography'),
        'section'  => 'fotography_homepage_our_services',
        'type'    => 'select',
        'choices' => $fg_pages,
    ));

    $wp_customize->add_setting('fotography_homepage_services_page_two', array(
        'default'        => 0,
        'sanitize_callback' => 'fotography_category',
    ));
    $wp_customize->add_control( 'fotography_homepage_services_page_two', array(
        'settings' => 'fotography_homepage_services_page_two',
        'label'   => esc_html__('Select Page For Services Area Two','fotography'),
        'section'  => 'fotography_homepage_our_services',
        'type'    => 'select',
        'choices' => $fg_pages,
    ));

    $wp_customize->add_setting('fotography_homepage_services_page_three', array(
        'default'        => 0,
        'sanitize_callback' => 'fotography_category',
    ));
    $wp_customize->add_control( 'fotography_homepage_services_page_three', array(
        'settings' => 'fotography_homepage_services_page_three',
        'label'   => esc_html__('Select Page For Services Area Three','fotography'),
        'section'  => 'fotography_homepage_our_services',
        'type'    => 'select',
        'choices' => $fg_pages,
    ));

    // HomePage Blogs Section
    $wp_customize->add_section('fotography_homepage_blog_section', array(
        'priority' => 40,
        'title' => esc_html__('Blogs Section', 'fotography'),
        'panel' => 'fotography_homepage_settings',
    ));
    
    $wp_customize->add_setting('fotography_homepage_blogs_option', array(
      'default' => 'enable',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_enabledisable',
      'transport' => 'postMessage'
   ));

   $wp_customize->add_control('fotography_homepage_blogs_option', array(
      'type' => 'radio',
      'label' => esc_html__('Enable Disable Blogs Section', 'fotography'),
      'section' => 'fotography_homepage_blog_section',
      'setting' => 'fotography_homepage_blogs_option',
      'choices' => array(
         'enable' => esc_html__('Enable', 'fotography'),
         'disable' => esc_html__('Disable', 'fotography'),
      )
   ));

   $wp_customize->add_setting('fotography_homepage_blogs_title', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_blogs_title',array(
        'type' => 'text',
        'label' => esc_html__('Enter Blogs Title', 'fotography'),
        'section' => 'fotography_homepage_blog_section',
        'setting' => 'fotography_homepage_blogs_title',
    ));

   $wp_customize->add_setting('fotography_homepage_blog_cat', array(
        'default'        =>  0,
        'sanitize_callback' => 'fotography_category',
    ));
    $wp_customize->add_control( 'fotography_homepage_blog_cat', array(
        'settings' => 'fotography_homepage_blog_cat',
        'label'   => esc_html__('Select a Category for Blogs','fotography'),
        'section'  => 'fotography_homepage_blog_section',
        'type'    => 'select',
        'choices' => $cats,
    )); 
    // HomePage Call To Action Settings   
   $wp_customize->add_section('fotography_homepage_call_action', array(
        'priority' => 40,
        'title' => esc_html__('Call to Action Section', 'fotography'),
        'panel' => 'fotography_homepage_settings',
    ));
    
    $wp_customize->add_setting('fotography_homepage_call_action_option', array(
      'default' => 'enable',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_enabledisable',
      'transport' => 'postMessage'
   ));

   $wp_customize->add_control('fotography_homepage_call_action_option', array(
      'type' => 'radio',
      'label' => esc_html__('Enable/Disable Quick Section', 'fotography'),
      'section' => 'fotography_homepage_call_action',
      'setting' => 'fotography_homepage_call_action_option',
      'choices' => array(
         'enable' => esc_html__('Enable', 'fotography'),
         'disable' => esc_html__('Disable', 'fotography'),
      )
   ));

   $wp_customize->add_setting('fotography_homepage_call_action_image', array(
        'default' => '',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'fotography_homepage_call_action_image', array(
        'label' => esc_html__('BackGround Image', 'fotography'),
        'section' => 'fotography_homepage_call_action',
        'setting' => 'fotography_homepage_call_action_image',
        //'description' => esc_html__( 'Manage Newsletter & Call To Action Section GoTo Backend Click on Appearance >> Widget and Add Widget in HomePage Left Widget & HomePage Right Widget', 'fotography' ),
    )));

    $wp_customize->add_setting('fotography_homepage_call_action_title', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_call_action_title',array(
        'type' => 'text',
        'label' => esc_html__('Call To Action Title', 'fotography'),
        'section' => 'fotography_homepage_call_action',
        'setting' => 'fotography_homepage_call_action_title',
    ));

    $wp_customize->add_setting('fotography_homepage_call_action_sub_title', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_call_action_sub_title',array(
        'type' => 'textarea',
        'label' => esc_html__('Call To Action Sub Title', 'fotography'),
        'section' => 'fotography_homepage_call_action',
        'setting' => 'fotography_homepage_call_action_sub_title',
    ));

    $wp_customize->add_setting('fotography_homepage_call_action_button_link', array(
        'default' => '',
        'sanitize_callback' => 'esc_textarea',
        //'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_call_action_button_link',array(
        'type' => 'text',
        'label' => esc_html__('Call To Action Button Link', 'fotography'),
        'section' => 'fotography_homepage_call_action',
        'setting' => 'fotography_homepage_call_action_button_link',
    ));

    $wp_customize->add_setting('fotography_homepage_call_action_button_name', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_call_action_button_name',array(
        'type' => 'text',
        'label' => esc_html__('Call To Action Button Name', 'fotography'),
        'section' => 'fotography_homepage_call_action',
        'setting' => 'fotography_homepage_call_action_button_name',
    ));
  
     // HomePage Call To Action Settings   
   $wp_customize->add_section('fotography_homepage_quick_contact', array(
        'priority' => 40,
        'title' => esc_html__('Quick Contact Info', 'fotography'),
        'panel' => 'fotography_homepage_settings',
    ));
    
    $wp_customize->add_setting('fotography_homepage_quick_contact_info', array(
      'default' => 'enable',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_enabledisable',
      'transport' => 'postMessage'
   ));

   $wp_customize->add_control('fotography_homepage_quick_contact_info', array(
      'type' => 'radio',
      'label' => esc_html__('Enable/Disable Quick Contact Info Section', 'fotography'),
      'section' => 'fotography_homepage_quick_contact',
      'setting' => 'fotography_homepage_quick_contact_info',
      'choices' => array(
         'enable' => esc_html__('Enable', 'fotography'),
         'disable' => esc_html__('Disable', 'fotography'),
      )
   ));

    $wp_customize->add_setting('fotography_homepage_quick_email_icon', array(
        'default' => 'fa-envelope',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new Fotography_Customize_Icons_Control( $wp_customize, 'fotography_homepage_quick_email_icon', array(
        'type'      => 'fotography_icons',                  
        'label'     => esc_html__( 'Email Icon', 'fotography' ),
        'description'   => esc_html__( 'Choose the icon for email', 'fotography' ),
        'section'   => 'fotography_homepage_quick_contact',
        'setting' => 'fotography_homepage_quick_email_icon',
    ) ) );

    $wp_customize->add_setting('fotography_homepage_quick_email', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_quick_email',array(
        'type' => 'text',
        'label' => esc_html__('Email Address', 'fotography'),
        'section' => 'fotography_homepage_quick_contact',
        'setting' => 'fotography_homepage_quick_email',
    ));

    $wp_customize->add_setting('fotography_homepage_quick_twitter_icon', array(
        'default' => 'fa-twitter',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new Fotography_Customize_Icons_Control( $wp_customize, 'fotography_homepage_quick_twitter_icon', array(
        'type'      => 'fotography_icons',                  
        'label'     => esc_html__( 'Twitter Icon', 'fotography' ),
        'description'   => esc_html__( 'Choose the icon for Twitter', 'fotography' ),
        'section'   => 'fotography_homepage_quick_contact',
        'setting' => 'fotography_homepage_quick_twitter_icon',
    ) ) );

    $wp_customize->add_setting('fotography_homepage_quick_twitter', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_quick_twitter',array(
        'type' => 'text',
        'label' => esc_html__('Twitter UserName', 'fotography'),
        'section' => 'fotography_homepage_quick_contact',
        'setting' => 'fotography_homepage_quick_twitter',
    ));

    $wp_customize->add_setting('fotography_homepage_quick_phone_icon', array(
        'default' => 'fa-phone-square',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( new Fotography_Customize_Icons_Control( $wp_customize, 'fotography_homepage_quick_phone_icon', array(
        'type'      => 'fotography_icons',                  
        'label'     => esc_html__( 'Phone Icon', 'fotography' ),
        'description'   => esc_html__( 'Choose the icon for Phone', 'fotography' ),
        'section'   => 'fotography_homepage_quick_contact',
        'setting' => 'fotography_homepage_quick_phone_icon',
    ) ) );

    $wp_customize->add_setting('fotography_homepage_quick_phone', array(
        'default' => '',
        'sanitize_callback' => 'fotography_sanitize_text',
        'transport' => 'postMessage'
    ));
    
    $wp_customize->add_control('fotography_homepage_quick_phone',array(
        'type' => 'text',
        'label' => esc_html__('Phone Number', 'fotography'),
        'section' => 'fotography_homepage_quick_contact',
        'setting' => 'fotography_homepage_quick_phone',
    ));

   //Archive Gallery Settings section
   
    $wp_customize->add_section('fotography_gallery_archive_section', array(
        'priority' => 21,
        'title' => esc_html__('Archive Layout Settings', 'fotography'),
    ));

    $wp_customize->add_setting( 'fotography_archive_page_layout',  array(
		'default'       =>      'rightsidebar',
		'sanitize_callback' => 'fotography_archive_page_layouts'
    ));

    $imagepath =  get_template_directory_uri() . '/images/'; 

    $wp_customize->add_control( new WP_Customize_Radioimage_Control( $wp_customize, 'fotography_archive_page_layout', array(
            'section'       =>   'fotography_gallery_archive_section',
            'label'         =>    esc_html__('Archive/Blogs Page Layouts', 'fotography'),
            'type'          =>    'radioimage',
            'choices'       =>  array( 
				'leftsidebar' => $imagepath.'left-sidebar.png',  
				'rightsidebar' => $imagepath.'right-sidebar.png', 
				'nosidebar' => $imagepath.'no-sidebar.png',
            )
    )));
    

// Gallery Page Section

   $wp_customize->add_section('fotography_gallery_section', array(
        'priority' => 20,
        'title' => esc_html__('Gallery Page Template Settings', 'fotography'),
  ));

   $wp_customize->add_setting( 'fotography_gallery_page_section', array(
        'default' => 'gridview',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fotography_radio_sanitize_gallery_web_page_layout',
    ) );
 
    $wp_customize->add_control('fotography_gallery_page_section', array(
      'type' => 'radio',
      'label' => esc_html__('Choose the Gallery Page Layout', 'fotography'),
      'section' => 'fotography_gallery_section',
      'setting' => 'fotography_gallery_page_section',
      'choices' => array(
         'gridview' => esc_html__('Grid View', 'fotography'),
         'sortable' => esc_html__('Sortable Thumb View', 'fotography'),         
         'mediumthumbslistview' => esc_html__('Thumbs List View', 'fotography'),
         'largethumbslistview' => esc_html__('Large Thumbs List View', 'fotography'),         
      )
   ));


   $wp_customize->add_setting( 'cstmzr_categories_gallery', array(
       'default' => '',
       'sanitize_callback' => 'sanitize_text_field',
   )  );
   
   $wp_customize->add_control(
       new WP_Category_Checkboxes_Control(
           $wp_customize,
           'cstmzr_categories_gallery',
           array(
               'label' => esc_html__('Select the Category for Gallery Page','fotography'),
               'section' => 'fotography_gallery_section',
               'settings' => 'cstmzr_categories_gallery'
           )
       )
   );   

    
    $wp_customize->add_setting('fotography_gallery_author_section', array(
      'default' => 'no',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_yesno',
   ));

   $wp_customize->add_control('fotography_gallery_author_section', array(
      'type' => 'radio',
      'label' => esc_html__('Author Show/Hide Section', 'fotography'),
      'section' => 'fotography_gallery_section',
      'setting' => 'fotography_gallery_author_section',
      'choices' => array(
         'yes' => esc_html__('Yes', 'fotography'),
         'no' => esc_html__('No', 'fotography'),
      )
   ));

   $wp_customize->add_setting('fotography_gallery_postdate_section', array(
      'default' => 'no',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_yesno',
   ));

   $wp_customize->add_control('fotography_gallery_postdate_section', array(
      'type' => 'radio',
      'label' => esc_html__('PostDate Show/Hide Section', 'fotography'),
      'section' => 'fotography_gallery_section',
      'setting' => 'fotography_gallery_postdate_section',
      'choices' => array(
         'yes' => esc_html__('Yes', 'fotography'),
         'no' => esc_html__('No', 'fotography'),
      )
   ));

   $wp_customize->add_setting('fotography_gallery_meta_category_section', array(
      'default' => 'yes',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_yesno',
   ));

   $wp_customize->add_control('fotography_gallery_meta_category_section', array(
      'type' => 'radio',
      'label' => esc_html__('Category Show/Hide Section', 'fotography'),
      'section' => 'fotography_gallery_section',
      'setting' => 'fotography_gallery_meta_category_section',
      'choices' => array(
         'yes' => esc_html__('Yes', 'fotography'),
         'no' => esc_html__('No', 'fotography'),
      )
   ));

   $wp_customize->add_setting('fotography_gallelry_desc_section', array(
      'default' => '50',
      'sanitize_callback' => 'fotography_sanitize_number',
   ));

   $wp_customize->add_control('fotography_gallelry_desc_section', array(
      'type' => 'number',
      'label' => esc_html__('Description Word Limit', 'fotography'),
      'section' => 'fotography_gallery_section',
      'setting' => 'fotography_gallelry_desc_section',
   )); 
    
   // Blogs Settings section

    $wp_customize->add_section('fotography_blog_archive_section', array(
        'priority' => 20,
        'title' => esc_html__('Blogs Page Layout Settings', 'fotography'),
  ));

   $wp_customize->add_setting( 'fotography_blog_page_archive_section', array(
        'default' => 'mediumthumbslistview',
        'capability' => 'edit_theme_options',
        'sanitize_callback' => 'fotography_radio_sanitize_archive_web_page_layout',
    ) );
 
    $wp_customize->add_control('fotography_blog_page_archive_section', array(
      'type' => 'radio',
      'label' => esc_html__('Choose the Blogs Page Layout', 'fotography'),
      'section' => 'fotography_blog_archive_section',
      'setting' => 'fotography_blog_page_archive_section',
      'choices' => array(            
         'mediumthumbslistview' => esc_html__('Medium Thumbs List View', 'fotography'),
         'largethumbslistview' => esc_html__('Large Thumbs List View', 'fotography')
      )
   ));
   
    $wp_customize->add_setting('fotography_blog_author_archive_section', array(
      'default' => 'yes',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_yesno',
   ));

   $wp_customize->add_control('fotography_blog_author_archive_section', array(
      'type' => 'radio',
      'label' => esc_html__('Author Show/Hide Section', 'fotography'),
      'section' => 'fotography_blog_archive_section',
      'setting' => 'fotography_blog_author_archive_section',
      'choices' => array(
         'yes' => esc_html__('Yes', 'fotography'),
         'no' => esc_html__('No', 'fotography'),
      )
   ));

   $wp_customize->add_setting('fotography_blog_postdate_archive_section', array(
      'default' => 'yes',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_yesno',
   ));

   $wp_customize->add_control('fotography_blog_postdate_archive_section', array(
      'type' => 'radio',
      'label' => esc_html__('PostDate Show/Hide Section', 'fotography'),
      'section' => 'fotography_blog_archive_section',
      'setting' => 'fotography_blog_postdate_archive_section',
      'choices' => array(
         'yes' => esc_html__('Yes', 'fotography'),
         'no' => esc_html__('No', 'fotography'),
      )
   ));

   $wp_customize->add_setting('fotography_blog_metacategory_archive_section', array(
      'default' => 'yes',
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'fotography_radio_sanitize_yesno',
   ));

   $wp_customize->add_control('fotography_blog_metacategory_archive_section', array(
      'type' => 'radio',
      'label' => esc_html__('Meta Category Show/Hide Section', 'fotography'),
      'section' => 'fotography_blog_archive_section',
      'setting' => 'fotography_blog_metacategory_archive_section',
      'choices' => array(
         'yes' => esc_html__('Yes', 'fotography'),
         'no' => esc_html__('No', 'fotography'),
      )
   ));
   

   $wp_customize->add_setting('fotography_blog_description_archive_section', array(
      'default' => '50',
      'sanitize_callback' => 'fotography_sanitize_number',
   ));

   $wp_customize->add_control('fotography_blog_description_archive_section', array(
      'type' => 'number',
      'label' => esc_html__('Blog Description Word Limit', 'fotography'),
      'section' => 'fotography_blog_archive_section',
      'setting' => 'fotography_blog_description_archive_section',
   ));

  $fotography_fontlists = array(
    'Lato' => 'Lato',
    'Bad Script' => 'Bad Script',
    'Open Sans' => 'Open Sans',
    'Open Sans Condensed' => 'Open Sans Condensed',
    'Poppins' => 'Poppins',
    'Raleway' => 'Raleway',
    'Josefin Slab' => 'Josefin Slab',
    'Abril Fatface' => 'Abril Fatface',
    'PT Sans' => 'PT Sans',
  );


 /** Typography Settings **/
 $wp_customize->add_section('fotography_typography_section', array(
      'priority' => 21,
      'title' => esc_html__('Typography Settings', 'fotography'),
  ));

/** Body Typography **/
$wp_customize->add_setting( 'fotography_body_font', array( 'default' => 'Open Sans', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'fotography_body_font', array(
  'settings' => 'fotography_body_font',
  'label'   => esc_html__( 'Body Font.', 'fotography'),
  'description'   => esc_html__( 'Set the font for the body.', 'fotography'),
  'section'  => 'fotography_typography_section',
  'type'    => 'select',
  'choices' => $fotography_fontlists,
));

/** Heading Typography **/
$wp_customize->add_setting( 'fotography_heading_font', array( 'default' => 'Open Sans', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'fotography_heading_font', array(
  'settings' => 'fotography_heading_font',
  'label'   => esc_html__( 'Heading Font.', 'fotography'),
  'description'   => esc_html__( 'Set the font for the Heading (1-6).', 'fotography'),
  'section'  => 'fotography_typography_section',
  'type'    => 'select',
  'choices' => $fotography_fontlists,
));

/** Section Title Typography **/
$wp_customize->add_setting( 'fotography_section_title_font', array( 'default' => 'Bad Script', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'fotography_section_title_font', array(
  'settings' => 'fotography_section_title_font',
  'label'   => esc_html__( 'Section Title Font.', 'fotography'),
  'description'   => esc_html__( 'Set the font family for Section Titles.', 'fotography'),
  'section'  => 'fotography_typography_section',
  'type'    => 'select',
  'choices' => $fotography_fontlists,
));

/** Menu Title Typography **/
$wp_customize->add_setting( 'fotography_menu_font', array( 'default' => 'Open Sans Condensed', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'fotography_menu_font', array(
  'settings' => 'fotography_menu_font',
  'label'   => esc_html__( 'Menu Font.', 'fotography'),
  'description'   => esc_html__( 'Set the font family for Menu.', 'fotography'),
  'section'  => 'fotography_typography_section',
  'type'    => 'select',
  'choices' => $fotography_fontlists,
));

     
// Text
    function fotography_sanitize_text( $input ) {
        return wp_kses_post( force_balance_tags( $input ) );
    }

    function fotography_sanitize_text_css( $input ) {
        return  $input;
    }

// Number
    function fotography_sanitize_number( $input ) {
    $output = intval($input);
      return $output;
  } 

  function fotography_sanitize_number_float( $input ) {
    $output = floatval($input);
      return $output;
  } 

// Category   

function fotography_category( $input, $setting ) {
    global $wp_customize;
 
    $control = $wp_customize->get_control( $setting->id );
 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

// Page Layout
   function fotography_radio_sanitize_webpagelayout($input) {
      $valid_keys = array(
         'fullwidth' => esc_html__('Full Width', 'fotography'),
         'boxed' => esc_html__('Boxed', 'fotography')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }

   function fotography_radio_sanitize_our_team($input) {
      $valid_keys = array(
         'gridview' => esc_html__('Grid View', 'fotography'),         
         'mediumthumbslistview' => esc_html__('List View', 'fotography')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }

   function fotography_layout_sanitize_our_team($input) {
      $valid_keys = array(
         'gridview' => esc_html__('Grid View', 'fotography'),         
         'teslistview' => esc_html__('List View', 'fotography')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }
   
    function fotography_radio_sanitize_numcol_web_page_layout($input) {
      $valid_keys = array(
         '1' => esc_html__('1', 'fotography'),         
         '2' => esc_html__('2', 'fotography'),
         '3' => esc_html__('3', 'fotography'),
         '4' => esc_html__('4', 'fotography')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }

   

   function fotography_radio_sanitize_web_page_layout($input) {
      $valid_keys = array(
         'default' => esc_html__('Default Layout', 'fotography'),
         'thumbnail_view' => esc_html__('Thumbnail View', 'fotography'),
         'thumbnail_with_slider' => esc_html__('Gallery Images With Slider', 'fotography')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }

   function fotography_radio_sanitize_archive_web_page_layout($input) {
      $valid_keys = array(
         'gridview' => esc_html__('Grid View', 'fotography'),
         'largethumbslistview' => esc_html__('Large Thumbs List View', 'fotography'),
         'mediumthumbslistview' => esc_html__('Medium Thumbs List View', 'fotography')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }


   	function fotography_archive_page_layouts($input) {
    $imagepath =  get_template_directory_uri() . '/images/';
      $valid_keys = array(
        'leftsidebar' => $imagepath.'left-sidebar.png',  
		'rightsidebar' => $imagepath.'right-sidebar.png', 
        'nosidebar' => $imagepath.'no-sidebar.png',
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }


   function fotography_radio_sanitize_gallery_web_page_layout($input) {
      $valid_keys = array(
         'gridview' => esc_html__('Grid View', 'fotography'),
         'sortable' => esc_html__('Sortable Thumb View', 'fotography'),         
         'mediumthumbslistview' => esc_html__('Thumbs List View', 'fotography'),
         'largethumbslistview' => esc_html__('Large Thumbs List View', 'fotography')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }

   function fotography_radio_mode($input) {
      $valid_keys = array(
         'fade' => esc_html__('Fade', 'fotography'),
         'horizontal' => esc_html__('Slide Horizontal', 'fotography'),
         'vertical' => esc_html__('Slide Vertical', 'fotography') 
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }
   


   function fotography_radio_sanitize_enabledisable($input) {
      $valid_keys = array(
        'enable'=>esc_html__('Enable', 'fotography'),
        'disable'=>esc_html__('Disable', 'fotography')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }

   function fotography_radio_sanitize_yesno($input) {
      $valid_keys = array(
        'yes'=>esc_html__('Yes', 'fotography'),
        'no'=>esc_html__('No', 'fotography')
      );
      if ( array_key_exists( $input, $valid_keys ) ) {
         return $input;
      } else {
         return '';
      }
   }

   // checkbox sanitization
   function fotography_checkbox_sanitize($input) {
      if ( $input == 1 ) {
         return 1;
      } else {
         return '';
      }
   }
}
add_action('customize_register','fotography_basic_setting');