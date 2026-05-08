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
    <div class="hc-calculator" id="hc-stopaj-hesaplama">
        <h3>Stopaj Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-st-amount">Brüt Tutar (TL)</label>
            <input type="number" id="hc-st-amount" placeholder="Brüt ödeme tutarı">
        </div>

        <div class="hc-form-group">
            <label for="hc-st-rate">Stopaj Türü / Oranı</label>
            <select id="hc-st-rate">
                <option value="20">%20 (Kira / Serbest Meslek)</option>
                <option value="10">%10 (Kâr Payı)</option>
                <option value="15">%15 (Personel / Bazı Ödemeler)</option>
                <option value="5">%5 (Diğer)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcStopajHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-stopaj-result">
            <div class="hc-result-item">
                <span>Brüt Tutar:</span>
                <strong id="hc-st-res-gross">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Stopaj Kesintisi:</span>
                <strong id="hc-st-res-tax">-</strong>
            </div>
            <div class="hc-result-value" id="hc-st-res-net">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Ödenecek Tutar</p>
        </div>
    </div>
    <?php
}
