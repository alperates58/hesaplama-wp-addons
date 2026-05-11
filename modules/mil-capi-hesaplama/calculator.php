<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mil_capi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mil-cap',
        HC_PLUGIN_URL . 'modules/mil-capi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-mil-cap">
        <h3>Mil Çapı (Torsiyon) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mc-torque">İletilecek Tork (T - Nm)</label>
            <input type="number" id="hc-mc-torque" placeholder="Newton-metre" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-mc-stress">İzin Verilen Kayma Gerilmesi (τ - MPa)</label>
            <input type="number" id="hc-mc-stress" placeholder="Megapaskal" step="any" value="50">
            <small>Çelik için yaklaşık 40-60 MPa emniyetli sınır.</small>
        </div>

        <button class="hc-btn" onclick="hcMilCapHesapla()">Çapı Hesapla</button>

        <div class="hc-result" id="hc-mc-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Minimum Mil Çapı (d):</span>
                <span class="hc-result-value" id="hc-mc-res-total">--</span>
                <span class="hc-result-unit">mm</span>
            </div>
        </div>
    </div>
    <?php
}
