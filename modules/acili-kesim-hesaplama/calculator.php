<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_acili_kesim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-acili-kesim-hesaplama',
        HC_PLUGIN_URL . 'modules/acili-kesim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-acili-kesim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/acili-kesim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-acili-kesim-hesaplama">
        <h3>Açılı Kesim (Gönye) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ac-wall">Köşe Açısı (°)</label>
            <input type="number" id="hc-ac-wall" placeholder="Örn: 90" value="90">
        </div>
        <div class="hc-form-group">
            <label for="hc-ac-count">Parça Sayısı</label>
            <input type="number" id="hc-ac-count" placeholder="Örn: 2" value="2">
        </div>
        <button class="hc-btn" onclick="hcAciliKesimHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ac-result">
            <div class="hc-result-label">Kesim Açısı (Gönye):</div>
            <div class="hc-result-value" id="hc-ac-val">-</div>
            <div class="hc-result-note">Her bir parçayı bu açıyla kesmelisiniz.</div>
        </div>
    </div>
    <?php
}
