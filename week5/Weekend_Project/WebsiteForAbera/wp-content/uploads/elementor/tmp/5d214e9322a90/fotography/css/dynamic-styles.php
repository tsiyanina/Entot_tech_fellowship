<?php

    if(!function_exists( 'fotography_register_fonts' ) ) {

            function fotography_register_fonts () {

                $fotography_body_font = get_theme_mod( 'fotography_body_font', 'Lato' );
                $fotography_heading_font = get_theme_mod( 'fotography_heading_font', 'Lato' );
                $fotography_section_title_font = get_theme_mod( 'fotography_section_title_font', 'Bad Script' );
                $fotography_menu_font = get_theme_mod( 'fotography_menu_font', 'Open Sans Condensed' );
                $fonts = $fotography_body_font.'|'.$fotography_heading_font.'|'.$fotography_section_title_font.'|'.$fotography_menu_font;
                    
                wp_register_style( 'fotography-dynamic-fonts', '//fonts.googleapis.com/css?family=' . $fonts );
                wp_enqueue_style( 'fotography-dynamic-fonts' );

            }

            add_action( 'wp_head', 'fotography_register_fonts' );

    }

    function fotography_dynamic_styles() {
            $tpl_color = sanitize_hex_color(get_theme_mod( 'fotography_tpl_color', '#e23815' ));
            $lite_color = fotography_colour_brightness($tpl_color, 0.8);
            $dark_color = fotography_colour_brightness($tpl_color, -0.8);
            $rgb = fotography_hex2rgb($tpl_color);

            /** Color **/
            $custom_css = "
                .main-navigation .current_page_item > a,
                .main-navigation .current-menu-item > a,
                .main-navigation .current_page_ancestor > a,
                .main-navigation li:hover > a,
                .about-counter .counter,
                .fg-grid-hover h6 a:hover,
                .gallery-open-link a:hover,
                .sort-table .button-group li.is-checked,
                .fg-masonary-gallery-cat a:hover,
                .fg-post-content a:hover,
                .fg-gallery-list-detail a:hover,
                .fg-gallery-detail .entry-meta a:hover,
                .widget a:hover,
                #fotography-breadcrumb a:hover, a:hover,
                .woocommerce .woocommerce-info::before,
                .woocommerce #respond input#submit,
                .woocommerce a.button,
                .woocommerce button.button,
                .woocommerce input.button,
                .woocommerce ul.products li.product .button,
                .woocommerce .woocommerce-breadcrumb a:hover {
                    color: {$tpl_color};
                }";

            /** Background Color **/
            $custom_css .= "
                .section-title:before,
                .section-title:after,
                .home_caltoaction a.bttn,
                .quick_contact_section,
                #back-to-top:hover,
                .sort-table .button-group li.is-checked:after,
                .pagination a, .pagination span,
                button:hover, input[type=\"button\"]:hover, input[type=\"reset\"]:hover, input[type=\"submit\"]:hover,
                .scrollbar .handle,
                .widget-area .widget-title:before,
                .widget-area .widget-title:after,
                .team-block h6 a,
                .testimonial-name,
                .woocommerce #respond input#submit:hover,
                .woocommerce a.button:hover,
                .woocommerce button.button:hover,
                .woocommerce input.button:hover,
                .woocommerce ul.products li.product .button:hover,
                .woocommerce nav.woocommerce-pagination ul li a,
                .woocommerce nav.woocommerce-pagination ul li span,
                .woocommerce ul.products li.product .onsale,
                .woocommerce span.onsale,
                .comments-title:before, #reply-title:before,
                .comments-title:after, #reply-title:after {
                    background: {$tpl_color};
                }";

            /** Light Background Color **/
            $custom_css .= "
                #back-to-top,
                button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"] {
                    background: {$lite_color};
                }";

            /** Border Color **/
            $custom_css .= "
                .about-counter,
                .bttn:hover,
                .home_caltoaction a.bttn,
                button, input[type=\"button\"], input[type=\"reset\"], input[type=\"submit\"],
                button:hover, input[type=\"button\"]:hover, input[type=\"reset\"]:hover, input[type=\"submit\"]:hover,
                .testimonial-image,
                .woocommerce .woocommerce-info,
                .woocommerce #respond input#submit,
                .woocommerce a.button,
                .woocommerce button.button,
                .woocommerce input.button,
                .woocommerce ul.products li.product .button {
                    border-color: {$tpl_color};
                }";

            /** Mobile Menu **/
            $custom_css .= "
            @media screen and (max-width: 1100px){
                .fg-toggle-nav span{
                    background: {$tpl_color};
                    box-shadow: 0 10px 0 {$tpl_color}, 0 -10px 0 {$tpl_color};
                }
                .main-navigation{
                    border-color: {$tpl_color};
                }
            }";

            /** Typography Styles **/
            $fotography_body_font = get_theme_mod( 'fotography_body_font', 'Lato' );
            $fotography_heading_font = get_theme_mod( 'fotography_heading_font', 'Lato' );
            $fotography_section_title_font = get_theme_mod( 'fotography_section_title_font', 'Bad Script' );
            $fotography_menu_font = get_theme_mod( 'fotography_menu_font', 'Open Sans Condensed' );

            /** Body Typography **/
                if( $fotography_body_font != '' ) {
                    $custom_css .= "
                    body, body p{
                        font-family: {$fotography_body_font}
                    }";
                }

            /** Heading Typography **/
                if( $fotography_heading_font != '' ) {
                    $custom_css .= "
                    h1, h2, h3, h4, h5, h6{
                        font-family: {$fotography_heading_font}
                    }";
                }

            /** Home Section Title Typography **/
                if( $fotography_section_title_font != '' ) {
                    $custom_css .= "
                    .section-title{
                        font-family: {$fotography_section_title_font}
                    }";
                }

            /** Menu Typography **/
                if( $fotography_menu_font != '' ) {
                    $custom_css .= "
                    .main-navigation > ul > li > a {
                        font-family: {$fotography_menu_font}
                    }";
                }


            wp_add_inline_style( 'fotography-style', $custom_css );
        }

        add_action( 'wp_enqueue_scripts', 'fotography_dynamic_styles' );

        function fotography_colour_brightness($hex, $percent) {
            // Work out if hash given
            $hash = '';
            if (stristr($hex, '#')) {
                $hex = str_replace('#', '', $hex);
                $hash = '#';
            }
            /// HEX TO RGB
            $rgb = array(hexdec(substr($hex, 0, 2)), hexdec(substr($hex, 2, 2)), hexdec(substr($hex, 4, 2)));
            //// CALCULATE 
            for ($i = 0; $i < 3; $i++) {
                // See if brighter or darker
                if ($percent > 0) {
                    // Lighter
                    $rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1 - $percent));
                } else {
                    // Darker
                    $positivePercent = $percent - ($percent * 2);
                    $rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1 - $positivePercent));
                }
                // In case rounding up causes us to go to 256
                if ($rgb[$i] > 255) {
                    $rgb[$i] = 255;
                }
            }
            //// RBG to Hex
            $hex = '';
            for ($i = 0; $i < 3; $i++) {
                // Convert the decimal digit to hex
                $hexDigit = dechex($rgb[$i]);
                // Add a leading zero if necessary
                if (strlen($hexDigit) == 1) {
                    $hexDigit = "0" . $hexDigit;
                }
                // Append to the hex string
                $hex .= $hexDigit;
            }
            return $hash . $hex;
        }

        function fotography_hex2rgb($hex) {
            $hex = str_replace("#", "", $hex);

            if (strlen($hex) == 3) {
                $r = hexdec(substr($hex, 0, 1) . substr($hex, 0, 1));
                $g = hexdec(substr($hex, 1, 1) . substr($hex, 1, 1));
                $b = hexdec(substr($hex, 2, 1) . substr($hex, 2, 1));
            } else {
                $r = hexdec(substr($hex, 0, 2));
                $g = hexdec(substr($hex, 2, 2));
                $b = hexdec(substr($hex, 4, 2));
            }
            $rgb = array($r, $g, $b);
            //return implode(",", $rgb); // returns the rgb values separated by commas
            return $rgb; // returns an array with the rgb values
        }