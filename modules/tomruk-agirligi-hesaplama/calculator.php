<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tomruk_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-log-weight',
        HC_PLUGIN_URL . 'modules/tomruk-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-log-weight-css',
        HC_PLUGIN_URL . 'modules/tomruk-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-log-weight">
        <h3>Tomruk Ağırlığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-log-l">Tomruk Boyu (m):</label>
            <input type="number" id="hc-log-l" step="0.1" placeholder="4.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-log-d">Ortalama Çap (cm):</label>
            <input type="number" id="hc-log-d" placeholder="40">
        </div>
        <div class="hc-form-group">
            <label for="hc-log-type">Ağaç Türü:</label>
            <select id="hc-log-type">
                <option value="600">Yumuşak Ağaç (Yeşil/Taze ~600 kg/m³)</option>
                <option value="850" selected>Sert Ağaç (Yeşil/Taze ~850 kg/m³)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcLogWeightHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-log-weight-result">
            <strong>Tahmini Ağırlık:</strong>
            <div id="hc-log-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
        </div>
    </div>
    <?php
}
