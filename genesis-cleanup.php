<?php
/**
 * Genesis Mods - Cleanup Genesis
 * @see https://github.com/chuckreynolds/genesiswp-mods
 */

// Remove edit link
add_filter( 'genesis_edit_post_link', '__return_false' );

// Remove the post meta and post info
remove_action( 'genesis_after_post_content',  'genesis_post_meta' );
remove_action( 'genesis_before_post_content', 'genesis_post_info' );

// Remove Genesis sidebars
unregister_sidebar( 'sidebar-alt'  );
#unregister_sidebar( 'header-right' );

// Remove Genesis layouts
genesis_unregister_layout( 'sidebar-content'         );
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
#genesis_unregister_layout( 'content-sidebar'         );
#genesis_unregister_layout( 'full-width-content'      );

/**
 * Remove Genesis user profile settings
 */
function genmod_remove_genesis_user_settings() {
	remove_action( 'show_user_profile', 'genesis_user_options_fields' );
	remove_action( 'edit_user_profile', 'genesis_user_options_fields' );
	remove_action( 'show_user_profile', 'genesis_user_archive_fields' );
	remove_action( 'edit_user_profile', 'genesis_user_archive_fields' );
	remove_action( 'show_user_profile', 'genesis_user_seo_fields'     );
	remove_action( 'edit_user_profile', 'genesis_user_seo_fields'     );
	remove_action( 'show_user_profile', 'genesis_user_layout_fields'  );
	remove_action( 'edit_user_profile', 'genesis_user_layout_fields'  );
}
add_action( 'admin_init', 'genmod_remove_genesis_user_settings' );

/**
 * Remove Genesis widgets
 */
function genmod_remove_genesis_widgets() {
    unregister_widget( 'Genesis_eNews_Updates'          );
    unregister_widget( 'Genesis_Featured_Page'          );
    unregister_widget( 'Genesis_User_Profile_Widget'    );
    unregister_widget( 'Genesis_Menu_Pages_Widget'      );
    unregister_widget( 'Genesis_Widget_Menu_Categories' );
    unregister_widget( 'Genesis_Featured_Post'          );
    unregister_widget( 'Genesis_Latest_Tweets_Widget'   );
}
add_action( 'widgets_init', 'genmod_remove_genesis_widgets', 20 );

/**
 * Remove Genesis Post metaboxes
 */
function genmod_remove_genesis__post_metaboxes(){
	remove_meta_box( 'genesis_inpost_seo_box',     'post', 'normal' ); // Genesis seo
	remove_meta_box( 'genesis_inpost_layout_box',  'post', 'normal' ); // Genesis layout
	remove_meta_box( 'genesis_inpost_scripts_box', 'post', 'normal' ); // Genesis scripts
}
add_action( 'admin_menu', 'genmod_remove_genesis__post_metaboxes', 50 );

/**
 * Remove Genesis Framework settings page metaboxes
 *
 * @see https://gist.github.com/chuckreynolds/91cb7241fdf88f2905ab
 * @param string $_genesis_theme_settings_pagehook
 */
function genmod_remove_genesis_metaboxes( $_genesis_theme_settings_pagehook ) {

	remove_meta_box( 'genesis-theme-settings-feeds',      $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-header',     $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-nav',        $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-breadcrumb', $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-comments',   $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-posts',      $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-blogpage',   $_genesis_theme_settings_pagehook, 'main' );
	remove_meta_box( 'genesis-theme-settings-scripts',    $_genesis_theme_settings_pagehook, 'main' );

}
add_action( 'genesis_theme_settings_metaboxes', 'genmod_remove_genesis_metaboxes' );