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
            <h2><?php _e( 'Testimonial Settings', 'spwptm' ); ?></h2><br/><br/>
            
            <form action="options.php" method="post">
                <?php wp_nonce_field('update-options'); ?>
                <label name="color_theme" for="color_theme">Color Theme: </label>
                <input type="text" name="color_theme" value="<?php echo get_option('color_theme') ?>" class="color-picker" required/><br/><br/>
                <label name="hover_color" for="hover_color">Hover Color: </label>
                <input type="text" name="hover_color" value="<?php echo get_option('hover_color') ?>" class="color-picker" required/><br/><br/>

                <input type="hidden" name="action" value="update" />
                <input type="hidden" name="page_options" value="color_theme, hover_color" />
                <input type="submit" name="submit" class="button" value="<?php _e( 'SAVE', 'spwptm' ); ?>" />
            </form>
        </div>
        <div class="spwptm-sidebar">
            <h2><?php _e( 'Developer Info', 'spwptm' ); ?></h2><br/><br/>
        </div>
    </div>
    <?php
} 

?>