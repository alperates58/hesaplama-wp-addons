<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogalgaz_faturasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gas-bill',
        HC_PLUGIN_URL . 'modules/dogalgaz-faturasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gas-bill-css',
        HC_PLUGIN_URL . 'modules/dogalgaz-faturasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gas-bill">
        <h3>Doğalgaz Faturası Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gb-consumption">Aylık Tüketim (m³)</label>
            <input type="number" id="hc-gb-consumption" placeholder="Örn: 150" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-gb-price">Birim Fiyat (₺/m³)</label>
            <input type="number" id="hc-gb-price" value="9.50" step="0.01">
            <small>2026 ortalama konut tarifesi baz alınmıştır.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-gb-fixed">Sabit Ücret / Dağıtım Bedeli (₺)</label>
            <input type="number" id="hc-gb-fixed" value="45" step="1">
        </div>

        <button class="hc-btn" onclick="hcGazFaturasiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gb-result">
            <div class="hc-result-item">
                <span>Enerji Bedeli:</span>
                <span class="hc-result-value" id="hc-res-gb-energy">-</span>
            </div>
            <div class="hc-result-item">
                <span>Toplam Fatura (KDV Dahil):</span>
                <span class="hc-result-value highlight" id="hc-res-gb-total">-</span>
            </div>
        </div>
    </div>
    <?php
}
