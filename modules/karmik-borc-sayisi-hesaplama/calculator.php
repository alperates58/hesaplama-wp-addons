<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karmik_borc_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-karmik-borc-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/karmik-borc-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-karmik-borc-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/karmik-borc-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-karmic-debt">
        <h3>Karmik Borç Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kd-name">Tam Adınız:</label>
            <input type="text" id="hc-kd-name" class="hc-input" placeholder="Örn: Ayşe Yılmaz">
        </div>
        <div class="hc-form-group">
            <label for="hc-kd-birth">Doğum Tarihiniz:</label>
            <input type="date" id="hc-kd-birth" class="hc-input">
        </div>
        <button class="hc-btn" onclick="hcKarmicDebtHesapla()">Borçları Tespit Et</button>
        <div class="hc-result" id="hc-karmik-borc-sayisi-hesaplama-result">
            <div class="hc-result-label">Bulunan Karmik Borçlar:</div>
            <div class="hc-result-value" id="hc-res-kd-val">-</div>
            <div id="hc-res-kd-desc" class="hc-res-desc"></div>
        </div>
    </div>
    <?php
}
