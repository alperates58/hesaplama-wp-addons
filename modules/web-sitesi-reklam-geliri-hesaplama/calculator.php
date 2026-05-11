<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_web_sitesi_reklam_geliri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-web-reklam-geliri',
        HC_PLUGIN_URL . 'modules/web-sitesi-reklam-geliri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-web-reklam-geliri-css',
        HC_PLUGIN_URL . 'modules/web-sitesi-reklam-geliri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-web-reklam">
        <h3>Web Sitesi Reklam Geliri Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-wr-impressions">Toplam Reklam Gösterimi</label>
            <input type="number" id="hc-wr-impressions" placeholder="Örn: 500.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-wr-rpm">Bin Gösterim Başı Kazanç (RPM ₺)</label>
            <input type="number" id="hc-wr-rpm" placeholder="Örn: 15.00" step="0.01">
        </div>
        <button class="hc-btn" onclick="hcWebReklamGeliriHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wr-result">
            <div class="hc-result-item">
                <span>Tahmini Toplam Gelir:</span>
                <strong class="hc-result-value" id="hc-wr-res-total">-</strong>
            </div>
            <p class="hc-small-text">RPM (Revenue Per Mille), her 1000 gösterim için kazandığınız ortalama tutardır.</p>
        </div>
    </div>
    <?php
}
