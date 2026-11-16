<?php
/**
 * Registers the 'Categories' custom taxonomy.
 *
 * Initializes the 'categories' taxonomy for the 'digital_asset' post type. 
 * This taxonomy establishes a structure to group assets into distinct, broad 
 * sections. Note: While traditionally categories are hierarchical, this is 
 * configured as false by default here.
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
 * Registers the 'categories' custom taxonomy for the 'digital_asset' post type.
 *
 * This function defines the labels, visibility, and behavioral arguments for the 
 * categories taxonomy. It is set to be non-hierarchical (similar to tags) by default 
 * and is exposed to the REST API to ensure block editor (Gutenberg) compatibility.
 *
 * @since 1.0.0
 *
 * @return void
 */
function linkers_create_asset_cat(): void {
    $labels = array(
        'name'                  => _x( 'Categories', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Categories', 'Post type singular name', 'textdomain' ),
        'name_admin_bar'        => _x( 'Categories', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Category', 'textdomain' ),
        'new_item'              => __( 'New Category', 'textdomain' ),
        'edit_item'             => __( 'Edit Category', 'textdomain' ),
        'view_item'             => __( 'View Category', 'textdomain' ),
        'all_items'             => __( 'All Categories', 'textdomain' ),
        'search_items'          => __( 'Search Categories', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Category:', 'textdomain' ),
        'not_found'             => __( 'No Categories found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No Categories found in Trash.', 'textdomain' ),
        'archives'              => _x( 'Category archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Category', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Category', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter Categories list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Categories list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Categories list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
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
    register_taxonomy( 'categories', 'digital_asset', $args );
}
add_action( 'init', 'linkers_create_asset_cat' );