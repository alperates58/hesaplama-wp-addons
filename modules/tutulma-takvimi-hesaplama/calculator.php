<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tutulma_takvimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tutulma-takvimi-hesaplama',
        HC_PLUGIN_URL . 'modules/tutulma-takvimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tutulma-takvimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tutulma-takvimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-eclipse-calendar">
        <h3>Tutulma Takvimi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ec-year">Yıl Seçin:</label>
            <input type="number" id="hc-ec-year" class="hc-input" value="<?php echo date('Y'); ?>">
        </div>
        <button class="hc-btn" onclick="hcTutulmaTakvimiHesapla()">Takvimi Listele</button>
        <div class="hc-result" id="hc-tutulma-takvimi-result">
            <div id="hc-ec-list" class="hc-ec-list">
                <!-- Tutulma listesi buraya -->
            </div>
        </div>
    </div>
    <?php
}
