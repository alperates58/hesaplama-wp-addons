<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_faiz_vergisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-faiz-vergi',
        HC_PLUGIN_URL . 'modules/faiz-vergisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-faiz-vergi-css',
        HC_PLUGIN_URL . 'modules/faiz-vergisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-faiz-vergisi-hesaplama">
        <h3>Faiz Vergisi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-fv-gross">Brüt Faiz Geliri (TL)</label>
            <input type="number" id="hc-fv-gross" placeholder="Bankadan kazanılan faiz">
        </div>

        <div class="hc-form-group">
            <label for="hc-fv-rate">Vade Durumu / Stopaj Oranı</label>
            <select id="hc-fv-rate">
                <option value="15">%15 (Vadesiz / 6 Aya Kadar)</option>
                <option value="12">%12 (1 Yıla Kadar)</option>
                <option value="10">%10 (1 Yıldan Uzun)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcFaizVergiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-faiz-result">
            <div class="hc-result-item">
                <span>Stopaj Kesintisi:</span>
                <strong id="hc-fv-res-tax">-</strong>
            </div>
            <div class="hc-result-value" id="hc-fv-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Ele Geçen Faiz</p>
        </div>
    </div>
    <?php
}
