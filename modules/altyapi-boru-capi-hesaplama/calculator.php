<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_altyapi_boru_capi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pipe-size',
        HC_PLUGIN_URL . 'modules/altyapi-boru-capi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pipe-size-css',
        HC_PLUGIN_URL . 'modules/altyapi-boru-capi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pipe-size">
        <h3>Altyapı Boru Çapı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ps-debi">Debi (Q)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-ps-debi" placeholder="Miktar" step="0.1" style="flex: 1;">
                <select id="hc-ps-debi-birim" style="width: 100px;">
                    <option value="m3h" selected>m³/saat</option>
                    <option value="ls">L/s</option>
                    <option value="m3s">m³/s</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-ps-hiz">Hedef Akış Hızı (v)</label>
            <input type="number" id="hc-ps-hiz" placeholder="m/s (Örn: 1.5)" step="0.1" value="1.5">
        </div>

        <button class="hc-btn" onclick="hcAltyapiBoruCapiHesapla()">Çapı Hesapla</button>

        <div class="hc-result" id="hc-pipe-size-result">
            <div class="hc-result-item">
                <span>Hesaplanan İç Çap (D):</span>
                <strong class="hc-result-value" id="hc-ps-res-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Önerilen Standart Çap:</span>
                <span id="hc-ps-res-std">-</span>
            </div>
            <div class="hc-result-note" id="hc-ps-res-note"></div>
        </div>
    </div>
    <?php
}
