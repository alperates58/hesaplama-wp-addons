<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vucut_tipi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-body-type',
        HC_PLUGIN_URL . 'modules/vucut-tipi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-body-type-css',
        HC_PLUGIN_URL . 'modules/vucut-tipi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-body-type">
        <h3>Vücut Tipi Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-bt-bust">Göğüs Çevresi (cm):</label>
            <input type="number" id="hc-bt-bust" placeholder="90">
        </div>
        <div class="hc-form-group">
            <label for="hc-bt-waist">Bel Çevresi (cm):</label>
            <input type="number" id="hc-bt-waist" placeholder="70">
        </div>
        <div class="hc-form-group">
            <label for="hc-bt-hip">Kalça Çevresi (cm):</label>
            <input type="number" id="hc-bt-hip" placeholder="95">
        </div>
        <button class="hc-btn" onclick="hcBodyTypeHesapla()">Tipi Belirle</button>
        <div class="hc-result" id="hc-body-type-result">
            <strong>Vücut Tipiniz:</strong>
            <div id="hc-bt-res-val" class="hc-result-value">-</div>
            <p id="hc-bt-res-desc" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
