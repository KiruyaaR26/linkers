<?php
/**
 * Registers the 'Studios' custom taxonomy.
 *
 * Initializes the 'studios' custom taxonomy for the 'digital_asset' post type. 
 * This enables the organization of digital assets based on their originating 
 * creator, production house, publisher, or associated studio.
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
 * Registers the 'studios' custom taxonomy for the 'digital_asset' post type.
 *
 * This function defines the labels, visibility, and behavioral arguments for the 
 * studios taxonomy. It is set to non-hierarchical (behaving like tags) by default 
 * to organize digital assets based on their originating creator, production house, 
 * publisher, or associated studio.
 *
 * @since 1.0.0
 *
 * @return void
 */
function linkers_create_asset_stu(): void {
    $labels = array(
        'name'                  => _x( 'Studios', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Studios', 'Post type singular name', 'textdomain' ),
        'name_admin_bar'        => _x( 'Studios', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Studio', 'textdomain' ),
        'new_item'              => __( 'New Studio', 'textdomain' ),
        'edit_item'             => __( 'Edit Studio', 'textdomain' ),
        'view_item'             => __( 'View Studio', 'textdomain' ),
        'all_items'             => __( 'All Studios', 'textdomain' ),
        'search_items'          => __( 'Search Studios', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Studio:', 'textdomain' ),
        'not_found'             => __( 'No Studios found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Studios found in Trash.', 'textdomain' ),
        'archives'              => _x( 'Studio archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Studio', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Studio', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Studio list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Studios list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Studios list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
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
    register_taxonomy( 'studios', 'digital_asset', $args );
}
add_action( 'init', 'linkers_create_asset_stu');