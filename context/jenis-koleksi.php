<?php

// abort if this file is called directly
if ( ! defined( 'ABSPATH' ) || ! defined( 'WPINC' ) || ! function_exists( 'add_action' ) ) {
    echo 'Hi there! I just a extended module, please back.';
    exit;
}

function linkers_register_tax_jenis_koleksi() {
    // label tampilan taksonomi di dashboard admin
    $labels = array(
        'name'              => 'Jenis Koleksi',
        'singular_name'     => 'Jenis Koleksi',
        'search_items'      => 'Cari Jenis Koleksi',
        'all_items'         => 'Semua Jenis Koleksi',
        'parent_item'       => 'Induk Jenis Koleksi',
        'parent_item_colon' => 'Induk Jenis Koleksi:',
        'edit_item'         => 'Edit Jenis Koleksi',
        'update_item'       => 'Perbarui Jenis Koleksi',
        'add_new_item'      => 'Tambah Jenis Koleksi Baru',
        'new_item_name'     => 'Nama Jenis Koleksi Baru',
        'menu_name'         => 'Jenis Koleksi',
    );

    // pengaturan taksonomi menyerupai kategori (hierarkis)
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest'      => true,
    );

    // hubungkan taksonomi jenis_koleksi ke CPT linkers_doc
    register_taxonomy( 'jenis_koleksi', array( 'linkers_doc' ), $args );
}

// jalankan pendaftaran taksonomi saat wordpress diinisialisasi
add_action( 'init', 'linkers_register_tax_jenis_koleksi' );