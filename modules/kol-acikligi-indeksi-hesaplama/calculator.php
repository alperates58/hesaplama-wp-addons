<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kol_acikligi_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kol-acikligi-indeksi-hesaplama',
        HC_PLUGIN_URL . 'modules/kol-acikligi-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kol-acikligi-indeksi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kol-acikligi-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ape-index">
        <h3>Kol Açıklığı İndeksi (Ape Index)</h3>
        <div class="hc-form-group">
            <label for="hc-ape-height">Boyunuz (cm)</label>
            <input type="number" id="hc-ape-height" placeholder="Örn: 180">
        </div>
        <div class="hc-form-group">
            <label for="hc-ape-span">Kol Açıklığınız (cm)</label>
            <input type="number" id="hc-ape-span" placeholder="Parmak uçlarından parmak uçlarına">
        </div>
        <button class="hc-btn" onclick="hcKolAcikligiIndeksiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ape-result">
            <div class="hc-result-label">Oran:</div>
            <div class="hc-result-value" id="hc-ape-val">-</div>
            <div id="hc-ape-comment" style="margin-top: 10px; font-weight: 500;"></div>
        </div>
    </div>
    <?php
}
