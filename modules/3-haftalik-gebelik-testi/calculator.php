<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_3_haftalik_gebelik_testi( $atts ) {
    wp_enqueue_script(
        'hc-3-week-test',
        HC_PLUGIN_URL . 'modules/3-haftalik-gebelik-testi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-3w-box">
        <h3>3 Haftalık Gebelik Testi Analizi</h3>
        
        <div class="hc-form-group">
            <label for="hc-3w-lmp">Son Adet Tarihi (SAT)</label>
            <input type="date" id="hc-3w-lmp">
        </div>

        <button class="hc-btn" onclick="hc3HaftaAnaliz()">Analiz Et</button>

        <div class="hc-result" id="hc-3w-result">
            <div id="hc-3w-status" style="padding: 15px; border-radius: 8px; text-align: center; font-weight: bold; margin-bottom: 15px;">
                <!-- Durum -->
            </div>
            <div id="hc-3w-desc" style="font-size: 0.9em; line-height: 1.5;">
                <!-- Açıklama -->
            </div>
        </div>
    </div>
    <?php
}
