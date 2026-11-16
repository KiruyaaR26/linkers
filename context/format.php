<?php
/**
 * Registers the 'Formats' custom taxonomy.
 *
 * Initializes the 'formats' custom taxonomy for the 'digital_asset' post type. 
 * This taxonomy is used to classify digital assets based on their media type 
 * or file format extensions (e.g., PNG, MP4, ZIP, PDF).
 *
 * @package     linkers
 * @subpackage  Context
 * @link        renders.php
 * @version     1.0.0
 * @author      Achmad Baihaqi
 * @author      Muhammad Rido Nur Islam
 * @copyright   2026 Gravito linkers Development Team. All rights reserved.
 * @license     MIT
 *
 * NOTICE OF LICENSE:
 * Distribution, modification, or redistribution of this source code, in whole 
 * or in part, is strictly prohibited without prior written authorization from 
 * the copyright holder.
 */

// abort if this file is called directly
if ( ! defined( 'ABSPATH' ) || ! defined( 'WPINC' ) || ! function_exists( 'add_action' ) ) {
    echo 'Hi there! I just a extended module, please back.';
    exit;
}

/**
 * Registers the 'formats' custom taxonomy for the 'digital_asset' post type.
 *
 * This function defines the labels, visibility, and behavioral arguments for the 
 * formats taxonomy. It is set to non-hierarchical (behaving like tags) by default 
 * to classify digital assets based on their file format extensions or media types (e.g., PNG, MP4, PDF).
 *
 * @since 1.0.0
 *
 * @return void
 */
function linkers_create_asset_for(): void {
    $labels = array(
        'name'                  => _x( 'Formats', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Formats', 'Post type singular name', 'textdomain' ),
        'name_admin_bar'        => _x( 'Formats', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Format', 'textdomain' ),
        'new_item'              => __( 'New Format', 'textdomain' ),
        'edit_item'             => __( 'Edit Format', 'textdomain' ),
        'view_item'             => __( 'View Format', 'textdomain' ),
        'all_items'             => __( 'All Formats', 'textdomain' ),
        'search_items'          => __( 'Search Formats', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Format:', 'textdomain' ),
        'not_found'             => __( 'No Formats found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Formats found in Trash.', 'textdomain' ),
        'archives'              => _x( 'Format archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Format', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Format', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Format list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Formats list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Formats list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'show_in_rest'       => true,
        'rewrite'            => array( 'slug' => 'digital-asset' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
    );
    register_taxonomy( 'formats', 'digital_asset', $args );
}
add_action( 'init', 'linkers_create_asset_for' );