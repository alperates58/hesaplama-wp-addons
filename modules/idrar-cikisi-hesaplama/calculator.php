<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_idrar_cikisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-idrar-cikisi-hesaplama',
        HC_PLUGIN_URL . 'modules/idrar-cikisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-idrar-cikisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/idrar-cikisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-urine-output">
        <h3>İdrar Çıkışı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-uo-vol">İdrar Miktarı (mL)</label>
            <input type="number" id="hc-uo-vol" placeholder="Örn: 1500">
        </div>
        <div class="hc-form-group">
            <label for="hc-uo-weight">Vücut Ağırlığı (kg)</label>
            <input type="number" id="hc-uo-weight" placeholder="Örn: 70">
        </div>
        <div class="hc-form-group">
            <label for="hc-uo-time">Süre (Saat)</label>
            <input type="number" id="hc-uo-time" value="24">
        </div>
        <button class="hc-btn" onclick="hcİdrarÇıkışıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-uo-result">
            <div class="hc-result-label">İdrar Çıkış Hızı:</div>
            <div class="hc-result-value" id="hc-uo-val">-</div>
            <p id="hc-uo-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
