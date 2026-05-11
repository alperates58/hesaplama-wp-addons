<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bilgi_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bilgi-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/bilgi-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bilgi-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bilgi-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bilgi-orani">
        <h3>Bilgi Oranı Hesaplama (IR)</h3>
        <div class="hc-form-group">
            <label for="hc-ir-portfolio">Portföy Getirisi (%)</label>
            <input type="number" id="hc-ir-portfolio" placeholder="Örn: 25" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ir-benchmark">Karşılaştırma Ölçütü Getirisi (%)</label>
            <input type="number" id="hc-ir-benchmark" placeholder="Örn: 18" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ir-tracking">Takip Hatası (Tracking Error %)</label>
            <input type="number" id="hc-ir-tracking" placeholder="Örn: 4" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcBilgiOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ir-result">
            <div class="hc-result-item">
                <span>Bilgi Oranı (IR):</span>
                <strong class="hc-result-value" id="hc-ir-value">-</strong>
            </div>
            <p class="hc-small-text">IR ne kadar yüksekse, yönetici risk başına o kadar fazla katma değer yaratmıştır.</p>
        </div>
    </div>
    <?php
}
