<?php
/**
 * Registers the 'Countries' custom taxonomy.
 *
 * Initializes the 'country' custom taxonomy for the 'digital_asset' post type. 
 * This enables the organization of digital assets based on their originating 
 * country or geographic location.
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
 * Registers the 'country' custom taxonomy for the 'digital_asset' post type.
 *
 * This function defines the labels, visibility, and behavioral arguments for the 
 * country taxonomy. It is set to non-hierarchical (behaving like tags) by default 
 * to categorize digital assets based on their country of origin or geographic location.
 *
 * @since 1.0.0
 *
 * @return void
 */
function linkers_create_asset_country(): void {
    $labels = array(
        'name'                       => _x( 'Countries', 'Taxonomy general name', 'textdomain' ),
        'singular_name'              => _x( 'Country', 'Taxonomy singular name', 'textdomain' ),
        'menu_name'                  => __( 'Countries', 'textdomain' ),
        'all_items'                  => __( 'All Countries', 'textdomain' ),
        'parent_item'                => __( 'Parent Country', 'textdomain' ),
        'parent_item_colon'          => __( 'Parent Country:', 'textdomain' ),
        'new_item_name'              => __( 'New Country Name', 'textdomain' ),
        'add_new_item'               => __( 'Add New Country', 'textdomain' ),
        'edit_item'                  => __( 'Edit Country', 'textdomain' ),
        'update_item'                => __( 'Update Country', 'textdomain' ),
        'view_item'                  => __( 'View Country', 'textdomain' ),
        'separate_items_with_commas' => __( 'Separate countries with commas', 'textdomain' ),
        'add_or_remove_items'        => __( 'Add or remove countries', 'textdomain' ),
        'choose_from_most_used'      => __( 'Choose from the most used countries', 'textdomain' ),
        'popular_items'              => __( 'Popular Countries', 'textdomain' ),
        'search_items'               => __( 'Search Countries', 'textdomain' ),
        'not_found'                  => __( 'Not Found', 'textdomain' ),
        'no_terms'                   => __( 'No countries', 'textdomain' ),
        'items_list'                 => __( 'Countries list', 'textdomain' ),
        'items_list_navigation'      => __( 'Countries list navigation', 'textdomain' ),
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
        'rewrite'            => array( 'slug' => 'country' ),
        'hierarchical'       => false,
    );
    
    register_taxonomy( 'country', 'digital_asset', $args );
}
add_action( 'init', 'linkers_create_asset_country' );