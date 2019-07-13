<?php

/**
 * @package Accesspress Pro
 */
function fotography_pro_widgets_show_widget_field($instance = '', $widget_field = '', $athm_field_value = '') {
    // Store Posts in array
    $fotography_pro_postlist[0] = array(
        'value' => 0,
        'label' => '--choose--'
    );
    $arg = array('posts_per_page' => -1);
    $fotography_pro_posts = get_posts($arg);
    foreach ($fotography_pro_posts as $fotography_pro_post) :
        $fotography_pro_postlist[$fotography_pro_post->ID] = array(
            'value' => $fotography_pro_post->ID,
            'label' => $fotography_pro_post->post_title
        );
    endforeach;

    extract($widget_field);

    switch ($fotography_pro_widgets_field_type) {

        // Standard text field
        case 'text' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($fotography_pro_widgets_name)); ?>"><?php echo esc_html($fotography_pro_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($fotography_pro_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($fotography_pro_widgets_name)); ?>" type="text" value="<?php echo esc_attr($athm_field_value) ; ?>" />

                <?php if (isset($fotography_pro_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($fotography_pro_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;
            
        //title    
        case 'title' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($fotography_pro_widgets_name)); ?>"><?php echo esc_html($fotography_pro_widgets_title); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr($instance->get_field_id($fotography_pro_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($fotography_pro_widgets_name)); ?>" type="text" value="<?php echo esc_attr($athm_field_value) ; ?>" />

                <?php if (isset($fotography_pro_widgets_description)) { ?>
                    <br />
                    <small><?php echo esc_html($fotography_pro_widgets_description); ?></small>
                <?php } ?>
            </p>
            <?php
            break;

        // Textarea field
        case 'textarea' :
            ?>
            <p>
                <label for="<?php echo esc_attr($instance->get_field_id($fotography_pro_widgets_name)); ?>"><?php echo esc_html($fotography_pro_widgets_title); ?>:</label>
                <textarea class="widefat" rows="<?php echo esc_attr($fotography_pro_widgets_row); ?>" id="<?php echo esc_attr($instance->get_field_id($fotography_pro_widgets_name)); ?>" name="<?php echo esc_attr($instance->get_field_name($fotography_pro_widgets_name)); ?>"><?php echo esc_textarea($athm_field_value); ?></textarea>
            </p>
            <?php
            break;       
    }
}

function fotography_pro_widgets_updated_field_value($widget_field, $new_field_value) {

    extract($widget_field);

    // Allow only integers in number fields
    if ($fotography_pro_widgets_field_type == 'number') {
        return absint($new_field_value);

        // Allow some tags in textareas
    } 
    
    elseif ($fotography_pro_widgets_field_type == 'url') {
        return esc_url_raw($new_field_value);
    }
    elseif ($fotography_pro_widgets_field_type == 'title') {
        return wp_kses_post($new_field_value);
    }
    else {
        return strip_tags($new_field_value);
    }
}