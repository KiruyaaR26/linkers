<?php
/**
 * 
 *
 * This file handles the initialization and registration of the 'digital_asset' 
 * custom post type. It defines the administrative labels, REST API support, 
 * and UI configurations required to manage digital assets seamlessly within 
 * the WordPress ecosystem.
 *
 * @package     linkers
 * @subpackage  Content
 * @link        renders.php
 * @version     1.0.0
 * @author      Muhammad Ridho Nur Islam
 * @copyright   2026. All rights reserved.
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


function linkers_register_cpt_dokumen() {
    // Label tampilan di menu admin WordPress
    $labels = array(
        'name'               => 'Dokumen Repository',
        'singular_name'      => 'Dokumen',
        'menu_name'          => 'Dokumen',
        'add_new'            => 'Tambah Dokumen',
        'add_new_item'       => 'Tambah Dokumen Baru',
        'edit_item'          => 'Edit Dokumen',
        'new_item'           => 'Dokumen Baru',
        'view_item'          => 'Lihat Dokumen',
        'search_items'       => 'Cari Dokumen',
        'not_found'          => 'Dokumen tidak ditemukan',
        'not_found_in_trash' => 'Tidak ada dokumen di sampah',
    );

    // pengaturan utama custome post type
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'has_archive'        => true,
        'menu_icon'          => 'dashicons-media-document',
        // judul, cuplikan isi (excerpt), dan gambar sampul (thumbnail)
        'supports'           => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        'show_in_rest'       => true,
    );

    // daftarin cpt pake slug linkers_doc
    register_post_type( 'linkers_doc', $args );
}

// jalanin pendaftaran cpt saat wp diinisialisasi
add_action( 'init', 'linkers_register_cpt_dokumen' );