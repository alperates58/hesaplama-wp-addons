<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mikrodalga_firin_elektrik_tuketimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-micro-power',
        HC_PLUGIN_URL . 'modules/mikrodalga-firin-elektrik-tuketimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-micro-power-css',
        HC_PLUGIN_URL . 'modules/mikrodalga-firin-elektrik-tuketimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-micro-power">
        <h3>Mikrodalga Elektrik Tüketimi</h3>
        
        <div class="hc-form-group">
            <label for="hc-mf-watt">Mikrodalga Gücü (Watt)</label>
            <input type="number" id="hc-mf-watt" placeholder="Örn: 800" value="1000" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-mf-mins">Günlük Toplam Süre (Dakika)</label>
            <input type="number" id="hc-mf-mins" value="15" step="1">
        </div>

        <button class="hc-btn" onclick="hcMikroHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-mf-result">
            <div class="hc-result-item">
                <span>Aylık Tüketim:</span>
                <span class="hc-result-value" id="hc-res-mf-kwh">-</span>
            </div>
            <div class="hc-result-item">
                <span>Aylık Maliyet:</span>
                <span class="hc-result-value highlight" id="hc-res-mf-cost">-</span>
            </div>
        </div>
    </div>
    <?php
}
