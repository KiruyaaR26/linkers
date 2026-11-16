<?php
/**
 * Registers the 'Access' custom taxonomy.
 *
 * Initializes the 'access_level' custom taxonomy for the 'digital_asset' post type. 
 * This enables the organization and restriction of digital assets based on 
 * their access permissions (e.g., Public, Internal, Confidential, Restricted).
 *
 * @package     linkers
 * @subpackage  Context
 * @link        renders.php
 * @version     1.0.0
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
 * Registers the 'access_level' custom taxonomy for the 'digital_asset' post type.
 *
 * This function defines the labels, visibility, and behavioral arguments for the 
 * access level taxonomy. It is set to be hierarchical (similar to categories) 
 * and is exposed to the REST API to ensure block editor (Gutenberg) compatibility.
 *
 * @since 1.0.0
 *
 * @return void
 */
function linkers_create_asset_access(): void {
    $labels = array(
        'name'                       => _x( 'Access Levels', 'Taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Access Level', 'Taxonomy singular name', 'textdomain' ),
        'menu_name'                  => __( 'Access', 'textdomain' ),
        'all_items'                  => __( 'All Access Levels', 'textdomain' ),
        'parent_item'                => __( 'Parent Access Level', 'textdomain' ),
        'parent_item_colon'          => __( 'Parent Access Level:', 'textdomain' ),
        'new_item_name'              => __( 'New Access Level Name', 'textdomain' ),
        'add_new_item'               => __( 'Add New Access Level', 'textdomain' ),
        'edit_item'                  => __( 'Edit Access Level', 'textdomain' ),
        'update_item'                => __( 'Update Access Level', 'textdomain' ),
        'view_item'                  => __( 'View Access Level', 'textdomain' ),
        'separate_items_with_commas' => __( 'Separate access levels with commas', 'textdomain' ),
        'add_or_remove_items'        => __( 'Add or remove access levels', 'textdomain' ),
        'choose_from_most_used'      => __( 'Choose from the most used access levels', 'textdomain' ),
        'popular_items'              => __( 'Popular Access Levels', 'textdomain' ),
        'search_items'               => __( 'Search Access Levels', 'textdomain' ),
        'not_found'                  => __( 'Not Found', 'textdomain' ),
        'no_terms'                   => __( 'No access levels', 'textdomain' ),
        'items_list'                 => __( 'Access Levels list', 'textdomain' ),
        'items_list_navigation'      => __( 'Access Levels list navigation', 'textdomain' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'show_admin_column'  => true, 
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'access-level' ),
        'hierarchical'       => true, 
    );
    
    // Menggunakan 'access_level' sebagai slug taxonomy
    register_taxonomy( 'access_level', 'digital_asset', $args );
}
add_action( 'init', 'linkers_create_asset_access' );