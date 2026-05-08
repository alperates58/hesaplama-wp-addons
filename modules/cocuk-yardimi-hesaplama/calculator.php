<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cocuk_yardimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cocuk-yardimi',
        HC_PLUGIN_URL . 'modules/cocuk-yardimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cocuk-yardimi-css',
        HC_PLUGIN_URL . 'modules/cocuk-yardimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cocuk-yardimi-hesaplama">
        <h3>Çocuk Yardımı Hesaplama (2026)</h3>
        
        <div class="hc-form-group">
            <label for="hc-cy-count-small">0-6 Yaş Grubu Çocuk Sayısı</label>
            <input type="number" id="hc-cy-count-small" value="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-cy-count-big">6 Yaş Üstü Çocuk Sayısı</label>
            <input type="number" id="hc-cy-count-big" value="0">
        </div>
        
        <button class="hc-btn" onclick="hcCocukHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-cocuk-result">
            <div class="hc-result-item">
                <span>0-6 Yaş Yardımı (Birim):</span>
                <strong>693,93 ₺</strong>
            </div>
            <div class="hc-result-item">
                <span>6+ Yaş Yardımı (Birim):</span>
                <strong>346,96 ₺</strong>
            </div>
            <div class="hc-result-value" id="hc-cy-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Aylık Toplam Çocuk Yardımı</p>
        </div>
    </div>
    <?php
}
