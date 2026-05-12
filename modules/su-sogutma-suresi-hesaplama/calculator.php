<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_sogutma_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-water-cool-js',
        HC_PLUGIN_URL . 'modules/su-sogutma-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-water-cool-css',
        HC_PLUGIN_URL . 'modules/su-sogutma-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-cool">
        <h3>Su Soğutma Süresi</h3>
        
        <div class="hc-form-group">
            <label for="hc-wc-start">Mevcut Sıcaklık (°C)</label>
            <input type="number" id="hc-wc-start" value="25" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-wc-target">Hedef Sıcaklık (°C)</label>
            <input type="number" id="hc-wc-target" value="10" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-wc-env">Soğutma Ortamı</label>
            <select id="hc-wc-env">
                <option value="4">Buzdolabı (4°C)</option>
                <option value="-18">Dondurucu (-18°C)</option>
                <option value="0">Buzlu Su (0°C)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSuSogumaSuresiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-water-cool-result">
            <div class="hc-result-item">
                <span>Tahmini Süre:</span>
                <strong class="hc-result-value" id="hc-wc-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama 500ml su ve standart kaplar için yaklaşık değerdir.</div>
        </div>
    </div>
    <?php
}
