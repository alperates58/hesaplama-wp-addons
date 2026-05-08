<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ders_notu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ders-notu',
        HC_PLUGIN_URL . 'modules/ders-notu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dn-calc-box">
        <h3>Ders Notu Hesaplama</h3>
        <div id="hc-dn-components">
            <div class="hc-form-group hc-dn-comp-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="text" class="hc-dn-comp-name" value="Vize" style="flex: 2;">
                <input type="number" class="hc-dn-comp-score" placeholder="Not" style="flex: 1;">
                <input type="number" class="hc-dn-comp-weight" value="40" placeholder="%" style="flex: 1;">
            </div>
            <div class="hc-form-group hc-dn-comp-row" style="display: flex; gap: 10px; margin-bottom: 10px;">
                <input type="text" class="hc-dn-comp-name" value="Final" style="flex: 2;">
                <input type="number" class="hc-dn-comp-score" placeholder="Not" style="flex: 1;">
                <input type="number" class="hc-dn-comp-weight" value="60" placeholder="%" style="flex: 1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcDnCompAddRow()" style="background: var(--hc-front-muted); margin-bottom: 10px;">+ Bileşen Ekle (Ödev vb.)</button>
        <button class="hc-btn" onclick="hcDnCompHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dn-comp-result">
            <div class="hc-result-title">Ders Başarı Notu:</div>
            <div class="hc-result-value" id="hc-dn-comp-val">-</div>
        </div>
    </div>
    <?php
}
