<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lise_ders_puani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lise-ders-not',
        HC_PLUGIN_URL . 'modules/lise-ders-puani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ldp-calc">
        <h3>Lise Ders Puanı Hesaplama</h3>
        <div class="hc-form-group">
            <label>1. Yazılı Puanı</label>
            <input type="number" class="hc-ldp-score" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>2. Yazılı Puanı</label>
            <input type="number" class="hc-ldp-score" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>1. Performans</label>
            <input type="number" class="hc-ldp-score" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>2. Performans / Proje</label>
            <input type="number" class="hc-ldp-score" placeholder="0-100">
        </div>
        <button class="hc-btn" onclick="hcLdpHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ldp-result">
            <div class="hc-result-title">Dönem Sonu Ders Puanı:</div>
            <div class="hc-result-value" id="hc-ldp-val">-</div>
        </div>
    </div>
    <?php
}
