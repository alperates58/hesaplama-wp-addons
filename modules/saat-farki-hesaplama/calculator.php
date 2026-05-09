<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_saat_farki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-saat-farki-hesaplama',
        HC_PLUGIN_URL . 'modules/saat-farki-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-saat-farki">
        <h3>Saat Farkı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Başlangıç Saati</label>
            <input type="time" id="hc-sf-start" value="09:00">
        </div>
        <div class="hc-form-group">
            <label>Bitiş Saati</label>
            <input type="time" id="hc-sf-end" value="17:00">
        </div>
        <button class="hc-btn" onclick="hcSaatFarkiHesapla()">Farkı Hesapla</button>
        <div class="hc-result" id="hc-sf-result">
            <div class="hc-result-title">Zaman Farkı:</div>
            <div class="hc-result-value" id="hc-sf-val">-</div>
        </div>
    </div>
    <?php
}
