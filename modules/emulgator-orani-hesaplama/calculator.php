<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_emulgator_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-emulgator',
        HC_PLUGIN_URL . 'modules/emulgator-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-emulgator-css',
        HC_PLUGIN_URL . 'modules/emulgator-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-emulgator">
        <h3>Emülgatör Karışım Oranı (HLB)</h3>
        <div class="hc-form-group">
            <label for="hc-eo-target">Hedef HLB Değeri</label>
            <input type="number" id="hc-eo-target" placeholder="Örn: 10" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-eo-h1">1. Emülgatör HLB (Yüksek)</label>
            <input type="number" id="hc-eo-h1" placeholder="Örn: 15" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-eo-h2">2. Emülgatör HLB (Düşük)</label>
            <input type="number" id="hc-eo-h2" placeholder="Örn: 4" step="any">
        </div>
        <button class="hc-btn" onclick="hcEOHesapla()">Oranları Hesapla</button>
        <div class="hc-result" id="hc-eo-result">
            <div class="hc-eo-grid">
                <div class="hc-eo-item"><span>1. Emülgatör Oranı:</span> <span id="hc-eo-res1">-</span></div>
                <div class="hc-eo-item"><span>2. Emülgatör Oranı:</span> <span id="hc-eo-res2">-</span></div>
            </div>
            <div class="hc-result-note">Hesaplama Pearson Karesi/HLB formülü ile yapılır.</div>
        </div>
    </div>
    <?php
}
