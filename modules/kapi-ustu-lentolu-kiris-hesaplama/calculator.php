<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kapi_ustu_lentolu_kiris_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-header-beam',
        HC_PLUGIN_URL . 'modules/kapi-ustu-lentolu-kiris-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-header-beam-css',
        HC_PLUGIN_URL . 'modules/kapi-ustu-lentolu-kiris-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-header">
        <h3>Lento (Header) Yük Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-hb-span">Açıklık Genişliği (m):</label>
            <input type="number" id="hc-hb-span" step="0.1" placeholder="1.0">
        </div>
        <div class="hc-form-group">
            <label for="hc-hb-load">Üzerindeki Yük (kg/m):</label>
            <input type="number" id="hc-hb-load" placeholder="500">
            <small>Duvar ve çatıdan gelen yayılı yük.</small>
        </div>
        <button class="hc-btn" onclick="hcHeaderBeamHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-header-result">
            <strong>Toplam Lento Yükü:</strong>
            <div id="hc-hb-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
        </div>
    </div>
    <?php
}
