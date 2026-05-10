<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rem_uyku_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rem-calc',
        HC_PLUGIN_URL . 'modules/rem-uyku-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rem-calc-css',
        HC_PLUGIN_URL . 'modules/rem-uyku-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rem-calc">
        <h3>REM Uyku Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-rem-total">Toplam Uyku Süresi (Saat):</label>
            <input type="number" id="hc-rem-total" placeholder="Örn: 8" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcRemHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-rem-calc-result">
            <strong>Tahmini REM Süresi:</strong>
            <div id="hc-rem-res-val" class="hc-result-value">-</div>
            <span>Dakika</span>
            <p style="font-size:0.85em; margin-top:10px; opacity:0.8;">REM uykusu genellikle toplam uykunun %20-25'ini oluşturur.</p>
        </div>
    </div>
    <?php
}
