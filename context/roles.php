<?php
/**
 * Role-Based Access Control (RBAC) Data Registration.
 *
 * Registers custom user roles (dam_contributor, dam_subscriber) and the
 * 'access_level' taxonomy for the digital_asset post type.
 *
 * @package     linkers
 * @subpackage  Context
 * @link        context/access-roles.php
 * @version     1.0.0
 * @author      Muhammad Ridho Nur Islam
 * @copyright   2026 Gravito linkers Development Team. All rights reserved.
 * @license     MIT
 *
 * NOTICE OF LICENSE:
 * Distribution, modification, or redistribution of this source code, in whole 
 * or in part, is strictly prohibited without prior written authorization from 
 * the copyright holder.
 */

/**
 * Registers custom user roles (Contributor and Subscriber) for the DAM system.
 *
 * Injects new roles into the wp_options table. It checks if the role already 
 * exists to prevent unnecessary database writes on every page load.
 *
 * @since 1.0.0
 * @return void
 */
function linkers_register_access_level_taxonomy() {
    $labels = array(
        'name'          =>  'Access Levels',
        'singular_name' =>  'Access Level',
        'search_items'  =>  'Search Access Levels',
        'all_items'     =>  'All Access Levels',
        'edit_item'     =>  'Edit Access Level',
        'update_item'   =>  'Update Access Level',
        'add_new_item'  =>  'Add New Access Level',
        'new_item_name' =>  'New Access Level Name',
        'menu_name'     =>  'Access Level',
    );
    // hierarchical => true itu nanti bentuknya centang kotak seperti kategori
    // show_in_rest => true biar bisa dibaca rest api & front-end
    $args = array(
        'hierarchical'      =>  true,
        'labels'            =>  $labels,
        'show_ui'           =>  true,
        'show_admin_column' =>  true,
        'query_var'         =>  true,
        'rewrite'           =>  array( 'slug' => 'access-level' ),
        'show_in_rest'      =>  true,
    );
    
    register_taxonomy( 'access_level', array( 'digital_asset' ), $args );
}
add_action( 'init', 'linkers_register_access_level_taxonomy' );

/**
 * Registers new user roles (dam_contributor & dam_subscriber).
 *
 * @since 1.0.0
 * @return void
 */
function linkers_register_custom_roles() {
    
    // daftarin peran subscriber (cuman bisa lihat sama download resolusi rendah)
    // get_role mengecek apakah jabatannya sudah ada di database atau belum
    if ( ! get_role( 'dam_subscriber' ) ) {
        // kalau belum ada, tambahin jabatannya ke wordpress
        add_role(
            'dam_subscriber',
            'DAM Subscriber',
            array(
                'read'                   => true,
                'download_low_res_asset' => true,
                'download_master_asset'  => false,
                'upload_digital_asset'   => false,
                'view_internal_asset'    => false,
            )
        );
    }

    // mendaftarkan peran contributor (bisa upload, edit, tapi tetap tidak bisa download master)
    if ( ! get_role( 'dam_contributor' ) ) {
        add_role(
            'dam_contributor',
            'DAM Contributor',
            array(
                'read'                   => true,
                'upload_digital_asset'   => true,
                'edit_digital_assets'    => true, 
                'download_low_res_asset' => true,
                'download_master_asset'  => false,
                'view_internal_asset'    => true,
            )
        );
    }
}

// hook 
add_action( 'init', 'linkers_register_custom_roles' );