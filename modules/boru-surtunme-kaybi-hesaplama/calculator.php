<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_boru_surtunme_kaybi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-boru-surtunme-kaybi-hesaplama',
        HC_PLUGIN_URL . 'modules/boru-surtunme-kaybi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-boru-surtunme-kaybi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/boru-surtunme-kaybi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-boru-surtunme-kaybi-hesaplama">
        <h3>Boru Sürtünme Kaybı (Darcy-Weisbach)</h3>
        <div class="hc-form-group">
            <label for="hc-bsk-len">Boru Uzunluğu (L - m)</label>
            <input type="number" id="hc-bsk-len" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bsk-diam">Boru İç Çapı (D - mm)</label>
            <input type="number" id="hc-bsk-diam" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bsk-v">Akış Hızı (v - m/s)</label>
            <input type="number" id="hc-bsk-v" placeholder="Örn: 1.5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bsk-f">Sürtünme Faktörü (f)</label>
            <input type="number" id="hc-bsk-f" placeholder="Örn: 0.02" value="0.02" step="any">
        </div>
        <button class="hc-btn" onclick="hcBSKHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bsk-result">
            <div class="hc-result-label">Basınç Kaybı (h_f):</div>
            <div class="hc-result-value" id="hc-bsk-val">-</div>
            <div class="hc-result-note">h_f = f * (L/D) * (v²/2g)</div>
        </div>
    </div>
    <?php
}
