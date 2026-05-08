<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bilesik_faiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bilesik-faiz',
        HC_PLUGIN_URL . 'modules/bilesik-faiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bilesik-faiz-css',
        HC_PLUGIN_URL . 'modules/bilesik-faiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bilesik-faiz-hesaplama">
        <h3>Bileşik Faiz Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bf-p">Ana Para (TL)</label>
            <input type="number" id="hc-bf-p" placeholder="Başlangıç tutarı">
        </div>

        <div class="hc-form-group">
            <label for="hc-bf-r">Yıllık Faiz Oranı (%)</label>
            <input type="number" id="hc-bf-r" value="40">
        </div>

        <div class="hc-form-group">
            <label for="hc-bf-t">Vade (Yıl)</label>
            <input type="number" id="hc-bf-t" value="5">
        </div>
        
        <button class="hc-btn" onclick="hcBilesikFaizHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-bilesik-faiz-result">
            <div class="hc-result-item">
                <span>Net Faiz Getirisi:</span>
                <strong id="hc-bf-res-int">-</strong>
            </div>
            <div class="hc-result-value" id="hc-bf-res-total">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Vade Sonu Toplam Birikim</p>
        </div>
    </div>
    <?php
}
