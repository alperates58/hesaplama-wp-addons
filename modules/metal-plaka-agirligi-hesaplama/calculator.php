<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_metal_plaka_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-plate-weight',
        HC_PLUGIN_URL . 'modules/metal-plaka-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-plate-weight-css',
        HC_PLUGIN_URL . 'modules/metal-plaka-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-plate">
        <h3>Metal Plaka Ağırlık Hesabı</h3>
        <div class="hc-plate-grid">
            <div class="hc-form-group">
                <label>Genişlik (mm):</label>
                <input type="number" id="hc-pw-w" placeholder="1000">
            </div>
            <div class="hc-form-group">
                <label>Uzunluk (mm):</label>
                <input type="number" id="hc-pw-l" placeholder="2000">
            </div>
            <div class="hc-form-group">
                <label>Kalınlık (mm):</label>
                <input type="number" id="hc-pw-t" placeholder="5">
            </div>
            <div class="hc-form-group">
                <label>Malzeme:</label>
                <select id="hc-pw-mat">
                    <option value="7.85">Çelik (7.85)</option>
                    <option value="2.7">Alüminyum (2.70)</option>
                    <option value="8.96">Bakır (8.96)</option>
                    <option value="8.0">Paslanmaz Çelik (8.00)</option>
                </select>
            </div>
        </div>
        <button class="hc-btn" onclick="hcPlateWeightHesapla()">Ağırlığı Hesapla</button>
        <div class="hc-result" id="hc-plate-result">
            <strong>Toplam Ağırlık:</strong>
            <div id="hc-pw-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
        </div>
    </div>
    <?php
}
