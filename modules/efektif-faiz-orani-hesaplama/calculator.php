<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_efektif_faiz_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-efektif-faiz-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/efektif-faiz-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-efektif-faiz-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/efektif-faiz-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-efektif-faiz-orani">
        <h3>Efektif Faiz Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-efo-nominal">Nominal Faiz Oranı (%)</label>
            <input type="number" id="hc-efo-nominal" placeholder="Örn: 40" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-efo-period">Bileşik Faiz Dönemi</label>
            <select id="hc-efo-period">
                <option value="12">Aylık (Yılda 12 kez)</option>
                <option value="4">Üç Aylık (Yılda 4 kez)</option>
                <option value="2">Altı Aylık (Yılda 2 kez)</option>
                <option value="365">Günlük (Yılda 365 kez)</option>
                <option value="1">Yıllık (Yılda 1 kez)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcEfektifFaizOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-efo-result">
            <p>Yıllık Efektif Faiz Oranı:</p>
            <div class="hc-result-value" id="hc-efo-value">-</div>
            <p class="hc-small-text">Bileşik faiz etkisiyle oluşan gerçek yıllık maliyet/getiri oranıdır.</p>
        </div>
    </div>
    <?php
}
