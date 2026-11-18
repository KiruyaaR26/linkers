<?php
/**
 * Backers: Search Repository (Versi Simpel Pemula)
 * Lokasi: backers/search-repository.php
 */

// abort if this file is called directly
if ( ! defined( 'ABSPATH' ) || ! defined( 'WPINC' ) || ! function_exists( 'add_action' ) ) {
    echo 'Hi there! I just a extended module, please back.';
    exit;
}

function linkers_run_search_repository() {
    // tangkap inputan dari form pencarian kalau pengunjung menekan tombol "cari"
    $kata_kunci = isset( $_GET['cari_kata'] ) ? sanitize_text_field( $_GET['cari_kata'] ) : '';
    $filter_jenis = isset( $_GET['cari_jenis'] ) ? sanitize_text_field( $_GET['cari_jenis'] ) : '';
    $filter_topik = isset( $_GET['cari_topik'] ) ? sanitize_text_field( $_GET['cari_topik'] ) : '';
    $filter_tahun = isset( $_GET['cari_tahun'] ) ? sanitize_text_field( $_GET['cari_tahun'] ) : '';

    // ngambil daftar pilihan dari taxonomy untuk isi dropdown filter
    $list_jenis = get_terms( array( 'taxonomy' => 'jenis_koleksi', 'hide_empty' => false ) );
    $list_topik = get_terms( array( 'taxonomy' => 'topik_dokumen', 'hide_empty' => false ) );
    $list_tahun = get_terms( array( 'taxonomy' => 'tahun_dokumen', 'hide_empty' => false ) );

    ob_start();
    ?>

    <!-- form kotak pencarian -->
    <form method="GET" action="">
        <div>
            <label for="cari_kata">Kata Kunci (Judul / Isi):</label><br>
            <input type="text" id="cari_kata" name="cari_kata" value="<?php echo esc_attr( $kata_kunci ); ?>" placeholder="Ketik judul atau kata kunci...">
        </div>
        <br>

        <div>
            <label for="cari_jenis">Jenis Koleksi:</label><br>
            <select id="cari_jenis" name="cari_jenis">
                <option value="">-- Semua Jenis --</option>
                <?php if ( ! empty( $list_jenis ) && ! is_wp_error( $list_jenis ) ) : ?>
                    <?php foreach ( $list_jenis as $jenis ) : ?>
                        <option value="<?php echo esc_attr( $jenis->slug ); ?>" <?php selected( $filter_jenis, $jenis->slug ); ?>>
                            <?php echo esc_html( $jenis->name ); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <br>

        <div>
            <label for="cari_topik">Topik / Subjek:</label><br>
            <select id="cari_topik" name="cari_topik">
                <option value="">-- Semua Topik --</option>
                <?php if ( ! empty( $list_topik ) && ! is_wp_error( $list_topik ) ) : ?>
                    <?php foreach ( $list_topik as $topik ) : ?>
                        <option value="<?php echo esc_attr( $topik->slug ); ?>" <?php selected( $filter_topik, $topik->slug ); ?>>
                            <?php echo esc_html( $topik->name ); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <br>

        <div>
            <label for="cari_tahun">Tahun Pembuatan:</label><br>
            <select id="cari_tahun" name="cari_tahun">
                <option value="">-- Semua Tahun --</option>
                <?php if ( ! empty( $list_tahun ) && ! is_wp_error( $list_tahun ) ) : ?>
                    <?php foreach ( $list_tahun as $tahun ) : ?>
                        <option value="<?php echo esc_attr( $tahun->slug ); ?>" <?php selected( $filter_tahun, $tahun->slug ); ?>>
                            <?php echo esc_html( $tahun->name ); ?>
                        </option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <br>

        <button type="submit" name="tombol_cari" value="1">Cari Dokumen</button>
        <a href="?">Reset</a>
    </form>
    <hr>

    <?php
    // proses pencarian (dijalankan jika pengunjung sudah mengisi form atau klik cari)
    if ( isset( $_GET['tombol_cari'] ) ) {
        // siapkan aturan pencarian dasar (hanya cpt linkers_doc, sudah publish, dan akses publik)
        $aturan = array(
            'post_type'      => 'linkers_doc',
            'post_status'    => 'publish',
            'posts_per_page' => 20,
            's'              => $kata_kunci,
            'meta_query'     => array(
                array(
                    'key'   => '_status_akses',
                    'value' => 'public',
                ),
            ),
        );

        // siapkan penampung filter taxonomy jika pengunjung memilih dropdown
        $tax_filter = array( 'relation' => 'AND' );

        if ( ! empty( $filter_jenis ) ) {
            $tax_filter[] = array(
                'taxonomy' => 'jenis_koleksi',
                'field'    => 'slug',
                'terms'    => $filter_jenis,
            );
        }

        if ( ! empty( $filter_topik ) ) {
            $tax_filter[] = array(
                'taxonomy' => 'topik_dokumen',
                'field'    => 'slug',
                'terms'    => $filter_topik,
            );
        }

        if ( ! empty( $filter_tahun ) ) {
            $tax_filter[] = array(
                'taxonomy' => 'tahun_dokumen',
                'field'    => 'slug',
                'terms'    => $filter_tahun,
            );
        }

        // masukin filter taxonomy ke aturan jika ada minimal 1 dropdown yang dipilih
        if ( count( $tax_filter ) > 1 ) {
            $aturan['tax_query'] = $tax_filter;
        }

        $hasil_cari = new WP_Query( $aturan );

        echo '<h3>Hasil Pencarian:</h3>';

        // cek apakah dokumen yang dicari ketemu
        if ( $hasil_cari->have_posts() ) {
            echo '<ul>';
            while ( $hasil_cari->have_posts() ) {
                $hasil_cari->the_post();
                $doc_id  = get_the_ID();
                $penulis = get_post_meta( $doc_id, '_nama_pembuat', true );
                $tanggal = get_the_date( 'd M Y' );

                echo '<li>';
                echo '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>';
                echo ' - ' . esc_html( $penulis ) . ' (' . esc_html( $tanggal ) . ')';
                echo '</li>';
            }
            echo '</ul>';
        } else {
            echo '<p>Dokumen yang kamu cari nggak ketemu nih.</p>';
        }

        wp_reset_postdata();
    }

    return ob_get_clean();
}

// daftar shortcode [linkers_search_repository]
add_shortcode( 'linkers_search_repository', 'linkers_run_search_repository' );