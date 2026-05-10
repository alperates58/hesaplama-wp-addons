<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kopek_gebelik_takvimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kopek-takvim',
        HC_PLUGIN_URL . 'modules/kopek-gebelik-takvimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kopek-takvim-css',
        HC_PLUGIN_URL . 'modules/kopek-gebelik-takvimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kopek-takvim">
        <h3>Detaylı Köpek Gebelik Takvimi</h3>
        <div class="hc-form-group">
            <label for="hc-kgt-date2">Çiftleşme Tarihi:</label>
            <input type="date" id="hc-kgt-date2" value="<?php echo date('Y-m-d'); ?>">
        </div>
        <button class="hc-btn" onclick="hcKopekTakvimHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kopek-takvim-result">
            <strong>Tahmini Doğum: <span id="hc-kgt-res-date2">-</span></strong>
            <ul id="hc-kgt-res-milestones" style="text-align:left; margin-top:15px; font-size:0.9rem;">
                <!-- Kilometre taşları buraya gelecek -->
            </ul>
        </div>
    </div>
    <?php
}
