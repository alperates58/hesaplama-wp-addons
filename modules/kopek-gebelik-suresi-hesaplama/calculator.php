<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kopek_gebelik_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kopek-gebelik',
        HC_PLUGIN_URL . 'modules/kopek-gebelik-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kopek-gebelik-css',
        HC_PLUGIN_URL . 'modules/kopek-gebelik-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kopek-gebelik">
        <h3>Köpek Gebelik Takvimi</h3>
        <div class="hc-form-group">
            <label for="hc-kgs-date">Çiftleşme Tarihi:</label>
            <input type="date" id="hc-kgs-date" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcKopekGebelikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kopek-gebelik-result">
            <strong>Tahmini Doğum Tarihi:</strong>
            <div id="hc-kgs-res-date" class="hc-result-value">-</div>
            <div id="hc-kgs-res-info" style="margin-top:10px;"></div>
        </div>
    </div>
    <?php
}
