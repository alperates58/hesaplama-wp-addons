<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_havuz_tuz_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-havuz-tuz-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/havuz-tuz-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-havuz-tuz-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/havuz-tuz-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pool-salt">
        <h3>Havuz Tuz Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ps-vol">Havuz Hacmi (m³)</label>
            <input type="number" id="hc-ps-vol" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-ps-current">Mevcut Tuz Seviyesi (ppm)</label>
            <input type="number" id="hc-ps-current" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ps-target">Hedef Tuz Seviyesi (ppm)</label>
            <input type="number" id="hc-ps-target" value="3200">
            <small>Genellikle 3000-3400 ppm önerilir.</small>
        </div>
        <button class="hc-btn" onclick="hcHavuzTuzMiktarıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ps-result">
            <div class="hc-result-label">Eklenmesi Gereken Tuz:</div>
            <div class="hc-result-value" id="hc-ps-val">-</div>
        </div>
    </div>
    <?php
}
