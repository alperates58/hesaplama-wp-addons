<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_calisma_saati_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-calisma-saati-hesaplama',
        HC_PLUGIN_URL . 'modules/calisma-saati-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cs-calc">
        <h3>Çalışma Saati Hesaplama</h3>
        <div class="hc-form-group">
            <label>Giriş Saati</label>
            <input type="time" id="hc-cs-start" value="09:00">
        </div>
        <div class="hc-form-group">
            <label>Çıkış Saati</label>
            <input type="time" id="hc-cs-end" value="18:00">
        </div>
        <div class="hc-form-group">
            <label>Mola Süresi (Dakika)</label>
            <input type="number" id="hc-cs-break" value="60">
        </div>
        <button class="hc-btn" onclick="hcCalismaSaatiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cs-result">
            <div class="hc-result-title">Net Çalışma Süresi:</div>
            <div class="hc-result-value" id="hc-cs-val">-</div>
        </div>
    </div>
    <?php
}
