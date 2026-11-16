<?php
/**
 * Registers the 'Aspect Ratios' custom taxonomy.
 *
 * Initializes the 'aspect_ratio' custom taxonomy for the 'digital_asset' post type. 
 * This enables the organization of digital assets based on their screen 
 * proportions or aspect ratio (e.g., 16:9, 4:3, 1:1).
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
 * Registers the 'aspect_ratio' custom taxonomy for the 'digital_asset' post type.
 *
 * This function defines the labels, visibility, and behavioral arguments for the 
 * aspect ratio taxonomy. It is set to be non-hierarchical (similar to standard tags) 
 * and is exposed to the REST API to ensure block editor (Gutenberg) compatibility.
 *
 * @since 1.0.0
 *
 * @return void
 */
function linkers_create_asset_aspect_ratio(): void {
    $labels = array(
        'name'                       => _x( 'Aspect Ratios', 'Taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Aspect Ratio', 'Taxonomy singular name', 'textdomain' ),
        'menu_name'                  => __( 'Aspect Ratios', 'textdomain' ),
        'all_items'                  => __( 'All Aspect Ratios', 'textdomain' ),
        'parent_item'                => __( 'Parent Aspect Ratio', 'textdomain' ),
        'parent_item_colon'          => __( 'Parent Aspect Ratio:', 'textdomain' ),
        'new_item_name'              => __( 'New Aspect Ratio Name', 'textdomain' ),
        'add_new_item'               => __( 'Add New Aspect Ratio', 'textdomain' ),
        'edit_item'                  => __( 'Edit Aspect Ratio', 'textdomain' ),
        'update_item'                => __( 'Update Aspect Ratio', 'textdomain' ),
        'view_item'                  => __( 'View Aspect Ratio', 'textdomain' ),
        'separate_items_with_commas' => __( 'Separate aspect ratios with commas', 'textdomain' ),
        'add_or_remove_items'        => __( 'Add or remove aspect ratios', 'textdomain' ),
        'choose_from_most_used'      => __( 'Choose from the most used aspect ratios', 'textdomain' ),
        'popular_items'              => __( 'Popular Aspect Ratios', 'textdomain' ),
        'search_items'               => __( 'Search Aspect Ratios', 'textdomain' ),
        'not_found'                  => __( 'Not Found', 'textdomain' ),
        'no_terms'                   => __( 'No aspect ratios', 'textdomain' ),
        'items_list'                 => __( 'Aspect Ratios list', 'textdomain' ),
        'items_list_navigation'      => __( 'Aspect Ratios list navigation', 'textdomain' ),
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
        'rewrite'            => array( 'slug' => 'aspect-ratio' ),
        'hierarchical'       => false, 
    );
    
    register_taxonomy( 'aspect_ratio', 'digital_asset', $args );
}
add_action( 'init', 'linkers_create_asset_aspect_ratio' );