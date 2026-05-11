<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kredi_karti_limit_kullanim_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kredi-karti-limit-kullanim',
        HC_PLUGIN_URL . 'modules/kredi-karti-limit-kullanim-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kredi-karti-limit-kullanim-css',
        HC_PLUGIN_URL . 'modules/kredi-karti-limit-kullanim-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kk-limit-kullanim">
        <h3>Kredi Kartı Limit Kullanım Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-kklu-limit">Toplam Kredi Kartı Limitiniz (₺)</label>
            <input type="number" id="hc-kklu-limit" placeholder="Örn: 100.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-kklu-debt">Güncel Toplam Borcunuz (₺)</label>
            <input type="number" id="hc-kklu-debt" placeholder="Örn: 30.000">
        </div>
        <button class="hc-btn" onclick="hcKkLimitKullanimHesapla()">Oranı Hesapla</button>
        <div class="hc-result" id="hc-kklu-result">
            <div class="hc-result-item">
                <span>Kullanım Oranı:</span>
                <strong class="hc-result-value" id="hc-kklu-ratio">-</strong>
            </div>
            <div id="hc-kklu-status" class="hc-status-box"></div>
            <p class="hc-small-text">Kredi skorunuzu korumak için kullanım oranının %30'un altında olması önerilir.</p>
        </div>
    </div>
    <?php
}
