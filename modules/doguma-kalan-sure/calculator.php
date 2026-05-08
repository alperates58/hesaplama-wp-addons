<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_doguma_kalan_sure( $atts ) {
    wp_enqueue_script(
        'hc-kalan-sure',
        HC_PLUGIN_URL . 'modules/doguma-kalan-sure/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-doguma-kalan-sure">
        <h3>Doğuma Kalan Süre Hesaplama</h3>
        <div class="hc-form-group">
            <label>Tahmini Doğum Tarihiniz</label>
            <input type="date" id="hc-kalan-tarih">
        </div>
        <button class="hc-btn" onclick="hcKalanSureHesapla()">Geri Sayımı Başlat</button>
        <div class="hc-result" id="hc-kalan-result">
            <div class="hc-result-value" id="hc-kalan-gun">-</div>
            <p id="hc-kalan-detay"></p>
        </div>
    </div>
    <?php
}
