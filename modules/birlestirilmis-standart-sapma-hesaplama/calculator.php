<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_birlestirilmis_standart_sapma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-birlestirilmis-standart-sapma-hesaplama',
        HC_PLUGIN_URL . 'modules/birlestirilmis-standart-sapma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-birlestirilmis-standart-sapma-hesaplama-css',
        HC_PLUGIN_URL . 'modules/birlestirilmis-standart-sapma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pooled-sd">
        <h3>Birleştirilmiş Standart Sapma (Pooled SD)</h3>
        <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <div class="hc-group-box">
                <h4>Grup 1</h4>
                <div class="hc-form-group">
                    <label>Örneklem Sayısı (n₁):</label>
                    <input type="number" id="hc-psd-n1" class="hc-input" placeholder="Örn: 30">
                </div>
                <div class="hc-form-group">
                    <label>Standart Sapma (s₁):</label>
                    <input type="number" id="hc-psd-s1" class="hc-input" placeholder="Örn: 5.2" step="any">
                </div>
            </div>
            <div class="hc-group-box">
                <h4>Grup 2</h4>
                <div class="hc-form-group">
                    <label>Örneklem Sayısı (n₂):</label>
                    <input type="number" id="hc-psd-n2" class="hc-input" placeholder="Örn: 25">
                </div>
                <div class="hc-form-group">
                    <label>Standart Sapma (s₂):</label>
                    <input type="number" id="hc-psd-s2" class="hc-input" placeholder="Örn: 4.8" step="any">
                </div>
            </div>
        </div>
        <button class="hc-btn" style="margin-top:20px;" onclick="hcPooledSDHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-birlestirilmis-standart-sapma-hesaplama-result">
            <div class="hc-result-label">Birleştirilmiş Standart Sapma (s_p):</div>
            <div class="hc-result-value" id="hc-res-psd-val">-</div>
        </div>
    </div>
    <?php
}
