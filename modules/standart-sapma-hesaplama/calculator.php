<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_standart_sapma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-std-dev',
        HC_PLUGIN_URL . 'modules/standart-sapma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-std-dev-css',
        HC_PLUGIN_URL . 'modules/standart-sapma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-std-dev">
        <h3>Standart Sapma</h3>
        <div class="hc-form-group">
            <label for="hc-sd-data">Veri Seti (Virgül ile)</label>
            <textarea id="hc-sd-data" placeholder="Örn: 5, 8, 12, 15"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-sd-type">Tür</label>
            <select id="hc-sd-type">
                <option value="sample">Örneklem (n-1)</option>
                <option value="population">Popülasyon (n)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcStdDevHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-std-dev-result">
            <div class="hc-result-item">
                <span>Standart Sapma (σ/s):</span>
                <span class="hc-result-value" id="hc-res-sd-val">0</span>
            </div>
            <div class="hc-result-item">
                <span>Ortalama:</span>
                <span id="hc-res-sd-mean">0</span>
            </div>
        </div>
    </div>
    <?php
}
