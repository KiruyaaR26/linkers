<?php

// abort if this file is called directly
if ( ! defined( 'ABSPATH' ) || ! defined( 'WPINC' ) || ! function_exists( 'add_action' ) ) {
    echo 'Hi there! I just a extended module, please back.';
    exit;
}

function linkers_register_tax_browse() {
    // label untuk kelompok kategori atau topik
    $labels_topik = array(
        'name'              => 'Topik / Subjek',
        'singular_name'     => 'Topik',
        'search_items'      => 'Cari Topik',
        'all_items'         => 'Semua Topik',
        'parent_item'       => 'Induk Topik',
        'parent_item_colon' => 'Induk Topik:',
        'edit_item'         => 'Edit Topik',
        'update_item'       => 'Perbarui Topik',
        'add_new_item'      => 'Tambah Topik Baru',
        'new_item_name'     => 'Nama Topik Baru',
        'menu_name'         => 'Topik / Subjek',
    );

    // pengaturan taksonomi topik_dokumen (hierarkis kayak kategori)
    register_taxonomy(
        'topik_dokumen',
        array( 'linkers_doc' ),
        array(
            'hierarchical'      => true,
            'labels'            => $labels_topik,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true,
        )
    );

    // label untuk kelompok tahun embuatan
    $labels_tahun = array(
        'name'              => 'Tahun Pembuatan',
        'singular_name'     => 'Tahun',
        'search_items'      => 'Cari Tahun',
        'all_items'         => 'Semua Tahun',
        'edit_item'         => 'Edit Tahun',
        'update_item'       => 'Perbarui Tahun',
        'add_new_item'      => 'Tambah Tahun Baru',
        'new_item_name'     => 'Tahun Baru (Contoh: 2026)',
        'menu_name'         => 'Tahun',
    );

    // pengaturan taksonomi tahun_dokumen (non-hierarkis kayak tag)
    register_taxonomy(
        'tahun_dokumen',
        array( 'linkers_doc' ),
        array(
            'hierarchical'      => false,
            'labels'            => $labels_tahun,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true,
        )
    );
}

// daftarin taksonomi topik dan tahun saat WordPress diinisialisasi
add_action( 'init', 'linkers_register_tax_browse' );