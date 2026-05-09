<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_jant_genisligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rim-width-calc',
        HC_PLUGIN_URL . 'modules/jant-genisligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-jgc-box">
        <h3>Jant Genişliği Hesaplama</h3>
        <div class="hc-form-group">
            <label>Lastik Taban Genişliği (mm)</label>
            <input type="number" id="hc-jgc-width" placeholder="Örn: 205">
        </div>
        <button class="hc-btn" onclick="hcJgcHesapla()">Jant Ölçülerini Bul</button>
        <div class="hc-result" id="hc-jgc-result">
            <div class="hc-result-grid" style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px;">
                <div><strong>Minimum:</strong><br><span id="hc-jgc-min">-</span></div>
                <div><strong>İdeal:</strong><br><span id="hc-jgc-ideal">-</span></div>
                <div><strong>Maksimum:</strong><br><span id="hc-jgc-max">-</span></div>
            </div>
        </div>
    </div>
    <?php
}
