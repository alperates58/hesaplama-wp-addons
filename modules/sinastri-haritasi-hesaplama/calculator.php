<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sinastri_haritasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sinastri-haritasi',
        HC_PLUGIN_URL . 'modules/sinastri-haritasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sinastri-haritasi-css',
        HC_PLUGIN_URL . 'modules/sinastri-haritasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sinastri-haritasi">
        <h3>Sinastri Haritası (Açı Tablosu)</h3>
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>1. Kişi Doğum Tarihi</label>
                <input type="date" id="hc-sh-d1" class="hc-input">
            </div>
            <div class="hc-form-group">
                <label>2. Kişi Doğum Tarihi</label>
                <input type="date" id="hc-sh-d2" class="hc-input">
            </div>
        </div>
        <button class="hc-btn" onclick="hcSinastriHaritasiHesapla()">Açı Tablosunu Oluştur</button>
        <div class="hc-result" id="hc-sinastri-haritasi-result">
            <div class="hc-table-wrapper">
                <table class="hc-aspect-table" id="hc-aspect-matrix">
                    <!-- Tablo buraya -->
                </table>
            </div>
        </div>
    </div>
    <?php
}
