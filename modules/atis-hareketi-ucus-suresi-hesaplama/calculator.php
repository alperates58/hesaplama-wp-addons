<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_atis_hareketi_ucus_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-atis-hareketi-ucus-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/atis-hareketi-ucus-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-atis-hareketi-ucus-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/atis-hareketi-ucus-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-atis-hareketi-ucus-suresi-hesaplama">
        <h3>Uçuş Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ah-t-v0">İlk Hız (v₀ - m/s)</label>
            <input type="number" id="hc-ah-t-v0" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-ah-t-angle">Fırlatma Açısı (θ - Derece)</label>
            <input type="number" id="hc-ah-t-angle" placeholder="Örn: 45" step="any">
        </div>
        <button class="hc-btn" onclick="hcATHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ah-t-result">
            <div class="hc-result-label">Toplam Uçuş Süresi (t):</div>
            <div class="hc-result-value" id="hc-ah-t-val">-</div>
            <div class="hc-result-note">t = (2 * v₀ * sinθ) / g</div>
        </div>
    </div>
    <?php
}
