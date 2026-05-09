<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hucre_ikiye_katlanma_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hucre-ikiye-katlanma-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/hucre-ikiye-katlanma-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hucre-ikiye-katlanma-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hucre-ikiye-katlanma-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hucre-ikiye-katlanma-suresi-hesaplama">
        <h3>Hücre İkiye Katlanma Süresi (DT)</h3>
        <div class="hc-form-group">
            <label for="hc-dt-n0">Başlangıç Hücre Sayısı (N₀)</label>
            <input type="number" id="hc-dt-n0" placeholder="Örn: 10000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dt-nt">Son Hücre Sayısı (Nₜ)</label>
            <input type="number" id="hc-dt-nt" placeholder="Örn: 80000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dt-time">Geçen Süre (saat)</label>
            <input type="number" id="hc-dt-time" placeholder="Örn: 48" step="any">
        </div>
        <button class="hc-btn" onclick="hcDTHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dt-result">
            <div class="hc-result-label">İkiye Katlanma Süresi (DT):</div>
            <div class="hc-result-value" id="hc-dt-val">-</div>
            <div class="hc-result-note" id="hc-dt-note"></div>
        </div>
    </div>
    <?php
}
