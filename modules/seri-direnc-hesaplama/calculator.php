<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_seri_direnc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-series-res',
        HC_PLUGIN_URL . 'modules/seri-direnc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-series-res-css',
        HC_PLUGIN_URL . 'modules/seri-direnc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-series-res">
        <h3>Seri Direnç Eşdeğeri</h3>
        <div id="hc-sr-list">
            <div class="hc-form-group">
                <label>Direnç 1 [Ω]</label>
                <input type="number" class="hc-sr-val" value="100">
            </div>
            <div class="hc-form-group">
                <label>Direnç 2 [Ω]</label>
                <input type="number" class="hc-sr-val" value="220">
            </div>
        </div>
        <button class="hc-btn" style="background:#7f8c8d; margin-bottom:10px;" onclick="hcAddRes()">+ Direnç Ekle</button>
        <button class="hc-btn" onclick="hcSeriesResHesapla()">Eşdeğeri Hesapla</button>
        <div class="hc-result" id="hc-series-res-result">
            <div class="hc-result-item">
                <span>Eşdeğer Direnç (Req):</span>
                <span class="hc-result-value" id="hc-res-sr-val">0 Ω</span>
            </div>
            <p class="hc-sr-note">Req = R1 + R2 + ...</p>
        </div>
    </div>
    <?php
}
