<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogalgaz_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gas-consumption',
        HC_PLUGIN_URL . 'modules/dogalgaz-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gas-consumption-css',
        HC_PLUGIN_URL . 'modules/dogalgaz-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gas-consumption">
        <h3>Doğalgaz Tüketimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gc-old">Önceki Endeks (m³)</label>
            <input type="number" id="hc-gc-old" placeholder="Örn: 12450" step="0.001">
        </div>

        <div class="hc-form-group">
            <label for="hc-gc-new">Son Endeks (m³)</label>
            <input type="number" id="hc-gc-new" placeholder="Örn: 12600" step="0.001">
        </div>

        <div class="hc-form-group">
            <label for="hc-gc-days">Gün Sayısı</label>
            <input type="number" id="hc-gc-days" value="30" step="1">
        </div>

        <button class="hc-btn" onclick="hcGazTuketimiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gc-result">
            <div class="hc-result-item">
                <span>Toplam Tüketim:</span>
                <span class="hc-result-value" id="hc-res-gc-total">-</span>
            </div>
            <div class="hc-result-item">
                <span>Günlük Ortalama:</span>
                <span class="hc-result-value" id="hc-res-gc-daily">-</span>
            </div>
        </div>
    </div>
    <?php
}
