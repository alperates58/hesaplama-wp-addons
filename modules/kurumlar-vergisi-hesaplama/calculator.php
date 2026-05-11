<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kurumlar_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kurumlar-vergisi',
        HC_PLUGIN_URL . 'modules/kurumlar-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kurumlar-vergisi-css',
        HC_PLUGIN_URL . 'modules/kurumlar-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kurumlar-vergi">
        <h3>Kurumlar Vergisi Hesaplama (2026)</h3>
        <div class="hc-form-group">
            <label for="hc-kv-amount">Mali Kâr / Vergi Matrahı (₺)</label>
            <input type="number" id="hc-kv-amount" placeholder="Örn: 1.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kv-rate">Kurumlar Vergisi Oranı (%)</label>
            <input type="number" id="hc-kv-rate" value="25" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcKurumlarVergisiHesapla()">Vergi Hesapla</button>
        <div class="hc-result" id="hc-kv-result">
            <div class="hc-result-item">
                <span>Ödenecek Kurumlar Vergisi:</span>
                <strong class="hc-result-value" id="hc-kv-res-total">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Kâr (Vergi Sonrası):</span>
                <strong id="hc-kv-res-net">-</strong>
            </div>
        </div>
    </div>
    <?php
}
