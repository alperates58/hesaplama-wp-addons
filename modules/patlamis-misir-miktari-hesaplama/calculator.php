<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_patlamis_misir_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-popcorn-js',
        HC_PLUGIN_URL . 'modules/patlamis-misir-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-popcorn-css',
        HC_PLUGIN_URL . 'modules/patlamis-misir-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-popcorn">
        <h3>Patlamış Mısır Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pm-count">Kişi Sayısı</label>
            <input type="number" id="hc-pm-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-pm-size">Porsiyon Boyutu</label>
            <select id="hc-pm-size">
                <option value="35">Normal Kase (35g Mısır)</option>
                <option value="60">Büyük Kase (60g Mısır)</option>
                <option value="20">Atıştırmalık (20g Mısır)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcPopcornHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-popcorn-result">
            <div class="hc-result-item">
                <span>Gereken Mısır (Kuru):</span>
                <strong class="hc-result-value" id="hc-pm-res-val">-</strong>
            </div>
            <div class="hc-result-note">1 su bardağı mısır yaklaşık 150 gramdır.</div>
        </div>
    </div>
    <?php
}
