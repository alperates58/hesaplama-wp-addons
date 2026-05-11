<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alcak_geciren_filtre_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lpf-js',
        HC_PLUGIN_URL . 'modules/alcak-geciren-filtre-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lpf-css',
        HC_PLUGIN_URL . 'modules/alcak-geciren-filtre-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lpf">
        <h3>Alçak Geçiren Filtre Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-lpf-r">Direnç (R)</label>
            <div style="display: flex; gap: 5px;">
                <input type="number" id="hc-lpf-r" placeholder="Değer" step="0.1" style="flex: 1;">
                <select id="hc-lpf-r-birim" style="width: 80px;">
                    <option value="1">Ω</option>
                    <option value="1000" selected>kΩ</option>
                    <option value="1000000">MΩ</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-lpf-c">Kondansatör (C)</label>
            <div style="display: flex; gap: 5px;">
                <input type="number" id="hc-lpf-c" placeholder="Değer" step="0.1" style="flex: 1;">
                <select id="hc-lpf-c-birim" style="width: 80px;">
                    <option value="0.000000000001">pF</option>
                    <option value="0.000000001">nF</option>
                    <option value="0.000001" selected>μF</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcLpfHesapla()">Kesim Frekansını Hesapla</button>

        <div class="hc-result" id="hc-lpf-result">
            <div class="hc-result-item">
                <span>Kesim Frekansı (f꜀):</span>
                <strong class="hc-result-value" id="hc-lpf-res-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-lpf-res-note"></div>
        </div>
    </div>
    <?php
}
