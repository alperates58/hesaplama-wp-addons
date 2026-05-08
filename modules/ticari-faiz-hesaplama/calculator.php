<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ticari_faiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ticari-faiz',
        HC_PLUGIN_URL . 'modules/ticari-faiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ticari-faiz-css',
        HC_PLUGIN_URL . 'modules/ticari-faiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ticari-faiz-hesaplama">
        <h3>Ticari Faiz Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-tf-principal">Ana Para (TL)</label>
            <input type="number" id="hc-tf-principal" placeholder="Örn: 100000">
        </div>

        <div class="hc-form-group">
            <label for="hc-tf-rate">Yıllık Faiz Oranı (%)</label>
            <input type="number" id="hc-tf-rate" value="45" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-tf-days">Vade (Gün)</label>
            <input type="number" id="hc-tf-days" value="30">
        </div>
        
        <button class="hc-btn" onclick="hcTicariFaizHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ticari-faiz-result">
            <div class="hc-result-item">
                <span>Brüt Faiz:</span>
                <strong id="hc-tf-res-gross">-</strong>
            </div>
            <div class="hc-result-value" id="hc-tf-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Toplam Geri Ödeme (Ana Para + Faiz)</p>
        </div>
    </div>
    <?php
}
