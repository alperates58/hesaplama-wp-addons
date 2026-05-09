<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_acisal_frekans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-acisal-frekans-hesaplama',
        HC_PLUGIN_URL . 'modules/acisal-frekans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-acisal-frekans-hesaplama-css',
        HC_PLUGIN_URL . 'modules/acisal-frekans-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-acisal-frekans-hesaplama">
        <h3>Açısal Frekans Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-af-type">Giriş Tipi</label>
            <select id="hc-af-type" onchange="hcAFToggle()">
                <option value="freq">Frekans (f - Hz)</option>
                <option value="period">Periyot (T - s)</option>
            </select>
        </div>
        <div class="hc-form-group" id="hc-af-freq-group">
            <label for="hc-af-freq">Frekans (Hz)</label>
            <input type="number" id="hc-af-freq" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group" id="hc-af-period-group" style="display:none;">
            <label for="hc-af-period">Periyot (s)</label>
            <input type="number" id="hc-af-period" placeholder="Örn: 0.02" step="any">
        </div>
        <button class="hc-btn" onclick="hcAFHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-af-result">
            <div class="hc-result-label">Açısal Frekans (ω):</div>
            <div class="hc-result-value" id="hc-af-val">-</div>
            <div class="hc-result-note">ω = 2πf = 2π/T</div>
        </div>
    </div>
    <?php
}
