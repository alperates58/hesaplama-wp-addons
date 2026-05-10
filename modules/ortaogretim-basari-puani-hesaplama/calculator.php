<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortaogretim_basari_puani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-obp',
        HC_PLUGIN_URL . 'modules/ortaogretim-basari-puani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-obp">
        <h3>OBP Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-obp-not">Diploma Notu (0-100):</label>
            <input type="number" id="hc-obp-not" step="0.01" min="50" max="100" placeholder="85.50">
        </div>
        <button class="hc-btn" onclick="hcObpHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-obp-result">
            <div class="hc-obp-res-row">
                <strong>OBP Puanı:</strong>
                <span id="hc-obp-val" class="hc-result-value">-</span>
            </div>
            <div class="hc-obp-res-row" style="margin-top:10px;">
                <strong>Yerleştirme Puanına Katkı:</strong>
                <span id="hc-obp-katki">-</span>
            </div>
        </div>
    </div>
    <?php
}
