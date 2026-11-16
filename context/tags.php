<?php
/**
 * Registers the 'Tags' custom taxonomy.
 *
 * Initializes the non-hierarchical 'tags' taxonomy for the 'digital_asset' post type. 
 * This allows administrators to assign specific keywords to digital assets for better 
 * searchability and classification.
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

declare(strict_types=1);

// Abort if this file is called directly.
if ( ! defined( 'ABSPATH' ) || ! defined( 'WPINC' ) || ! function_exists( 'add_action' ) ) {
    echo 'Hi there! I am just an extended module, please go back.';
    exit;
}

/**
 * Registers the 'tags' custom taxonomy for the 'digital_asset' post type.
 *
 * This function defines the labels, visibility, and behavioral arguments for the 
 * tags taxonomy. It is configured as non-hierarchical (behaving like standard tags) 
 * to allow administrators to assign specific keywords to digital assets for improved 
 * searchability and granular classification.
 *
 * @since 1.0.0
 *
 * @return void
 */
function linkers_create_asset_tag(): void {
    $labels = array(
        'name'                  => _x( 'Tags', 'Post type general name', 'textdomain' ),
        'singular_name'         => _x( 'Tags', 'Post type singular name', 'textdomain' ),
        'name_admin_bar'        => _x( 'Tags', 'Add New on Toolbar', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'add_new_item'          => __( 'Add New Tag', 'textdomain' ),
        'new_item'              => __( 'New Tag', 'textdomain' ),
        'edit_item'             => __( 'Edit Tag', 'textdomain' ),
        'view_item'             => __( 'View Tag', 'textdomain' ),
        'all_items'             => __( 'All Tags', 'textdomain' ),
        'search_items'          => __( 'Search Tags', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Tag:', 'textdomain' ),
        'not_found'             => __( 'No tags found.', 'textdomain' ),
        'not_found_in_trash'    => __( 'No tags found in Trash.', 'textdomain' ),
        'archives'              => _x( 'Tag archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
        'insert_into_item'      => _x( 'Insert into Tag', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Tag', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
        'filter_items_list'     => _x( 'Filter assets list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
        'items_list_navigation' => _x( 'Tags list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
        'items_list'            => _x( 'Tags list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
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
    register_taxonomy( 'tags', 'digital_asset', $args );
}
add_action( 'init', 'linkers_create_asset_tag');
