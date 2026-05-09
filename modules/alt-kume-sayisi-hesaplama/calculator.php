<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alt_kume_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-subset-calc',
        HC_PLUGIN_URL . 'modules/alt-kume-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-subset-calc-css',
        HC_PLUGIN_URL . 'modules/alt-kume-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-subset">
        <h3>Alt Küme Sayısı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ss-n">Eleman Sayısı (n)</label>
            <input type="number" id="hc-ss-n" placeholder="Örn: 5" step="1">
        </div>

        <button class="hc-btn" onclick="hcAltKumeHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ss-result">
            <div class="hc-result-item">
                <span>Alt Küme Sayısı (2ⁿ):</span>
                <span class="hc-result-value highlight" id="hc-res-ss-total">-</span>
            </div>
            <div class="hc-result-item">
                <span>Öz Alt Küme Sayısı (2ⁿ - 1):</span>
                <span class="hc-result-value" id="hc-res-ss-proper">-</span>
            </div>
        </div>
    </div>
    <?php
}
