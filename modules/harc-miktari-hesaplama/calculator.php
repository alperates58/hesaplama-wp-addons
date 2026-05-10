<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_harc_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mortar-calc',
        HC_PLUGIN_URL . 'modules/harc-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mortar-calc-css',
        HC_PLUGIN_URL . 'modules/harc-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mortar">
        <h3>Harç Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-mc-vol">Toplam Harç Hacmi (m³):</label>
            <input type="number" id="hc-mc-vol" step="0.1" placeholder="1.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-mc-mix">Karışım Oranı (Çimento:Kum):</label>
            <select id="hc-mc-mix">
                <option value="3">1:3 (Güçlü Harç)</option>
                <option value="4" selected>1:4 (Genel Duvar/Sıva)</option>
                <option value="6">1:6 (Dolgu Harcı)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMortarCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mortar-result">
            <div class="hc-mortar-grid">
                <div class="hc-mortar-item">
                    <strong>Çimento</strong>
                    <div id="hc-mc-res-cem">-</div>
                    <span>Torba (50kg)</span>
                </div>
                <div class="hc-mortar-item">
                    <strong>Kum</strong>
                    <div id="hc-mc-res-sand">-</div>
                    <span>m³</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
