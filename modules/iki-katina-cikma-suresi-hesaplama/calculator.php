<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iki_katina_cikma_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-doubling-time',
        HC_PLUGIN_URL . 'modules/iki-katina-cikma-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-doubling-time-css',
        HC_PLUGIN_URL . 'modules/iki-katina-cikma-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-doubling">
        <h3>İki Katına Çıkma Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-dt-rate">Yıllık Büyüme / Faiz Oranı (%):</label>
            <input type="number" id="hc-dt-rate" step="0.1" placeholder="örn: 7">
        </div>
        <button class="hc-btn" onclick="hcDoublingTimeHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-doubling-result">
            <strong>Tahmini Süre:</strong>
            <div id="hc-dt-res-val" class="hc-result-value">-</div>
            <span>Yıl</span>
            <p style="margin-top:10px; font-size:0.8rem; color:#666;">* 72 kuralı baz alınmıştır.</p>
        </div>
    </div>
    <?php
}
