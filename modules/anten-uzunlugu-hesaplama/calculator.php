<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_anten_uzunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-antenna-js',
        HC_PLUGIN_URL . 'modules/anten-uzunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-antenna-css',
        HC_PLUGIN_URL . 'modules/anten-uzunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-antenna">
        <h3>Anten Uzunluğu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ant-frekans">Çalışma Frekansı</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-ant-frekans" placeholder="Değer" step="0.01" style="flex: 1;">
                <select id="hc-ant-birim" style="width: 100px;">
                    <option value="1" selected>MHz</option>
                    <option value="0.001">kHz</option>
                    <option value="1000">GHz</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcAntenUzunluguHesapla()">Uzunlukları Hesapla</button>

        <div class="hc-result" id="hc-antenna-result">
            <div class="hc-result-item">
                <span>Yarım Dalga (1/2 λ):</span>
                <strong class="hc-result-value" id="hc-ant-res-half">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Çeyrek Dalga (1/4 λ):</span>
                <strong class="hc-result-value" id="hc-ant-res-quarter">-</strong>
            </div>
            <div class="hc-result-note" id="hc-ant-res-note"></div>
        </div>
    </div>
    <?php
}
