<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_triatlon_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tri-time',
        HC_PLUGIN_URL . 'modules/triatlon-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tri-time-css',
        HC_PLUGIN_URL . 'modules/triatlon-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tri-time">
        <h3>Triatlon Toplam Süre Hesabı</h3>
        <div class="hc-tri-input-grid">
            <div class="hc-form-group">
                <label>Yüzme (dk:sn):</label>
                <div class="hc-time-row">
                    <input type="number" id="hc-tt-swim-m" placeholder="25">
                    <input type="number" id="hc-tt-swim-s" placeholder="00">
                </div>
            </div>
            <div class="hc-form-group">
                <label>Bisiklet (sa:dk):</label>
                <div class="hc-time-row">
                    <input type="number" id="hc-tt-bike-h" placeholder="1">
                    <input type="number" id="hc-tt-bike-m" placeholder="20">
                </div>
            </div>
            <div class="hc-form-group">
                <label>Koşu (dk:sn):</label>
                <div class="hc-time-row">
                    <input type="number" id="hc-tt-run-m" placeholder="50">
                    <input type="number" id="hc-tt-run-s" placeholder="00">
                </div>
            </div>
            <div class="hc-form-group">
                <label>Geçişler (T1+T2 dk):</label>
                <input type="number" id="hc-tt-t" placeholder="5">
            </div>
        </div>
        <button class="hc-btn" onclick="hcTriTimeHesapla()">Toplam Süreyi Hesapla</button>
        <div class="hc-result" id="hc-tri-time-result">
            <strong>Toplam Bitiş Süresi:</strong>
            <div id="hc-tt-res-val" class="hc-result-value">-</div>
            <span>Saat : Dakika : Saniye</span>
        </div>
    </div>
    <?php
}
