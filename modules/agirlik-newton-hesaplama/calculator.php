<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_agirlik_newton_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-agirlik-newton-hesaplama',
        HC_PLUGIN_URL . 'modules/agirlik-newton-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-agirlik-newton-hesaplama-css',
        HC_PLUGIN_URL . 'modules/agirlik-newton-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-agirlik-newton-hesaplama">
        <h3>Ağırlık (Newton) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-an-mass">Kütle (m - kg)</label>
            <input type="number" id="hc-an-mass" placeholder="Örn: 70" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-an-planet">Yerçekimi İvmesi (g - m/s²)</label>
            <select id="hc-an-planet" onchange="hcANToggleCustom()">
                <option value="9.80665">Dünya (9.81)</option>
                <option value="1.62">Ay (1.62)</option>
                <option value="3.71">Mars (3.71)</option>
                <option value="24.79">Jüpiter (24.79)</option>
                <option value="custom">Özel Değer Gir</option>
            </select>
        </div>
        <div class="hc-form-group" id="hc-an-custom-g" style="display:none;">
            <label for="hc-an-g">Özel İvme (m/s²)</label>
            <input type="number" id="hc-an-g" placeholder="Örn: 9.81" step="any">
        </div>
        <button class="hc-btn" onclick="hcANHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-an-result">
            <div class="hc-result-label">Ağırlık (W):</div>
            <div class="hc-result-value" id="hc-an-val">-</div>
            <div class="hc-result-note">W = m * g</div>
        </div>
    </div>
    <?php
}
