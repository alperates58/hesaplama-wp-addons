<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lise_mezuniyet_puani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lise-mezuniyet',
        HC_PLUGIN_URL . 'modules/lise-mezuniyet-puani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lmp-calc">
        <h3>Lise Mezuniyet Puanı Hesaplama</h3>
        <div class="hc-form-group">
            <label>9. Sınıf YBP</label>
            <input type="number" step="0.01" class="hc-lmp-grade" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>10. Sınıf YBP</label>
            <input type="number" step="0.01" class="hc-lmp-grade" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>11. Sınıf YBP</label>
            <input type="number" step="0.01" class="hc-lmp-grade" placeholder="0-100">
        </div>
        <div class="hc-form-group">
            <label>12. Sınıf YBP</label>
            <input type="number" step="0.01" class="hc-lmp-grade" placeholder="0-100">
        </div>
        <button class="hc-btn" onclick="hcLmpHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lmp-result">
            <div class="hc-result-title">Lise Mezuniyet Puanı:</div>
            <div class="hc-result-value" id="hc-lmp-val">-</div>
        </div>
    </div>
    <?php
}
