<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_not_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-grade-avg',
        HC_PLUGIN_URL . 'modules/ortalama-not-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-grade-avg">
        <h3>Ortalama Not Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ga-vize">Vize Notu (%40):</label>
            <input type="number" id="hc-ga-vize" placeholder="70">
        </div>
        <div class="hc-form-group">
            <label for="hc-ga-final">Final Notu (%60):</label>
            <input type="number" id="hc-ga-final" placeholder="80">
        </div>
        <button class="hc-btn" onclick="hcGradeAvgHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-grade-avg-result">
            <strong>Yıl Sonu Notu:</strong>
            <div id="hc-ga-res-val" class="hc-result-value">-</div>
            <p id="hc-ga-status" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
