<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kedi_gebelik_takvimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kedi-gebelik',
        HC_PLUGIN_URL . 'modules/kedi-gebelik-takvimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kedi-gebelik-css',
        HC_PLUGIN_URL . 'modules/kedi-gebelik-takvimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kedi-gebelik">
        <h3>Kedi Gebelik Takvimi</h3>
        <div class="hc-form-group">
            <label for="hc-kgt-date">Çiftleşme Tarihi:</label>
            <input type="date" id="hc-kgt-date" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcKediGebelikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kedi-gebelik-result">
            <strong>Tahmini Doğum Tarihi:</strong>
            <div id="hc-kgt-res-date" class="hc-result-value">-</div>
            <div id="hc-kgt-res-info" style="margin-top:10px;"></div>
        </div>
    </div>
    <?php
}
