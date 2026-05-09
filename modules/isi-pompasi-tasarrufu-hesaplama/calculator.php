<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isi_pompasi_tasarrufu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-heat-pump',
        HC_PLUGIN_URL . 'modules/isi-pompasi-tasarrufu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-heat-pump-css',
        HC_PLUGIN_URL . 'modules/isi-pompasi-tasarrufu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-heat-pump">
        <h3>Isı Pompası Tasarrufu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ipt-energy">Gereken Isıl Enerji (kWh/ay)</label>
            <input type="number" id="hc-ipt-energy" placeholder="Örn: 1500" step="1">
            <small>Evin ısınması için gereken toplam ısı enerjisi.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-ipt-cop">Isı Pompası Verimi (COP)</label>
            <input type="number" id="hc-ipt-cop" value="3.5" step="0.1">
            <small>1 birim elektrikle kaç birim ısı üretildiği (genelde 3-4 arasıdır).</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-ipt-elec-price">Elektrik Fiyatı (₺/kWh)</label>
            <input type="number" id="hc-ipt-elec-price" value="3.11" step="0.01">
        </div>

        <button class="hc-btn" onclick="hcIsiPompasiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ipt-result">
            <div class="hc-result-item">
                <span>Elektrikli Isıtıcı Maliyeti:</span>
                <span class="hc-result-value" id="hc-res-ipt-heater">-</span>
            </div>
            <div class="hc-result-item">
                <span>Isı Pompası Maliyeti:</span>
                <span class="hc-result-value" id="hc-res-ipt-pump">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Tasarruf:</span>
                <span class="hc-result-value highlight" id="hc-res-ipt-saving">-</span>
            </div>
        </div>
    </div>
    <?php
}
