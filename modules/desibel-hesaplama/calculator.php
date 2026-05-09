<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_desibel_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-desibel-hesaplama',
        HC_PLUGIN_URL . 'modules/desibel-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-desibel-hesaplama-css',
        HC_PLUGIN_URL . 'modules/desibel-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-desibel-hesaplama">
        <h3>Desibel (dB) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-db-type">Hesaplama Tipi</label>
            <select id="hc-db-calc-type">
                <option value="power">Güç Oranı (10 * log₁₀)</option>
                <option value="voltage">Gerilim/Basınç Oranı (20 * log₁₀)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-db-val1">Ölçülen Değer (V₂ veya P₂)</label>
            <input type="number" id="hc-db-val1" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-db-ref">Referans Değer (V₁ veya P₁)</label>
            <input type="number" id="hc-db-ref" placeholder="Örn: 1" value="1" step="any">
        </div>
        <button class="hc-btn" onclick="hcDesibelHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-db-result">
            <div class="hc-result-label">Sonuç:</div>
            <div class="hc-result-value" id="hc-db-val">-</div>
            <div class="hc-result-note">L = N * log₁₀(Değer / Referans)</div>
        </div>
    </div>
    <?php
}
