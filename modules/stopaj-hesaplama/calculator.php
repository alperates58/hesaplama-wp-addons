<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stopaj_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stopaj',
        HC_PLUGIN_URL . 'modules/stopaj-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stopaj-css',
        HC_PLUGIN_URL . 'modules/stopaj-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stopaj-calc">
        <h3>Stopaj Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-st-type">Hesaplama Yönü</label>
            <select id="hc-st-type">
                <option value="brüt">Brütten Nete</option>
                <option value="net">Netten Brüte</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-st-amount">Tutar (₺)</label>
            <input type="number" id="hc-st-amount" placeholder="Örn: 10.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-st-rate">Stopaj Oranı (%)</label>
            <select id="hc-st-rate">
                <option value="20">%20 (Kira, SM vb.)</option>
                <option value="15">%15</option>
                <option value="10">%10</option>
                <option value="5">%5</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcStopajHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-st-result">
            <div class="hc-result-item">
                <span>Brüt Tutar:</span>
                <strong id="hc-st-res-gross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Stopaj Tutarı:</span>
                <strong id="hc-st-res-tax">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Net Tutar:</span>
                <strong class="hc-result-value" id="hc-st-res-net">-</strong>
            </div>
        </div>
    </div>
    <?php
}
