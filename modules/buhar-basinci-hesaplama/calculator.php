<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_buhar_basinci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-buhar-basinci',
        HC_PLUGIN_URL . 'modules/buhar-basinci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-buhar-basinci-css',
        HC_PLUGIN_URL . 'modules/buhar-basinci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-buhar-basinci">
        <h3>Buhar Basıncı Hesaplama (Antoine)</h3>
        <div class="hc-form-group">
            <label for="hc-bb-sub">Madde Seçin</label>
            <select id="hc-bb-sub" onchange="hcBBUpdateConstants()">
                <option value="custom">Özel (Parametre Girin)</option>
                <option value="water" selected>Su (1-100 °C)</option>
                <option value="ethanol">Etanol</option>
                <option value="acetone">Aseton</option>
                <option value="benzene">Benzen</option>
            </select>
        </div>
        <div id="hc-bb-custom-params" style="display:none;">
            <div style="display:grid; grid-template-columns: 1fr 1fr 1fr; gap:10px;">
                <div class="hc-form-group"><label>A</label><input type="number" id="hc-bb-a" step="any"></div>
                <div class="hc-form-group"><label>B</label><input type="number" id="hc-bb-b" step="any"></div>
                <div class="hc-form-group"><label>C</label><input type="number" id="hc-bb-c" step="any"></div>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-bb-t">Sıcaklık (°C)</label>
            <input type="number" id="hc-bb-t" placeholder="°C" step="any">
        </div>
        <button class="hc-btn" onclick="hcBBHesapla()">Basınç Hesapla</button>
        <div class="hc-result" id="hc-bb-result">
            <div class="hc-result-label">Buhar Basıncı:</div>
            <div class="hc-result-value" id="hc-bb-val">-</div>
            <div class="hc-result-note">log₁₀(P) = A - (B / (C + T))</div>
        </div>
    </div>
    <?php
}
