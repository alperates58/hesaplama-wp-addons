<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hacimce_yuzde_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hacimce-yuzde',
        HC_PLUGIN_URL . 'modules/hacimce-yuzde-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hacimce-yuzde-css',
        HC_PLUGIN_URL . 'modules/hacimce-yuzde-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hacimce-yuzde">
        <h3>Hacimce Yüzde (%) Derişim</h3>
        <div class="hc-form-group">
            <label for="hc-hy-solute">Çözünen Hacmi (ml)</label>
            <input type="number" id="hc-hy-solute" placeholder="Örn: 20" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-hy-total">Toplam Çözelti Hacmi (ml)</label>
            <input type="number" id="hc-hy-total" placeholder="Örn: 100" step="any">
        </div>
        <button class="hc-btn" onclick="hcHYHesapla()">Yüzde Hesapla</button>
        <div class="hc-result" id="hc-hy-result">
            <div class="hc-result-label">Hacimce Yüzde:</div>
            <div class="hc-result-value" id="hc-hy-val">-</div>
            <div class="hc-result-note">% (v/v) = (V_çözünen / V_çözelti) * 100</div>
        </div>
    </div>
    <?php
}
