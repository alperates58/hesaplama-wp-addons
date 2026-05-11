<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kondansator_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cap-total',
        HC_PLUGIN_URL . 'modules/kondansator-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cap-total">
        <h3>Eşdeğer Kapasite Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Bağlantı Türü</label>
            <select id="hc-ct-type">
                <option value="par">Paralel</option>
                <option value="ser">Seri</option>
            </select>
        </div>
        
        <div class="hc-form-group">
            <label>Kondansatör Değerleri (Virgül ile ayırın, μF)</label>
            <input type="text" id="hc-ct-values" placeholder="Örn: 10, 22, 47">
        </div>
        
        <button class="hc-btn" onclick="hcCapTotalHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ct-result">
            <span>Eşdeğer Kapasite (Ceş):</span>
            <div class="hc-result-value" id="hc-ct-res-val">0 μF</div>
        </div>
    </div>
    <?php
}
