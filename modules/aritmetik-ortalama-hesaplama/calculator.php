<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aritmetik_ortalama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-arith-avg',
        HC_PLUGIN_URL . 'modules/aritmetik-ortalama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-arith-avg-css',
        HC_PLUGIN_URL . 'modules/aritmetik-ortalama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-arith-avg">
        <h3>Aritmetik Ortalama</h3>
        
        <div class="hc-form-group">
            <label for="hc-aa-data">Sayılar (Virgül, boşluk veya yeni satır ile ayırın)</label>
            <textarea id="hc-aa-data" placeholder="Örn: 10, 20, 30, 40" rows="3"></textarea>
        </div>

        <button class="hc-btn" onclick="hcAritmetikOrtHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-aa-result">
            <div class="hc-result-item">
                <span>Ortalama:</span>
                <span class="hc-result-value highlight" id="hc-res-aa-avg">-</span>
            </div>
            <div class="hc-result-item">
                <span>Toplam:</span>
                <span class="hc-result-value" id="hc-res-aa-sum">-</span>
            </div>
            <div class="hc-result-item">
                <span>Adet:</span>
                <span class="hc-result-value" id="hc-res-aa-count">-</span>
            </div>
        </div>
    </div>
    <?php
}
