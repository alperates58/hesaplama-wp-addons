<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ag_bant_genisligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ag-bw',
        HC_PLUGIN_URL . 'modules/ag-bant-genisligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ag-bw-css',
        HC_PLUGIN_URL . 'modules/ag-bant-genisligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ag-bw">
        <h3>Ağ Bant Genişliği Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bw-boyut">Dosya Boyutu</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-bw-boyut" placeholder="Miktar" step="0.1" style="flex: 1;">
                <select id="hc-bw-boyut-birim" style="width: 100px;">
                    <option value="MB">MB</option>
                    <option value="GB" selected>GB</option>
                    <option value="TB">TB</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-bw-sure">Hedef Süre (Saniye)</label>
            <input type="number" id="hc-bw-sure" placeholder="Saniye" step="1">
        </div>

        <button class="hc-btn" onclick="hcAgBantGenisligiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ag-bw-result">
            <div class="hc-result-item">
                <span>Gerekli Bant Genişliği:</span>
                <strong class="hc-result-value" id="hc-bw-res-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-bw-res-note"></div>
        </div>
    </div>
    <?php
}
