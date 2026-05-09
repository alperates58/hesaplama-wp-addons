<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gida_kalorisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gida-kalorisi-hesaplama',
        HC_PLUGIN_URL . 'modules/gida-kalorisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gida-kalorisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gida-kalorisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gida-kalorisi-hesaplama">
        <h3>Gıda Kalorisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cal-carb">Karbonhidrat (g)</label>
            <input type="number" id="hc-cal-carb" placeholder="Örn: 20" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cal-prot">Protein (g)</label>
            <input type="number" id="hc-cal-prot" placeholder="Örn: 15" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cal-fat">Yağ (g)</label>
            <input type="number" id="hc-cal-fat" placeholder="Örn: 10" step="any">
        </div>
        <button class="hc-btn" onclick="hcKaloriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cal-result">
            <div class="hc-result-label">Toplam Enerji:</div>
            <div class="hc-result-value" id="hc-cal-val">-</div>
            <div class="hc-result-note">
                Hesaplama: 4 kcal/g (Karbonhidrat & Protein), 9 kcal/g (Yağ)
            </div>
        </div>
    </div>
    <?php
}
