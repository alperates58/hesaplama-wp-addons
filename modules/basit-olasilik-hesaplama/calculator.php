<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_basit_olasilik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-basic-prob',
        HC_PLUGIN_URL . 'modules/basit-olasilik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-basic-prob-css',
        HC_PLUGIN_URL . 'modules/basit-olasilik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-probability">
        <h3>Basit Olasılık Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-bp-favorable">İstenen Durum Sayısı</label>
            <input type="number" id="hc-bp-favorable" placeholder="Örn: 2" step="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-bp-total">Tüm Durumların Sayısı</label>
            <input type="number" id="hc-bp-total" placeholder="Örn: 6" step="1">
        </div>

        <button class="hc-btn" onclick="hcOlasilikHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-bp-result">
            <div class="hc-result-item">
                <span>Olasılık (P):</span>
                <span class="hc-result-value highlight" id="hc-res-bp-val">-</span>
            </div>
            <div class="hc-result-item">
                <span>Yüzde (%):</span>
                <span class="hc-result-value" id="hc-res-bp-perc">-</span>
            </div>
            <div class="hc-result-item">
                <span>Kesir:</span>
                <span class="hc-result-value" id="hc-res-bp-frac">-</span>
            </div>
        </div>
    </div>
    <?php
}
