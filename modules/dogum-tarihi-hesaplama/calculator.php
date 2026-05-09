<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_tarihi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dogum-tarihi',
        HC_PLUGIN_URL . 'modules/dogum-tarihi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dogum-tarihi-hesaplama">
        <h3>Doğum Tarihi Hesaplama</h3>
        <div class="hc-form-group">
            <label>Son Adet Tarihi (SAT)</label>
            <input type="date" id="hc-dt-sat" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcDogumTarihiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dt-result">
            <div class="hc-form-group">
                <label>Tahmini Doğum Tarihi:</label>
                <div class="hc-result-value" id="hc-dt-val">-</div>
            </div>
            <div id="hc-dt-info" style="font-size: 14px; margin-top: 10px;"></div>
        </div>
    </div>
    <?php
}
