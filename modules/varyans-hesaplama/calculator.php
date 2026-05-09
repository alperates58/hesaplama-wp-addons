<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_varyans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-variance',
        HC_PLUGIN_URL . 'modules/varyans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-variance-css',
        HC_PLUGIN_URL . 'modules/varyans-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-variance">
        <h3>Varyans Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-va-data">Veri Seti (Virgül ile ayırın)</label>
            <textarea id="hc-va-data" placeholder="Örn: 10, 20, 30"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-va-type">Veri Türü</label>
            <select id="hc-va-type">
                <option value="sample">Örneklem (n-1)</option>
                <option value="population">Popülasyon (n)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcVarianceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-variance-result">
            <div class="hc-result-item">
                <span>Varyans (σ²/s²):</span>
                <span class="hc-result-value" id="hc-res-va-val">0</span>
            </div>
            <div class="hc-result-item">
                <span>Ortalama (x̄):</span>
                <span id="hc-res-va-mean">0</span>
            </div>
        </div>
    </div>
    <?php
}
