<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dosya_boyutu_donusturucu( $atts ) {
    wp_enqueue_script(
        'hc-dosya-boyutu-donusturucu',
        HC_PLUGIN_URL . 'modules/dosya-boyutu-donusturucu/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dosya-boyutu-donusturucu-css',
        HC_PLUGIN_URL . 'modules/dosya-boyutu-donusturucu/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dosya-boyutu-donusturucu">
        <h3>Dosya Boyutu Dönüştürücü</h3>
        <div class="hc-form-group">
            <label for="hc-dbd-deger">Dosya Boyutu</label>
            <input type="number" id="hc-dbd-deger" placeholder="Değer" step="any" oninput="hcDbDonustur()">
        </div>
        <div class="hc-form-group">
            <label for="hc-dbd-birim">Birim</label>
            <select id="hc-dbd-birim" onchange="hcDbDonustur()">
                <option value="B">Byte</option>
                <option value="KB">KB</option>
                <option value="MB" selected>MB</option>
                <option value="GB">GB</option>
                <option value="TB">TB</option>
            </select>
        </div>
        <div class="hc-result" id="hc-dosya-boyutu-donusturucu-result">
            <div id="hc-dbd-output"></div>
        </div>
    </div>
    <?php
}
