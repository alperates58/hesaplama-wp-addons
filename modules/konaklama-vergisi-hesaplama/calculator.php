<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_konaklama_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-konaklama-vergi',
        HC_PLUGIN_URL . 'modules/konaklama-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-konaklama-vergi-css',
        HC_PLUGIN_URL . 'modules/konaklama-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-konaklama">
        <h3>Konaklama Vergisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kn-price">Otel Konaklama Bedeli (KDV Hariç ₺)</label>
            <input type="number" id="hc-kn-price" placeholder="Örn: 5.000">
        </div>
        <button class="hc-btn" onclick="hcKonaklamaVergisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kn-result">
            <div class="hc-result-item">
                <span>Konaklama Vergisi (%2):</span>
                <strong id="hc-kn-res-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>KDV (%10):</span>
                <strong id="hc-kn-res-kdv">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Toplam Ödenecek:</span>
                <strong class="hc-result-value" id="hc-kn-res-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
