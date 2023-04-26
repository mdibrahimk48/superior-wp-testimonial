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
    <div class="wrap">
        <h1><?php _e( 'Testimonial Settings', 'spwptm' ); ?></h1>
        <p><?php _e( 'Testimonial Settings Here', 'spwptm' ); ?></p>
    </div>
    <?php
} 

?>