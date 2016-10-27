<?php
/**
 * Genesis Mods - Customizations
 * @see https://github.com/chuckreynolds/genesiswp-mods
 */

// Set a default layout
genesis_set_default_layout( 'content-sidebar' );

/**
 * Customize the footer text
 * @param string $creds
 */
function genmod_footer_creds_filter( $creds ) {

	$creds = 'Copyright &copy; 2015 - ' . date( 'Y' ) . ' BRAND NAME. All rights reserved.';
	return $creds;

}
add_filter( 'genesis_footer_creds_text', 'genmod_footer_creds_filter' );

/**
 * Customize the entry meta in the entry header
 * @param string $creds
 */
function genmod_post_info_filter( $post_info ) {

	if ( ! is_page() ) {
		$post_info = '[post_date] [post_edit]';
		return $post_info;
	}

}
add_filter( 'genesis_post_info', 'genmod_post_info_filter' );

/**
 * Customize the post meta
 * @param string $post_meta
 */
function genmod_post_meta_filter( $post_meta ) {

	if ( ! is_page() ) {
		$post_meta = '[post_categories before="Posted in: "] [post_tags before="Tagged: "]';
		return $post_meta;
	}

}
add_filter( 'genesis_post_meta', 'genmod_post_meta_filter' );