<?php
/**
 * Backers: Latest Additions (Versi Simpel Pemula)
 * Lokasi: backers/latest-additions.php
 */

if ( ! defined( 'ABSPATH' ) ) {
    // Cegah akses langsung ke file
    exit;
}

function linkers_run_latest_additions() {
    // Siapkan aturan pencarian dokumen terbaru yang sudah publish dan berstatus publik
    $aturan = array(
        'post_type'      => 'linkers_doc',
        'post_status'    => 'publish',
        'posts_per_page' => 10,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => array(
            array(
                'key'   => '_status_akses',
                'value' => 'public',
            ),
        ),
    );

    $query_dokumen = new WP_Query( $aturan );

    ob_start();

    echo '<h3>Koleksi Terbaru</h3>';

    // Decision: Cek apakah dokumen baru tersedia
    if ( $query_dokumen->have_posts() ) {
        // Cabang YA: Tampilkan daftar dokumen terbaru
        echo '<ul>';
        while ( $query_dokumen->have_posts() ) {
            $query_dokumen->the_post();
            $doc_id = get_the_ID();

            // Ambil data sesuai struktur data Latest Additions
            $judul       = get_the_title();
            $pembuat     = get_post_meta( $doc_id, '_nama_pembuat', true );
            $waktu_masuk = get_the_date( 'd M Y' );
            $tautan      = get_permalink();
            $cuplikan    = get_the_excerpt();

            // Ambil jenis koleksi dari taksonomi jenis_koleksi
            $terms = get_the_terms( $doc_id, 'jenis_koleksi' );
            $jenis = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0]->name : 'Dokumen';

            echo '<li>';

            // Tampilkan gambar kecil (thumbnail) jika tersedia
            if ( has_post_thumbnail() ) {
                the_post_thumbnail( 'thumbnail' );
                echo '<br>';
            }

            echo '<a href="' . esc_url( $tautan ) . '"><strong>' . esc_html( $judul ) . '</strong></a><br>';
            echo '<small>Jenis: ' . esc_html( $jenis ) . ' | Penulis: ' . esc_html( $pembuat ) . ' | Masuk: ' . esc_html( $waktu_masuk ) . '</small>';

            if ( ! empty( $cuplikan ) ) {
                echo '<p>' . esc_html( $cuplikan ) . '</p>';
            }

            echo '</li>';
        }
        echo '</ul>';
    } else {
        // Cabang TIDAK: Tampilkan pesan kosong sesuai flowchart
        echo '<p>Belum ada dokumen baru nih</p>';
    }

    wp_reset_postdata();
    return ob_get_clean();
}

// Daftarkan shortcode [linkers_latest_additions]
add_shortcode( 'linkers_latest_additions', 'linkers_run_latest_additions' );