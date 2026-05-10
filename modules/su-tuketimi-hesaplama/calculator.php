<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_su_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-water-cons',
        HC_PLUGIN_URL . 'modules/su-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-water-cons-css',
        HC_PLUGIN_URL . 'modules/su-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water-cons">
        <h3>Su Tüketimi Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-wc-people">Kişi Sayısı:</label>
            <input type="number" id="hc-wc-people" placeholder="4">
        </div>
        <div class="hc-form-group">
            <label for="hc-wc-avg">Kişi Başı Günlük Tüketim (Litre):</label>
            <input type="number" id="hc-wc-avg" placeholder="150">
            <small>Türkiye ortalaması yaklasık 150-190 L'dir.</small>
        </div>
        <button class="hc-btn" onclick="hcWaterConsHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-water-cons-result">
            <strong>Aylık Toplam Tüketim (30 Gün):</strong>
            <div id="hc-wc-res-val" class="hc-result-value">-</div>
            <span>m³ (Metreküp)</span>
        </div>
    </div>
    <?php
}
