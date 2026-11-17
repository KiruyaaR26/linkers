<?php

// abort if this file is called directly
if ( ! defined( 'ABSPATH' ) || ! defined( 'WPINC' ) || ! function_exists( 'add_action' ) ) {
    echo 'Hi there! I just a extended module, please back.';
    exit;
}

function linkers_register_tax_browse() {
    //label kategory
    $labels = array(
        'name'              =>  'Label Kategory',
        'singular_name'     =>  'Label Kategory',
        'search_items'      =>  'Cari Kategory',
        'all_items'         =>  'Semua Kategory',
        'parent_item'       =>  'Induk Kategory',
        'parent_item_colon' =>  'Induk Kategory',
        'edit_item'         =>  'Edit Kategory',
        'update_item'       =>  'Perbarui Kategory',
        'add_new_item'      =>  'Tambah Kategory',
        'new_item_name'     =>  'Nama Kategory Baru',
        'menu_name'         =>  'Kategory'
    );

    $args = array (
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
    );

     register_taxonomy( 'kategory', array( 'linkers_doc' ), $args );
}

add_action( 'init', 'linkers_register_tax_browse' );