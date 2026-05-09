<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kaynama_noktasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kn-irtifa',
        HC_PLUGIN_URL . 'modules/kaynama-noktasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kn-irtifa-css',
        HC_PLUGIN_URL . 'modules/kaynama-noktasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kn-irtifa">
        <h3>Rakıma Göre Kaynama Noktası</h3>
        <div class="hc-form-group">
            <label for="hc-kni-alt">Rakım / Yükseklik (metre)</label>
            <input type="number" id="hc-kni-alt" placeholder="Örn: 1000" step="any">
        </div>
        <button class="hc-btn" onclick="hcKNIHesapla()">Kaynama Noktasını Hesapla</button>
        <div class="hc-result" id="hc-kni-result">
            <div class="hc-result-label">Tahmini Kaynama Noktası:</div>
            <div class="hc-result-value" id="hc-kni-val">-</div>
            <div class="hc-result-note">Her 300 metrede yaklaşık 1°C düşer.</div>
        </div>
    </div>
    <?php
}
