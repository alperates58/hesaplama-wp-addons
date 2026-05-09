<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ruzgar_yuku_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wind-load',
        HC_PLUGIN_URL . 'modules/ruzgar-yuku-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wind-load-css',
        HC_PLUGIN_URL . 'modules/ruzgar-yuku-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wind-load">
        <h3>Rüzgar Yükü Analizi (q)</h3>
        <div class="hc-form-group">
            <label for="hc-wl-v">Rüzgar Hızı (V) [m/s]</label>
            <input type="number" id="hc-wl-v" value="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-wl-cp">Basınç Katsayısı (Cp)</label>
            <input type="number" id="hc-wl-cp" value="0.8" step="0.1">
            <small>Rüzgar tarafı: 0.8, Arka taraf: -0.5</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-wl-kz">Yükseklik Katsayısı (Kz)</label>
            <input type="number" id="hc-wl-kz" value="1.0" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcWindLoadHesapla()">Yükü Hesapla</button>
        <div class="hc-result" id="hc-wind-load-result">
            <div class="hc-result-item">
                <span>Rüzgar Basıncı (p):</span>
                <span class="hc-result-value" id="hc-res-wl-val">0 N/m²</span>
            </div>
            <p class="hc-wl-note">p = 0.613 * V² * Kz * Cp</p>
        </div>
    </div>
    <?php
}
