<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vida_disi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thread-calc',
        HC_PLUGIN_URL . 'modules/vida-disi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-thread-calc-css',
        HC_PLUGIN_URL . 'modules/vida-disi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-thread">
        <h3>Metrik Vida Dişi Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-tc-metric">Vida Seçin (M):</label>
            <select id="hc-tc-metric" onchange="hcThreadCalcUpdate()">
                <option value="3|0.5">M3 x 0.5</option>
                <option value="4|0.7">M4 x 0.7</option>
                <option value="5|0.8">M5 x 0.8</option>
                <option value="6|1.0" selected>M6 x 1.0</option>
                <option value="8|1.25">M8 x 1.25</option>
                <option value="10|1.5">M10 x 1.5</option>
                <option value="12|1.75">M12 x 1.75</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcThreadCalcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-thread-result">
            <div class="hc-thread-grid">
                <div class="hc-thread-item">
                    <strong>Matkap Ucu</strong>
                    <div id="hc-tc-drill">-</div>
                    <span>mm</span>
                </div>
                <div class="hc-thread-item">
                    <strong>Diş Dibi Çapı</strong>
                    <div id="hc-tc-core">-</div>
                    <span>mm</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
