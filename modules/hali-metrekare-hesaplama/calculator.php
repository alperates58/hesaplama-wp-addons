<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hali_metrekare_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-carpet-calc',
        HC_PLUGIN_URL . 'modules/hali-metrekare-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-carpet-calc-css',
        HC_PLUGIN_URL . 'modules/hali-metrekare-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-carpet-calc">
        <h3>Halı Alanı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cc-width">Oda Genişliği (m):</label>
            <input type="number" id="hc-cc-width" step="0.01" placeholder="4.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-length">Oda Uzunluğu (m):</label>
            <input type="number" id="hc-cc-length" step="0.01" placeholder="5.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-roll">Rulo Genişliği (m):</label>
            <select id="hc-cc-roll">
                <option value="3">3 Metre</option>
                <option value="4" selected>4 Metre</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCarpetCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-carpet-calc-result">
            <strong>Gereken Halı Alanı:</strong>
            <div id="hc-cc-res-val" class="hc-result-value">-</div>
            <span>Metrekare (m²)</span>
            <p id="hc-cc-res-waste" style="margin-top:10px; font-size:0.85rem;"></p>
        </div>
    </div>
    <?php
}
