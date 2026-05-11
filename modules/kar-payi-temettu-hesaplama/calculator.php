<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kar_payi_temettu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kar-payi',
        HC_PLUGIN_URL . 'modules/kar-payi-temettu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kar-payi-css',
        HC_PLUGIN_URL . 'modules/kar-payi-temettu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kp">
        <h3>Kar Payı (Temettü) Dağıtım Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kp-total">Dağıtılacak Toplam Kar Payı (Brüt ₺)</label>
            <input type="number" id="hc-kp-total" placeholder="Örn: 5.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kp-capital">Şirket Ödenmiş Sermayesi (₺)</label>
            <input type="number" id="hc-kp-capital" placeholder="Örn: 10.000.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kp-shares">Sizin Elinizdeki Pay Sayısı (Lot)</label>
            <input type="number" id="hc-kp-shares" placeholder="Örn: 1000">
        </div>
        <button class="hc-btn" onclick="hcKarPayiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kp-result">
            <div class="hc-result-item">
                <span>Pay Başı Brüt Temettü:</span>
                <strong id="hc-kp-res-per-share">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Alacağınız Toplam (Net %10 Stopajlı):</span>
                <strong class="hc-result-value" id="hc-kp-res-your-total">-</strong>
            </div>
        </div>
    </div>
    <?php
}
