<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_albumin_duzeltilmis_kalsiyum_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-albumin-duzeltilmis-kalsiyum-hesaplama',
        HC_PLUGIN_URL . 'modules/albumin-duzeltilmis-kalsiyum-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-albumin-duzeltilmis-kalsiyum-hesaplama-css',
        HC_PLUGIN_URL . 'modules/albumin-duzeltilmis-kalsiyum-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-corr-ca">
        <h3>Düzeltilmiş Kalsiyum</h3>
        <div class="hc-form-group">
            <label for="hc-ac-ca">Serum Kalsiyum (mg/dL)</label>
            <input type="number" id="hc-ac-ca" placeholder="Örn: 8.5" step="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ac-alb">Albümin (g/dL)</label>
            <input type="number" id="hc-ac-alb" placeholder="Örn: 3.0" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcAlbüminDüzeltilmişKalsiyumHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ac-result">
            <div class="hc-result-label">Düzeltilmiş Kalsiyum:</div>
            <div class="hc-result-value" id="hc-ac-val">-</div>
            <p style="font-size:0.85em; color:#666; margin-top:10px;">*Formül: Ca + [0.8 * (4 - Albümin)]</p>
        </div>
    </div>
    <?php
}
