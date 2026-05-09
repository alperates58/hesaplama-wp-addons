<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_risk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-risk-calc',
        HC_PLUGIN_URL . 'modules/risk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-risk-calc-css',
        HC_PLUGIN_URL . 'modules/risk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-risk-calc">
        <h3>Risk Analizi (L-Tipi)</h3>
        <div class="hc-form-group">
            <label for="hc-ri-prob">Olasılık (1-5)</label>
            <select id="hc-ri-prob">
                <option value="1">1 - Çok Düşük</option>
                <option value="2">2 - Düşük</option>
                <option value="3">3 - Orta</option>
                <option value="4">4 - Yüksek</option>
                <option value="5">5 - Çok Yüksek</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-ri-imp">Şiddet / Etki (1-5)</label>
            <select id="hc-ri-imp">
                <option value="1">1 - Önemsiz</option>
                <option value="2">2 - Düşük</option>
                <option value="3">3 - Orta</option>
                <option value="4">4 - Ciddi</option>
                <option value="5">5 - Felaket</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcRiskHesapla()">Risk Puanını Hesapla</button>
        <div class="hc-result" id="hc-risk-calc-result">
            <div class="hc-result-item">
                <span>Risk Skoru (O x Ş):</span>
                <span class="hc-result-value" id="hc-res-ri-val">0</span>
            </div>
            <p id="hc-ri-level" class="hc-ri-level"></p>
        </div>
    </div>
    <?php
}
