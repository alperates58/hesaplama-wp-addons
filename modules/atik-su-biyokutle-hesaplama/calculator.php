<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atik_su_biyokutle_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-atik-su-biyokutle-hesaplama',
        HC_PLUGIN_URL . 'modules/atik-su-biyokutle-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-atik-su-biyokutle-hesaplama-css',
        HC_PLUGIN_URL . 'modules/atik-su-biyokutle-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-atik-su-biyokutle-hesaplama">
        <h3>Atık Su Biyokütle Hesaplama (MLVSS)</h3>
        <div class="hc-form-group">
            <label for="hc-as-mlss">MLSS Konsantrasyonu (mg/L)</label>
            <input type="number" id="hc-as-mlss" placeholder="Örn: 3000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-as-vss-frac">Uçucu Fraksiyon (VSS/SS Oranı)</label>
            <input type="number" id="hc-as-vss-frac" placeholder="Örn: 0.8" step="0.01" max="1" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-as-tank-vol">Havalandırma Tankı Hacmi (m³)</label>
            <input type="number" id="hc-as-tank-vol" placeholder="Örn: 500" step="any">
        </div>
        <button class="hc-btn" onclick="hcAtikSuBiyokutleHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-as-result">
            <div class="hc-as-grid">
                <div class="hc-as-item">
                    <span class="hc-result-label">MLVSS Konsantrasyonu:</span>
                    <span class="hc-result-value" id="hc-as-mlvss">-</span>
                </div>
                <div class="hc-as-item">
                    <span class="hc-result-label">Toplam Biyokütle:</span>
                    <span class="hc-result-value" id="hc-as-total-bio">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
