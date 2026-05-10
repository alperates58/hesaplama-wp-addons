<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nabiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hr-simple',
        HC_PLUGIN_URL . 'modules/nabiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hr-simple-css',
        HC_PLUGIN_URL . 'modules/nabiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hr-simple">
        <h3>Nabız (Kalp Atım Hızı) Ölçümü</h3>
        <div class="hc-form-group">
            <label for="hc-hrs-count">Saydığınız Atım Sayısı:</label>
            <input type="number" id="hc-hrs-count" placeholder="15">
        </div>
        <div class="hc-form-group">
            <label for="hc-hrs-seconds">Ölçüm Süresi (Saniye):</label>
            <select id="hc-hrs-seconds">
                <option value="6">6 Saniye</option>
                <option value="10">10 Saniye</option>
                <option value="15" selected>15 Saniye</option>
                <option value="30">30 Saniye</option>
                <option value="60">60 Saniye (1 Dakika)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcHrSimpleHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hr-simple-result">
            <strong>Dakikadaki Nabız:</strong>
            <div id="hc-hrs-res-val" class="hc-result-value">-</div>
            <span>BPM</span>
        </div>
    </div>
    <?php
}
