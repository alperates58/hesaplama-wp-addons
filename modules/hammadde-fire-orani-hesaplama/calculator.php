<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hammadde_fire_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fire',
        HC_PLUGIN_URL . 'modules/hammadde-fire-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fire-css',
        HC_PLUGIN_URL . 'modules/hammadde-fire-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fire">
        <h3>Hammadde Fire ve Verim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-hf-in">Giren Toplam Hammadde (kg)</label>
            <input type="number" id="hc-hf-in" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-hf-out">Alınan Son Ürün (kg)</label>
            <input type="number" id="hc-hf-out" placeholder="Örn: 95" step="any">
        </div>
        <button class="hc-btn" onclick="hcHFHesapla()">Verim ve Fire Hesapla</button>
        <div class="hc-result" id="hc-hf-result">
            <div class="hc-hf-grid">
                <div class="hc-hf-item"><span>Fire Oranı:</span> <span id="hc-hf-perc">-</span></div>
                <div class="hc-hf-item"><span>Üretim Verimi:</span> <span id="hc-hf-yield">-</span></div>
            </div>
            <div class="hc-result-note">Fire = (Giren - Çıkan) / Giren * 100</div>
        </div>
    </div>
    <?php
}
