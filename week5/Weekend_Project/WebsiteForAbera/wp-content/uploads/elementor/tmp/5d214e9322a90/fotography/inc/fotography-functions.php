<?php
/**
 * FotoGraphy functions and definitions
 *
 * @package FotoGraphy
 */

/**
 * Enqueue scripts Admin Section.
 */
if ( ! function_exists( 'fotography_admin_script' ) ) :
    function fotography_admin_script() {
        wp_enqueue_script('fotography-script', get_template_directory_uri() . '/inc/js/custom.js', array('jquery'),'20151217',true);
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css' );
        wp_enqueue_style('fotography-custom-style', get_template_directory_uri() . '/inc/css/custom.css');
    }
    add_action('admin_enqueue_scripts', 'fotography_admin_script');
endif;


/**
 * Enqueue scripts Customize Controls Section.
**/
if ( ! function_exists( 'fotography_customize_controls_enqueue_scripts' ) ) :
    function fotography_customize_controls_enqueue_scripts() {
        wp_enqueue_script('fotography-customize-custom', get_template_directory_uri() . '/inc/js/customize_custom.js', array( 'jquery'),'20151217',true);
    }
add_action('customize_controls_enqueue_scripts', 'fotography_customize_controls_enqueue_scripts');
endif;


/* ---------------------Website layout--------------------------------- */

if ( ! function_exists( 'fotography_website_layout_class' ) ) :
function fotography_website_layout_class($classes) {
    $website_layout = get_theme_mod('fotography_webpage_layout','fullwidth');
    if ($website_layout == 'boxed') {

        $classes[] = 'boxed-layout';
    } else {
        $classes[] = 'fullwidth-layout';
    }
   // return $classes;
    $noslider = get_theme_mod('fotography_homepage_slider_setting_option');
    if($noslider == 'disable'){
        $classes[] = 'no-slider';
    }
    return $classes;
}
add_filter('body_class', 'fotography_website_layout_class');
endif;

/* ---------------------Bx Slider Settings Section--------------------------------- */
if ( ! function_exists( 'fotography_bxslider_setting' ) ) :
function fotography_bxslider_setting() {
    $fotography_controls = (get_theme_mod('fotography_homepage_slider_show_controls','yes')=='yes') ? 'true' : 'false';
    $fotography_caption = (get_theme_mod('fotography_homepage_slider_show_caption','yes')=='yes') ? 'true' : 'false';    
?>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#slides').bxSlider({
                pager: <?php echo esc_attr($fotography_controls); ?>,
                captions: <?php echo esc_attr($fotography_caption); ?>,
                mode:'fade',
                auto:true,
                controls: false,
                adaptiveHeight : true
            });
        });
    </script>
    <?php
}
add_filter('wp_footer', 'fotography_bxslider_setting');
endif;

/* * *************************Word Count Limit****************************************** */
if ( ! function_exists( 'custom_excerpt_more' ) ) :
    function fotography_custom_excerpt_more( $more ) {
    	return '...';
    }
    add_filter( 'excerpt_more', 'fotography_custom_excerpt_more' );
endif;
if ( ! function_exists( 'fotography_word_count' ) ) :
    function fotography_word_count($string, $limit) {
        
        $striped_content = strip_tags($string);
        $striped_content = strip_shortcodes($striped_content);

        $words = explode(' ', $striped_content);
        return implode(' ', array_slice($words, 0, $limit));
    }
endif;

if ( ! function_exists( 'fotography_letter_count' ) ) :
    function fotography_letter_count($content, $limit) {
        $striped_content = strip_tags($content);
        $striped_content = strip_shortcodes($striped_content);
        $limit_content = mb_substr($striped_content, 0, $limit);
        if ($limit_content < $content) {
            $limit_content .= "...";
        }
        return $limit_content;
    }
endif;

/* -----------------------Add Grid In Post Class---------------------------------- */
if ( ! function_exists( 'fotography_grid_class' ) ) :
    function fotography_grid_class($classes) {
        $blog_grid = esc_attr(get_theme_mod('fotography_blog_grid_archive_section'));
        $blog_layout = esc_attr(get_theme_mod('fotography_blog_page_archive_section'));
        if ($blog_layout == 'gridview') {
            if ($blog_grid == '1') {
                $classes[] = 'one';
            } elseif ($blog_grid == '2') {
                $classes[] = 'two';
            } elseif ($blog_grid == '3') {
                $classes[] = 'three';
            } else {
                $classes[] = 'four';
            }
        }
        return $classes;
    }
add_filter('post_class', 'fotography_grid_class');
endif;

/**
 * Implement the custom metabox feature
 */
require get_template_directory() . '/inc/custom-metabox.php';

/**
 * Load Customizer Themes Options
 */
require get_template_directory() . '/inc/fotography-customizer.php';

/**
 * Load Widget Area
 */
require get_template_directory() . '/inc/fotography-widgets.php';

/* -------------------------Customizer Control for Category------------------------------ */

if (class_exists('WP_Customize_Control')) {
    class WP_Category_Checkboxes_Control extends WP_Customize_Control {
        public $type = 'category-checkboxes';
        public function render_content() {
            echo '<span class="customize-control-title">' . esc_html($this->label) . '</span>';
            foreach (get_categories() as $category) {
                echo '<label><input type="checkbox" name="category-' . esc_attr($category->term_id) . '" id="category-' . esc_attr($category->term_id) . '" class="cstmzr-category-checkbox"> ' . esc_html($category->cat_name) . '</label><br>';
            }
            ?>
            <input type="hidden" id="<?php echo esc_attr($this->id); ?>" class="cstmzr-hidden-categories" <?php $this->link(); ?> value="<?php echo esc_attr($this->value()); ?>">
            <?php
        }
    }

    /**
     * A class to create a list of icons in customizer field
     *
     * @since 1.0.0
     * @access public
     */
    class Fotography_Customize_Icons_Control extends WP_Customize_Control {

        /**
         * The type of customize control being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'fotography_icons';

        /**
         * Displays the control content.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        public function render_content() {

            $saved_icon_value = $this->value(); ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
                <div class="ap-customize-icons">
                    <div class="selected-icon-preview"><?php if( !empty( $saved_icon_value ) ) { echo '<i class="fa ' . esc_attr($saved_icon_value) . '"></i>'; } ?></div>
                    <ul class="icons-list-wrapper">
                        <?php 
                            $fotography_icons_list = fotography_icons_array();
                            foreach ( $fotography_icons_list as $key => $icon_value ) {
                                if( $saved_icon_value == $icon_value ) {
                                    echo '<li class="selected"><i class="fa ' . esc_attr($icon_value) . '"></i></li>';
                                } else {
                                    echo '<li><i class="fa ' . esc_attr($icon_value) . '"></i></li>';
                                }
                            }
                        ?>
                    </ul>
                    <input type="hidden" class="ap-icon-value" value="" <?php $this->link(); ?>>
                </div>

            </label>
    <?php
        }
    }
}

/**************************** Main Banner Slider ************************************** */
if ( ! function_exists( 'fotography_main_slider' ) ) :
function fotography_main_slider() {
    ?>
    <!-- Slider Section Start here -->
    <?php if (esc_attr(get_theme_mod('fotography_homepage_slider_setting_option','disable')) == 'enable') { ?>
        <div class="fg-banner-slider">
            <div id="slides">
                <?php 
                    $fotography_slider = get_theme_mod('fotography_homepage_advance_slider');
                    if(!empty($fotography_slider)){
                        $fotography_pro_sliders = json_decode($fotography_slider);
                        foreach ($fotography_pro_sliders as $slider) {

                        $website_layout = get_theme_mod('fotography_webpage_layout','fullwidth');
    
                ?>
                    <div class="single-slide">

                        <img src="<?php echo esc_url($slider->image_url); ?>"/>
                        <?php if (esc_attr(get_theme_mod('fotography_homepage_slider_show_caption','yes')) == 'yes') { ?>
                            <div class="caption">
                                <div class="title fadeInDown animated"><?php echo esc_attr($slider->title);?></div>
                                <div class="desc fadeInUp animated">
                                    <?php echo wp_kses_post($slider->text); ?>
                                    <?php if(!empty($slider->link) && !empty($slider->subtitle)) { ?>
                                        <div class="caption-link">
                                        <a href="<?php echo esc_url($slider->link); ?>">
                                            <?php echo esc_attr($slider->subtitle); ?>
                                        </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                <?php } } ?>
            </div>
        </div>       
    <?php
    }
}
endif;
/**************************** Our Services Area Function *********************** */
if ( ! function_exists( 'fotography_our_services' ) ) :
function fotography_our_services() {
    $services_one = esc_attr(get_theme_mod('fotography_homepage_services_page_one'));
    $services_two = esc_attr(get_theme_mod('fotography_homepage_services_page_two'));
    $services_three = esc_attr(get_theme_mod('fotography_homepage_services_page_three'));
    $title = esc_attr(get_theme_mod('fotography_homepage_our_service_title','Our Services'));
    ?>

    <div class="section-title">
        <?php echo esc_html($title); ?>   
    </div>

    <div class="service-box-wrap clearfix">
    <?php
    $query = new WP_Query('page_id=' . $services_one);
    while ($query->have_posts()) : $query->the_post();
        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'fotography-our-services', true);
        ?>
        <div class="service-box">
            <a href="<?php echo esc_url(the_permalink()); ?>" class="clearfix">
                <div class="service-image">
                    <img src="<?php echo esc_url($image[0]); ?>"/>
                </div>
                <div class="service-hover red">
                    <div class="post-title"><span class="table_cell"><?php the_title(); ?></span></div>
                </div>
            </a>
        </div>
        <?php
    endwhile;
    wp_reset_query();

    $query = new WP_Query('page_id=' . $services_two);
    while ($query->have_posts()) : $query->the_post();
        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'fotography-our-services', true);
        ?>
        <div class="service-box">
            <a href="<?php echo esc_url(the_permalink()); ?>" class="clearfix">
                <div class="service-image">
                    <img src="<?php echo esc_url($image[0]); ?>"/>
                </div>
                <div class="service-hover blue">
                    <div class="post-title"><span class="table_cell"><?php the_title(); ?></span></div>            
                </div>
            </a>
        </div>
        <?php
    endwhile;
    wp_reset_query();

    $query = new WP_Query('page_id=' . $services_three);
    while ($query->have_posts()) : $query->the_post();
        $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'fotography-our-services', true);
        ?>
        <div class="service-box">
            <a href="<?php echo esc_url(the_permalink()); ?>" class="clearfix">
                <div class="service-image">
                    <img src="<?php echo esc_attr($image[0]); ?>"/>
                </div>
                <div class="service-hover green">
                    <div class="post-title">
                        <span class="table_cell"><?php the_title(); ?></span>
                    </div>
                </div>
            </a>

        </div>
        </div>
        <?php
    endwhile;
    wp_reset_query();
}
endif;

/**************************** Our Home Blogs Area Function *********************** */
if ( ! function_exists( 'fotography_homeblogs' ) ) :
    function fotography_homeblogs() {
        $category_slug = esc_attr(get_theme_mod('fotography_homepage_blog_cat','uncategorized'));
        $title = esc_attr(get_theme_mod('fotography_homepage_blogs_title','Blog Posts'));
    ?>      

            <div class="section-title">
                <?php echo esc_html($title); ?>   
            </div>
              
            <div class="fg-latest-post clearfix">
                <?php                         
                  $args = array( 
                    'posts_per_page' => 3,
                    'category_name' => $category_slug
                  );
                  $query = new WP_Query($args);
                  if ($query->have_posts()): while ($query->have_posts()) : $query->the_post();
                ?>
                  <div class="post-item">
                        <div class="fg-post-img-wrap">
                            <a href="<?php the_permalink(); ?>">                      
                                <?php
                                    if ( has_post_thumbnail() ) {
                                      $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'fotography-homeblog', true);            
                                       echo '<img class="blog-image" src="' . esc_url($image[0]). '" />'; 
                                  }
                                ?>
                            </a>
                            <div class="fg-post-date-comment clearfix">
                                <div class="fg-post-date">
                                    <i class="fa fa-calendar-o"></i>
                                    <span><?php the_time('d') ?></span>
                                    <span><?php the_time('M'); ?></span>
                                </div>

                                <div class="fg-comment">
                                <i class="fa fa-comment-o"></i>
                                <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
                                </div>
                            </div>
                        </div>
                        

                        <div class="fg-post-content">
                            <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                            <div class="fg-item-excerpt">
                            <?php echo esc_html(fotography_word_count(get_the_excerpt(), 25))."..."; ?>
                            </div>
                            

                            <a class="bttn" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read More', 'fotography' ) ?></a>
                        </div>               
                  </div>
                <?php endwhile; endif;  wp_reset_query(); ?>
            </div>
    <?php
    }
endif;

/* * *************************** About Us Section ***************************************** */
if ( ! function_exists( 'fotography_aboutus' ) ) :
function fotography_aboutus() {
    $aboutus = get_option('theme_mods_fotography');
    $about_page = esc_attr(get_theme_mod('fotography_homepage_about_page'));
    $about_desc = intval(get_theme_mod('fotography_homepage_about_desc_limit',25));       
            query_posts('page_id=' . $about_page);
            while (have_posts()) : the_post();                
                if ( has_post_thumbnail() ) {
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'fotography-about-section', true);
                ?>
                <div class="about-feature-img" style="background-image:url(<?php echo esc_url($image[0]); ?>)">
                </div>
                <?php } ?>
                <div class="about_desc clearfix">
                    <div class="section-title">
                        <?php
                        if (!empty($about_title)) : 
                            echo esc_attr($about_title);
                        endif;
                        ?>
                        <span><?php the_title(); ?></span>
                    </div>

                          
                    <div class="aboutus-subtitle">
                        <?php the_content(); ?>
                    </div>      
                </div>
        <?php 
    endwhile;
    wp_reset_query();
}
endif;

if ( ! function_exists( 'fotography_counter' ) ) :
function fotography_counter(){
    $counter_one = esc_attr(get_theme_mod('fotography_homepage_about_counter_one'));
    $title_one = esc_attr(get_theme_mod('fotography_homepage_about_title_one'));
    $icon_one = esc_attr(get_theme_mod('fotography_homepage_about_icon_one'));

    $counter_two = esc_attr(get_theme_mod('fotography_homepage_about_counter_two'));
    $title_two = esc_attr(get_theme_mod('fotography_homepage_about_title_two'));
    $icon_two = esc_attr(get_theme_mod('fotography_homepage_about_icon_two'));

    $counter_three = esc_attr(get_theme_mod('fotography_homepage_about_counter_three'));
    $title_three = esc_attr(get_theme_mod('fotography_homepage_about_title_three'));
    $icon_three = esc_attr(get_theme_mod('fotography_homepage_about_icon_three'));

    $counter_four = esc_attr(get_theme_mod('fotography_homepage_about_counter_four'));
    $title_four = esc_attr(get_theme_mod('fotography_homepage_about_title_four'));
    $icon_four = esc_attr(get_theme_mod('fotography_homepage_about_icon_four'));

    $counter_five = esc_attr(get_theme_mod('fotography_homepage_about_counter_five'));
    $title_five = esc_attr(get_theme_mod('fotography_homepage_about_title_five'));
    $icon_five = esc_attr(get_theme_mod('fotography_homepage_about_icon_five'));       
    ?>
    <div class="about-counter-wrap clearfix">
        <div class="about-counter">
            <div class="counter counter-one">
             <?php
                if (!empty($counter_one)) : echo esc_html($counter_one);
                endif;
             ?>
            </div>
            <h6 class="counter-title title-one"><?php
                if (!empty($title_one)) : echo esc_html($title_one);
                endif;
                ?>
            </h6>
            <span class="counter-icon icon-one">                                    
                <i class="fa <?php if (!empty($icon_one)){ echo esc_attr($icon_one); } ?> fa-2x"></i>
            </span>
        </div>

        <div class="about-counter">
            <div class="counter counter-two">
            <?php
                if (!empty($counter_two)) : echo esc_html($counter_two);
                endif;
                ?>
            </div>
            
            <h6 class="counter-title title-two">
            <?php
                if (!empty($title_two)) : echo esc_html($title_two);
                endif;
                ?>
            </h6>

            <span class="counter-icon icon-two">
            <i class="fa <?php
                if (!empty($icon_two)) : echo esc_attr($icon_two);
                endif
                ?> fa-2x"></i>
            </span>
        </div>

        <div class="about-counter">

            <div class="counter counter-three"><?php
                if (!empty($counter_three)) : echo esc_html($counter_three);
                endif;
                ?>
            </div>

            <h6 class="counter-title title-three"><?php
                if (!empty($title_three)) : echo esc_html($title_three);
                endif;
                ?>
            </h6>

            <span class="counter-icon icon-three">
            <i class="fa <?php
                if (!empty($icon_three)) : echo esc_attr($icon_three);
                endif
                ?> fa-2x"></i>
            </span>
        </div>

        <div class="about-counter">
            <div class="counter counter-four"><?php
                if (!empty($counter_four)) : echo esc_html($counter_four);
                endif;
                ?>
            </div>

            <h6 class="counter-title title-four"><?php
                if (!empty($title_four)) : echo esc_html($title_four);
                endif;
                ?>
            </h6>

            <span class="counter-icon icon-four"><i class="fa <?php
                if (!empty($icon_four)) : echo esc_attr($icon_four);
                endif
                ?> fa-2x"></i>
            </span>
        </div>                             
    </div>
<?php
}
endif;

/* * ******************************** Call To Action Section  ************************************** */
if ( ! function_exists( 'fotography_call_to_action' ) ) :
function fotography_call_to_action() {
        $fg_bg_image = get_theme_mod('fotography_homepage_call_action_image');
        $fg_call_title = get_theme_mod('fotography_homepage_call_action_title','Need A Photographer ?');
        $fg_call_sub_title = get_theme_mod('fotography_homepage_call_action_sub_title');
        $fg_call_button_link = get_theme_mod('fotography_homepage_call_action_button_link');
        $fg_call_button_text = get_theme_mod('fotography_homepage_call_action_button_name','Hire Me');
    ?>
        <div class="call-to-action" <?php if(!empty($fg_bg_image)){ ?> style="background-image:url(<?php echo esc_url( $fg_bg_image ); ?>); background-size: cover; <?php } ?>">   
            <div class="foto-container">
                <div class="section-title"><?php echo esc_attr( $fg_call_title ); ?></div>
                <div class="call-to-action-subtitle"><?php echo esc_attr( $fg_call_sub_title ); ?></div>
                <?php if( !empty($fg_call_button_text) ){ ?>
                    <div class="call-to-action-button">
                        <a class="bttn" href="<?php echo esc_url( $fg_call_button_link ); ?>"><?php echo esc_attr( $fg_call_button_text ); ?></a>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php
}
endif;


/* * ******************************** Quick Contact Info ************************************** */
if ( ! function_exists( 'fotography_quick_contact' ) ) :
function fotography_quick_contact() {
    $email_icon = get_theme_mod('fotography_homepage_quick_email_icon');
    $email = esc_attr(get_theme_mod('fotography_homepage_quick_email'));
    $twitter_icon = esc_attr(get_theme_mod('fotography_homepage_quick_twitter_icon'));
    $twitter = esc_attr(get_theme_mod('fotography_homepage_quick_twitter'));
    $phone_icon = esc_attr(get_theme_mod('fotography_homepage_quick_phone_icon'));
    $phone = esc_attr(get_theme_mod('fotography_homepage_quick_phone'));
    ?>
    <div class="fg-email">
        <a href="mailto:<?php echo esc_html($email); ?>">
            <div class="email-icon">
                <i class="fa <?php echo esc_attr($email_icon); ?>"></i>
            </div>
            <div class="email-address">
                <?php echo esc_html($email); ?>
            </div>
        </a>
    </div>

    <div class="fg-twitter">
        <a href="https://twitter.com/<?php echo esc_attr($twitter); ?>" target="_blank">
            <div class="twitter-icon">
                <i class="fa <?php echo esc_attr($twitter_icon); ?>"></i>
            </div>
            <div class="twitter-address">
                <?php if(!empty($twitter)) : ?>
                    @<?php echo esc_attr($twitter); ?>
                <?php endif; ?>
            </div>
        </a>
    </div>

    <div class="fg-phone">
        <a href="callto:<?php echo esc_html($phone); ?>">
            <div class="phone-icon">
                <i class="fa <?php echo esc_attr($phone_icon); ?> fa-2x"></i>
            </div>
            <div class="phone-number">
                <?php echo esc_html($phone); ?>
            </div>
        </a>
    </div>
    <?php
}
endif;

if(class_exists( 'WP_Customize_control')){
    /**
     * Pro customizer section.
     *
     * @since  1.0.0
     * @access public
     */
    class Fotography_Customize_Section_Pro extends WP_Customize_Section {

        /**
         * The type of customize section being rendered.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $type = 'fotography-pro';

        /**
         * Custom button text to output.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_text = '';
        public $pro_text1 = '';
        public $title1 = '';

        /**
         * Custom pro button URL.
         *
         * @since  1.0.0
         * @access public
         * @var    string
         */
        public $pro_url = '';
        public $pro_url1 = '';

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
            $json['title1'] = $this->title1;
            $json['pro_text1'] = $this->pro_text1;
            $json['pro_url']  = esc_url( $this->pro_url );
            $json['pro_url1']  = $this->pro_url1;
            return $json;
        }

        /**
         * Outputs the Underscore.js template.
         *
         * @since  1.0.0
         * @access public
         * @return void
         */
        protected function render_template() { ?>

            <li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
                <h3 class="accordion-section-title">
                    {{ data.title1 }}
                    <# if ( data.pro_text1 && data.pro_url1 ) { #>
                        <a href="{{ data.pro_url1 }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text1 }}</a>
                    <# } #>
                </h3>
            </li>
        <?php }
    }
}

/**
 * Registers an editor stylesheet for the theme.
 */
function fotography_add_editor_styles() {
    add_editor_style( 'css/custom-editor-style.css' );
}
add_action( 'admin_init', 'fotography_add_editor_styles' );

// Single page Gallery ID 
if (!function_exists('fotography_pro_get_gallery_ids')) {
function fotography_pro_get_gallery_ids( $post ) {
    // print_r($post);
    $content = $post->post_content;    
    $pattern = "/<!--\ wp:gallery \{\"ids\":\[(.*?)\]/i";
    preg_match_all( $pattern, $content, $gals );

    $galleries = array();

    if( !empty( $gals ) ) {
        unset($gals[0]);

        if( isset( $gals[1] ) ) {
            $galleries[0]['ids'] = $gals[1][0]; 
        }
    }

    return $galleries;
}
}

/**
 * All fontawesome icon list
*/
if (!function_exists('fotography_icons_array')) {
    function fotography_icons_array(){
       $icon_lists = 'fa-glass, fa-music, fa-search, fa-envelope-o, fa-heart, fa-star, fa-star-o, fa-user, fa-film, fa-th-large, fa-th, fa-th-list, fa-check, fa-times, fa-search-plus, fa-search-minus, fa-power-off, fa-signal, fa-cog, fa-trash-o, fa-home, fa-file-o, fa-clock-o, fa-road, fa-download, fa-arrow-circle-o-down, fa-arrow-circle-o-up, fa-inbox, fa-play-circle-o, fa-repeat, fa-refresh, fa-list-alt, fa-lock, fa-flag, fa-headphones, fa-volume-off, fa-volume-down, fa-volume-up, fa-qrcode, fa-barcode, fa-tag, fa-tags, fa-book, fa-bookmark, fa-print, fa-camera, fa-font, fa-bold, fa-italic, fa-text-height, fa-text-width, fa-align-left, fa-align-center, fa-align-right, fa-align-justify, fa-list, fa-outdent, fa-indent, fa-video-camera, fa-picture-o, fa-pencil, fa-map-marker, fa-adjust, fa-tint, fa-pencil-square-o, fa-share-square-o, fa-check-square-o, fa-arrows, fa-step-backward, fa-fast-backward, fa-backward, fa-play, fa-pause, fa-stop, fa-forward, fa-fast-forward, fa-step-forward, fa-eject, fa-chevron-left, fa-chevron-right, fa-plus-circle, fa-minus-circle, fa-times-circle, fa-check-circle, fa-question-circle, fa-info-circle, fa-crosshairs, fa-times-circle-o, fa-check-circle-o, fa-ban, fa-arrow-left, fa-arrow-right, fa-arrow-up, fa-arrow-down, fa-share, fa-expand, fa-compress, fa-plus, fa-minus, fa-asterisk, fa-exclamation-circle, fa-gift, fa-leaf, fa-fire, fa-eye, fa-eye-slash, fa-exclamation-triangle, fa-plane, fa-calendar, fa-random, fa-comment, fa-magnet, fa-chevron-up, fa-chevron-down, fa-retweet, fa-shopping-cart, fa-folder, fa-folder-open, fa-arrows-v, fa-arrows-h, fa-bar-chart, fa-twitter-square, fa-facebook-square, fa-camera-retro, fa-key, fa-cogs, fa-comments, fa-thumbs-o-up, fa-thumbs-o-down, fa-star-half, fa-heart-o, fa-sign-out, fa-linkedin-square, fa-thumb-tack, fa-external-link, fa-sign-in, fa-trophy, fa-github-square, fa-upload, fa-lemon-o, fa-phone, fa-square-o, fa-bookmark-o, fa-phone-square, fa-twitter, fa-facebook, fa-github, fa-unlock, fa-credit-card, fa-rss, fa-hdd-o, fa-bullhorn, fa-bell, fa-certificate, fa-hand-o-right, fa-hand-o-left, fa-hand-o-up, fa-hand-o-down, fa-arrow-circle-left, fa-arrow-circle-right, fa-arrow-circle-up, fa-arrow-circle-down, fa-globe, fa-wrench, fa-tasks, fa-filter, fa-briefcase, fa-arrows-alt, fa-users, fa-link, fa-cloud, fa-flask, fa-scissors, fa-files-o, fa-paperclip, fa-floppy-o, fa-square, fa-bars, fa-list-ul, fa-list-ol, fa-strikethrough, fa-underline, fa-table, fa-magic, fa-truck, fa-pinterest, fa-pinterest-square, fa-google-plus-square, fa-google-plus, fa-money, fa-caret-down, fa-caret-up, fa-caret-left, fa-caret-right, fa-columns, fa-sort, fa-sort-desc, fa-sort-asc, fa-envelope, fa-linkedin, fa-undo, fa-gavel, fa-tachometer, fa-comment-o, fa-comments-o, fa-bolt, fa-sitemap, fa-umbrella, fa-clipboard, fa-lightbulb-o, fa-exchange, fa-cloud-download, fa-cloud-upload, fa-user-md, fa-stethoscope, fa-suitcase, fa-bell-o, fa-coffee, fa-cutlery, fa-file-text-o, fa-building-o, fa-hospital-o, fa-ambulance, fa-medkit, fa-fighter-jet, fa-beer, fa-h-square, fa-plus-square, fa-angle-double-left, fa-angle-double-right, fa-angle-double-up, fa-angle-double-down, fa-angle-left, fa-angle-right, fa-angle-up, fa-angle-down, fa-desktop, fa-laptop, fa-tablet, fa-mobile, fa-circle-o, fa-quote-left, fa-quote-right, fa-spinner, fa-circle, fa-reply, fa-github-alt, fa-folder-o, fa-folder-open-o, fa-smile-o, fa-frown-o, fa-meh-o, fa-gamepad, fa-keyboard-o, fa-flag-o, fa-flag-checkered, fa-terminal, fa-code, fa-reply-all, fa-star-half-o, fa-location-arrow, fa-crop, fa-code-fork, fa-chain-broken, fa-question, fa-info, fa-exclamation, fa-superscript, fa-subscript, fa-eraser, fa-puzzle-piece, fa-microphone, fa-microphone-slash, fa-shield, fa-calendar-o, fa-fire-extinguisher, fa-rocket, fa-maxcdn, fa-chevron-circle-left, fa-chevron-circle-right, fa-chevron-circle-up, fa-chevron-circle-down, fa-html5, fa-css3, fa-anchor, fa-unlock-alt, fa-bullseye, fa-ellipsis-h, fa-ellipsis-v, fa-rss-square, fa-play-circle, fa-ticket, fa-minus-square, fa-minus-square-o, fa-level-up, fa-level-down, fa-check-square, fa-pencil-square, fa-external-link-square, fa-share-square, fa-compass, fa-caret-square-o-down, fa-caret-square-o-up, fa-caret-square-o-right, fa-eur, fa-gbp, fa-usd, fa-inr, fa-jpy, fa-rub, fa-krw, fa-btc, fa-file, fa-file-text, fa-sort-alpha-asc, fa-sort-alpha-desc, fa-sort-amount-asc, fa-sort-amount-desc, fa-sort-numeric-asc, fa-sort-numeric-desc, fa-thumbs-up, fa-thumbs-down, fa-youtube-square, fa-youtube, fa-xing, fa-xing-square, fa-youtube-play, fa-dropbox, fa-stack-overflow, fa-instagram, fa-flickr, fa-adn, fa-bitbucket, fa-bitbucket-square, fa-tumblr, fa-tumblr-square, fa-long-arrow-down, fa-long-arrow-up, fa-long-arrow-left, fa-long-arrow-right, fa-apple, fa-windows, fa-android, fa-linux, fa-dribbble, fa-skype, fa-foursquare, fa-trello, fa-female, fa-male, fa-gratipay, fa-sun-o, fa-moon-o, fa-archive, fa-bug, fa-vk, fa-weibo, fa-renren, fa-pagelines, fa-stack-exchange, fa-arrow-circle-o-right, fa-arrow-circle-o-left, fa-caret-square-o-left, fa-dot-circle-o, fa-wheelchair, fa-vimeo-square, fa-try, fa-plus-square-o, fa-space-shuttle, fa-slack, fa-envelope-square, fa-wordpress, fa-openid, fa-university, fa-graduation-cap, fa-yahoo, fa-google, fa-reddit, fa-reddit-square, fa-stumbleupon-circle, fa-stumbleupon, fa-delicious, fa-digg, fa-pied-piper-pp, fa-pied-piper-alt, fa-drupal, fa-joomla, fa-language, fa-fax, fa-building, fa-child, fa-paw, fa-spoon, fa-cube, fa-cubes, fa-behance, fa-behance-square, fa-steam, fa-steam-square, fa-recycle, fa-car, fa-taxi, fa-tree, fa-spotify, fa-deviantart, fa-soundcloud, fa-database, fa-file-pdf-o, fa-file-word-o, fa-file-excel-o, fa-file-powerpoint-o, fa-file-image-o, fa-file-archive-o, fa-file-audio-o, fa-file-video-o, fa-file-code-o, fa-vine, fa-codepen, fa-jsfiddle, fa-life-ring, fa-circle-o-notch, fa-rebel, fa-empire, fa-git-square, fa-git, fa-hacker-news, fa-tencent-weibo, fa-qq, fa-weixin, fa-paper-plane, fa-paper-plane-o, fa-history, fa-circle-thin, fa-header, fa-paragraph, fa-sliders, fa-share-alt, fa-share-alt-square, fa-bomb, fa-futbol-o, fa-tty, fa-binoculars, fa-plug, fa-slideshare, fa-twitch, fa-yelp, fa-newspaper-o, fa-wifi, fa-calculator, fa-paypal, fa-google-wallet, fa-cc-visa, fa-cc-mastercard, fa-cc-discover, fa-cc-amex, fa-cc-paypal, fa-cc-stripe, fa-bell-slash, fa-bell-slash-o, fa-trash, fa-copyright, fa-at, fa-eyedropper, fa-paint-brush, fa-birthday-cake, fa-area-chart, fa-pie-chart, fa-line-chart, fa-lastfm, fa-lastfm-square, fa-toggle-off, fa-toggle-on, fa-bicycle, fa-bus, fa-ioxhost, fa-angellist, fa-cc, fa-ils, fa-meanpath, fa-buysellads, fa-connectdevelop, fa-dashcube, fa-forumbee, fa-leanpub, fa-sellsy, fa-shirtsinbulk, fa-simplybuilt, fa-skyatlas, fa-cart-plus, fa-cart-arrow-down, fa-diamond, fa-ship, fa-user-secret, fa-motorcycle, fa-street-view, fa-heartbeat, fa-venus, fa-mars, fa-mercury, fa-transgender, fa-transgender-alt, fa-venus-double, fa-mars-double, fa-venus-mars, fa-mars-stroke, fa-mars-stroke-v, fa-mars-stroke-h, fa-neuter, fa-genderless, fa-facebook-official, fa-pinterest-p, fa-whatsapp, fa-server, fa-user-plus, fa-user-times, fa-bed, fa-viacoin, fa-train, fa-subway, fa-medium, fa-y-combinator, fa-optin-monster, fa-opencart, fa-expeditedssl, fa-battery-full, fa-battery-three-quarters, fa-battery-half, fa-battery-quarter, fa-battery-empty, fa-mouse-pointer, fa-i-cursor, fa-object-group, fa-object-ungroup, fa-sticky-note, fa-sticky-note-o, fa-cc-jcb, fa-cc-diners-club, fa-clone, fa-balance-scale, fa-hourglass-o, fa-hourglass-start, fa-hourglass-half, fa-hourglass-end, fa-hourglass, fa-hand-rock-o, fa-hand-paper-o, fa-hand-scissors-o, fa-hand-lizard-o, fa-hand-spock-o, fa-hand-pointer-o, fa-hand-peace-o, fa-trademark, fa-registered, fa-creative-commons, fa-gg, fa-gg-circle, fa-tripadvisor, fa-odnoklassniki, fa-odnoklassniki-square, fa-get-pocket, fa-wikipedia-w, fa-safari, fa-chrome, fa-firefox, fa-opera, fa-internet-explorer, fa-television, fa-contao, fa-500px, fa-amazon, fa-calendar-plus-o, fa-calendar-minus-o, fa-calendar-times-o, fa-calendar-check-o, fa-industry, fa-map-pin, fa-map-signs, fa-map-o, fa-map, fa-commenting, fa-commenting-o, fa-houzz, fa-vimeo, fa-black-tie, fa-fonticons, fa-reddit-alien, fa-edge, fa-credit-card-alt, fa-codiepie, fa-modx, fa-fort-awesome, fa-usb, fa-product-hunt, fa-mixcloud, fa-scribd, fa-pause-circle, fa-pause-circle-o, fa-stop-circle, fa-stop-circle-o, fa-shopping-bag, fa-shopping-basket, fa-hashtag, fa-bluetooth, fa-bluetooth-b, fa-percent, fa-gitlab, fa-wpbeginner, fa-wpforms, fa-envira, fa-universal-access, fa-wheelchair-alt, fa-question-circle-o, fa-blind, fa-audio-description, fa-volume-control-phone, fa-braille, fa-assistive-listening-systems, fa-american-sign-language-interpreting, fa-deaf, fa-glide, fa-glide-g, fa-sign-language, fa-low-vision, fa-viadeo, fa-viadeo-square, fa-snapchat, fa-snapchat-ghost, fa-snapchat-square, fa-pied-piper, fa-first-order, fa-yoast, fa-themeisle, fa-google-plus-official, fa-font-awesome';
       $icon_lists = explode( ", " , $icon_lists);
       return $icon_lists;
    }
}