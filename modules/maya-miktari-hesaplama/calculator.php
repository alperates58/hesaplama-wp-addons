<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maya_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yeast-quantity-js',
        HC_PLUGIN_URL . 'modules/maya-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yeast-quantity-css',
        HC_PLUGIN_URL . 'modules/maya-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yeast-quantity">
        <h3>Maya Miktarı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-yq-flour">Un Miktarı (Gram)</label>
            <input type="number" id="hc-yq-flour" value="1000" step="50">
        </div>

        <div class="hc-form-group">
            <label for="hc-yq-time">Hedef Mayalanma Süresi</label>
            <select id="hc-yq-time">
                <option value="0.01">Standart (1.5 - 2 Saat)</option>
                <option value="0.005">Yavaş (3 - 4 Saat)</option>
                <option value="0.02">Hızlı (45 - 60 Dakika)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcMayaMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-yeast-quantity-result">
            <div class="hc-result-item">
                <span>Instant Maya:</span>
                <strong id="hc-yq-res-instant">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Yaş Maya:</span>
                <strong id="hc-yq-res-fresh">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama: Un miktarının yüzdesi olarak hesaplanır. Hava sıcaklığı mayalanma süresini etkiler.</div>
        </div>
    </div>
    <?php
}
