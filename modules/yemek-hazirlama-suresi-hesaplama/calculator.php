<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yemek_hazirlama_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-prep-time',
        HC_PLUGIN_URL . 'modules/yemek-hazirlama-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-prep-time-calc">
        <h3>Servis Zamanı Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-pt-prep">Hazırlama Süresi (dk):</label>
            <input type="number" id="hc-pt-prep" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-pt-cook">Pişirme Süresi (dk):</label>
            <input type="number" id="hc-pt-cook" placeholder="45">
        </div>
        <div class="hc-form-group">
            <label for="hc-pt-rest">Dinlendirme Süresi (dk):</label>
            <input type="number" id="hc-pt-rest" value="10">
        </div>
        <button class="hc-btn" onclick="hcPrepTimeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-prep-time-result">
            <strong>Toplam Süre:</strong>
            <div id="hc-pt-val" class="hc-result-value">-</div>
            <p id="hc-pt-info"></p>
        </div>
    </div>
    <?php
}
