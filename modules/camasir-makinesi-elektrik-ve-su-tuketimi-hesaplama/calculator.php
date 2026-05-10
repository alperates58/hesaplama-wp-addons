<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_camasir_makinesi_elektrik_ve_su_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-camasir-makinesi-elektrik-ve-su-tuketimi-hesaplama',
        HC_PLUGIN_URL . 'modules/camasir-makinesi-elektrik-ve-su-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-camasir-makinesi-elektrik-ve-su-tuketimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/camasir-makinesi-elektrik-ve-su-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-washer">
        <h3>Çamaşır Makinesi Tüketim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-wm-program">Yıkama Programı</label>
            <select id="hc-wm-program">
                <option value="0.5|40">Hızlı / Ekonomik (0.5 kWh, 40L)</option>
                <option value="1.0|50" selected>Pamuklu 40°C (1.0 kWh, 50L)</option>
                <option value="1.8|65">Hijyen / 90°C (1.8 kWh, 65L)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-wm-count">Haftalık Yıkama Sayısı</label>
            <input type="number" id="hc-wm-count" value="4">
        </div>
        <button class="hc-btn" onclick="hcÇamaşırMakinesiElektrikVeSuTüketimiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wm-result">
            <div class="hc-result-label">Tahmini Aylık Maliyet:</div>
            <div class="hc-result-value" id="hc-wm-val">-</div>
            <p id="hc-wm-details" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
