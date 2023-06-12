<?php

/**
****************** spwptm Adds a submenu page under a custom post type parent. ******************
**/
function spwptm_register_settings_page() {
    add_submenu_page(
        'edit.php?post_type=testimonial',
        __( 'Settings', 'spwptm' ),
        __( 'Settings', 'spwptm' ),
        'manage_options',
        'spwptm-settings-pages',
        'spwptm_elements_settings_pages'
    );
}
add_action('admin_menu', 'spwptm_register_settings_page');

/**
** spwptm Display callback for the submenu page.
**/
function spwptm_elements_settings_pages() { 
?>
    <div class="wrap spwptm-warp">
        <div class="spwptm-main-body">
            <h1><?php _e( 'Testimonial Settings', 'spwptm' ); ?></h1>
            <div class="lnclrX"></div>
            
            <form action="options.php" method="post">
                <div class="lnclrX"></div>
                <?php wp_nonce_field('update-options'); ?>
                <label name="color_theme" for="color_theme">Color Theme: </label>
                <input type="text" name="color_theme" value="<?php echo get_option('color_theme') ?>" class="color-picker" required/>
                <div class="lnclrX"></div>
                <label name="hover_color" for="hover_color">Hover Color: </label>
                <input type="text" name="hover_color" value="<?php echo get_option('hover_color') ?>" class="color-picker" required/>
                <div class="lnclrX"></div>

                <input type="hidden" name="action" value="update" />
                <input type="hidden" name="page_options" value="color_theme, hover_color" />
                <div class="lnclrX"></div>
                <input type="submit" name="submit" class="button" value="<?php _e( 'SAVE', 'spwptm' ); ?>" />
            </form>
        </div>
        <div class="spwptm-sidebar">
            <h1><?php _e( 'Developer Info', 'spwptm' ); ?></h1>
            <h3 class="dev-name">Md. Ibrahim Khalil</h3>
            <p class="dev-desig">Full Stack WordPress Developer</p>
            <p class="dev-intro">Expert in all aspects of WordPress website creation, including design, theme and plugin development.</p>
        </div>
    </div>
<?php
} 

// Add the metabox to the Testimonial post type
add_action('add_meta_boxes', 'spwptm_add_metabox');
function spwptm_add_metabox() {
    add_meta_box(
        'spwptm_testi_name',
        __('Name', 'spwptm'),
        'spwptm_testi_name_callback',
        'testimonial',
        'normal',
        'default'
    );
    add_meta_box(
        'spwptm_testi_desig',
        __('Designation', 'spwptm'),
        'spwptm_testi_desig_callback',
        'testimonial',
        'normal',
        'default'
    );
    add_meta_box(
        'spwptm_rating',
        __('Rating', 'spwptm'),
        'spwptm_rating_callback',
        'testimonial',
        'normal',
        'default'
    );
}

// 1. Callback function for the Name metabox
function spwptm_testi_name_callback($post) {
    wp_nonce_field('spwptm_save_testi_name', 'spwptm_testi_name_nonce');
    $value = get_post_meta($post->ID, 'spwptm_testi_name_area', true);
    echo '<label for="spwptm_testi_name_field">'.__('Enter the Name: ', 'spwptm'). '</label>';
    echo '<input type="text" id="spwptm_testi_name_field" name="spwptm_testi_name_field" value="'.esc_attr($value).'">';
}

// Save the metabox data
add_action('save_post_testimonial', 'spwptm_save_testi_name_metabox');
function spwptm_save_testi_name_metabox($post_id) {
    // Verify the nonce before proceeding.
    if (!isset($_POST['spwptm_testi_name_nonce']) || !wp_verify_nonce($_POST['spwptm_testi_name_nonce'], 'spwptm_save_testi_name')) {
        return $post_id;
    }

    // Get the posted data and sanitize it.
    $new_name = isset($_POST['spwptm_testi_name_field']) ? sanitize_text_field($_POST['spwptm_testi_name_field']) : '';

    // Update the meta field in the database.
    update_post_meta($post_id, 'spwptm_testi_name_area', $new_name);
}

// 2. Callback function for the Rating metabox
function spwptm_rating_callback($post) {
    wp_nonce_field('spwptm_save_rating', 'spwptm_rating_nonce');
    $value = get_post_meta($post->ID, 'spwptm_rating_give', true);
    echo '<label for="spwptm_rating_field">'.__('Enter the Rating: ', 'spwptm'). '</label>';
    echo '<input type="number" id="spwptm_rating_field" name="spwptm_rating_field" min="0" max="5" step="0.1" value="'.esc_attr($value).'">';
}

// Save the metabox data
add_action('save_post_testimonial', 'spwptm_save_rating_metabox');
function spwptm_save_rating_metabox($post_id) {
    // Verify the nonce before proceeding.
    if (!isset($_POST['spwptm_rating_nonce']) || !wp_verify_nonce($_POST['spwptm_rating_nonce'], 'spwptm_save_rating')) {
        return $post_id;
    }

    // Get the posted data and sanitize it for use as an HTML class.
    $new_rating = isset($_POST['spwptm_rating_field']) ? floatval($_POST['spwptm_rating_field']) : '';
    $new_rating = sanitize_html_class($new_rating);

    // Update the meta field in the database.
    update_post_meta($post_id, 'spwptm_rating_give', $new_rating);
}


// 3. Callback function for the Designation metabox
function spwptm_testi_desig_callback($post) {
    wp_nonce_field('spwptm_save_testi_desig', 'spwptm_testi_desig_nonce');
    $value = get_post_meta($post->ID, 'spwptm_testi_designation', true);
    echo '<label for="spwptm_testi_desig_field">'.__('Enter the Designation: ', 'spwptm'). '</label>';
    echo '<input type="text" id="spwptm_testi_desig_field" name="spwptm_testi_desig_field" value="'.esc_attr($value).'">';
}

// Save the metabox data
add_action('save_post_testimonial', 'spwptm_save_testi_desig_metabox');
function spwptm_save_testi_desig_metabox($post_id) {
    // Verify the nonce before proceeding.
    if (!isset($_POST['spwptm_testi_desig_nonce']) || !wp_verify_nonce($_POST['spwptm_testi_desig_nonce'], 'spwptm_save_testi_desig')) {
        return $post_id;
    }

    // Get the posted data and sanitize it.
    $new_desig = isset($_POST['spwptm_testi_desig_field']) ? sanitize_text_field($_POST['spwptm_testi_desig_field']) : '';

    // Update the meta field in the database.
    update_post_meta($post_id, 'spwptm_testi_designation', $new_desig);
}