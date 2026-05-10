<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hali_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hali-olcusu-hesaplama',
        HC_PLUGIN_URL . 'modules/hali-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hali-olcusu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hali-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rug-size">
        <h3>İdeal Halı Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-rs-width">Oda Genişliği (cm)</label>
            <input type="number" id="hc-rs-width" placeholder="Örn: 400">
        </div>
        <div class="hc-form-group">
            <label for="hc-rs-length">Oda Boyu (cm)</label>
            <input type="number" id="hc-rs-length" placeholder="Örn: 500">
        </div>
        <div class="hc-form-group">
            <label for="hc-rs-style">Yerleşim Stili</label>
            <select id="hc-rs-style">
                <option value="0.8">Tüm Mobilyalar Üstünde (%80 doluluk)</option>
                <option value="0.6" selected>Sadece Ön Ayaklar Üstünde (%60 doluluk)</option>
                <option value="0.4">Sadece Orta Alan (%40 doluluk)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcHalıÖlçüsüHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rs-result">
            <div class="hc-result-label">Önerilen Halı Ölçüsü:</div>
            <div class="hc-result-value" id="hc-rs-val">-</div>
            <p id="hc-rs-info" style="margin-top:10px; font-size:0.9em; color:#666;"></p>
        </div>
    </div>
    <?php
}
