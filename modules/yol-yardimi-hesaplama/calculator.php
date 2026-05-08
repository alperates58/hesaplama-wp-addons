<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yol_yardimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yol-yardimi',
        HC_PLUGIN_URL . 'modules/yol-yardimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yol-yardimi-css',
        HC_PLUGIN_URL . 'modules/yol-yardimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yol-yardimi-hesaplama">
        <h3>Yol Yardımı Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-yo-daily">Günlük Yol Bedeli (TL)</label>
            <input type="number" id="hc-yo-daily" value="158">
        </div>

        <div class="hc-form-group">
            <label for="hc-yo-days">Çalışılan Gün Sayısı</label>
            <input type="number" id="hc-yo-days" value="22">
        </div>
        
        <button class="hc-btn" onclick="hcYolHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-yol-result">
            <div class="hc-result-item">
                <span>Günlük İstisna Limiti:</span>
                <strong>158,00 ₺</strong>
            </div>
            <div class="hc-result-value" id="hc-yo-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Aylık Toplam Yol Yardımı</p>
        </div>
    </div>
    <?php
}
