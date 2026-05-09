<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cfu_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cfu-seyreltme-hesaplama',
        HC_PLUGIN_URL . 'modules/cfu-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cfu-seyreltme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cfu-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cfu-seyreltme-hesaplama">
        <h3>CFU Seyreltme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cfu-colonies">Koloni Sayısı (Plaktaki)</label>
            <input type="number" id="hc-cfu-colonies" placeholder="Örn: 150" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-cfu-dilution">Seyreltme Faktörü (10'un kuvveti)</label>
            <input type="number" id="hc-cfu-dilution" placeholder="Örn: 100000 (10^5)" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cfu-vol">Ekim Hacmi (mL)</label>
            <input type="number" id="hc-cfu-vol" placeholder="Örn: 0.1" step="any">
        </div>
        <button class="hc-btn" onclick="hcCFUHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cfu-result">
            <div class="hc-result-label">Bakteri Konsantrasyonu:</div>
            <div class="hc-result-value" id="hc-cfu-val">-</div>
            <div class="hc-result-note" id="hc-cfu-note"></div>
        </div>
    </div>
    <?php
}
