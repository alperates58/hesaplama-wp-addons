<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dakika_basina_maliyet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dakika-basina-maliyet-hesaplama',
        HC_PLUGIN_URL . 'modules/dakika-basina-maliyet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dakika-basina-maliyet-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dakika-basina-maliyet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-min-cost">
        <h3>Dakika Başına Maliyet</h3>
        <div class="hc-form-group">
            <label for="hc-mc-price">Toplam Fiyat (₺)</label>
            <input type="number" id="hc-mc-price" placeholder="Örn: 200">
        </div>
        <div class="hc-form-group">
            <label>Süre</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-mc-hr" placeholder="Saat" value="0">
                <input type="number" id="hc-mc-min" placeholder="Dakika" value="0">
            </div>
        </div>
        <button class="hc-btn" onclick="hcDakikaBaşınaMaliyetHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mc-result">
            <div class="hc-result-label">Dakika Maliyeti:</div>
            <div class="hc-result-value" id="hc-mc-val">-</div>
        </div>
    </div>
    <?php
}
