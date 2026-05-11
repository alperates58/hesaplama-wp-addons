<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arsimet_prensibi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-archimedes',
        HC_PLUGIN_URL . 'modules/arsimet-prensibi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-archimedes-css',
        HC_PLUGIN_URL . 'modules/arsimet-prensibi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-archimedes">
        <h3>Arşimet Prensibi (Kaldırma Kuvveti)</h3>
        
        <div class="hc-form-group">
            <label for="hc-ap-sivi">Sıvı Tipi</label>
            <select id="hc-ap-sivi">
                <option value="1000">Su (1000 kg/m³)</option>
                <option value="1025">Deniz Suyu (1025 kg/m³)</option>
                <option value="800">Alkol (800 kg/m³)</option>
                <option value="920">Zeytinyağı (920 kg/m³)</option>
                <option value="13600">Cıva (13600 kg/m³)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ap-hacim">Batan Hacim (V)</label>
            <input type="number" id="hc-ap-hacim" placeholder="m³" step="0.001">
        </div>

        <button class="hc-btn" onclick="hcArsimetHesapla()">Kuvveti Hesapla</button>

        <div class="hc-result" id="hc-archimedes-result">
            <div class="hc-result-item">
                <span>Kaldırma Kuvveti (Fₖ):</span>
                <strong class="hc-result-value" id="hc-ap-res-f">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Taşırılan Sıvı Kütlesi:</span>
                <span id="hc-ap-res-m">-</span>
            </div>
            <div class="hc-result-note" id="hc-ap-res-note"></div>
        </div>
    </div>
    <?php
}
