<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_qtc_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-qtc-hesaplama',
        HC_PLUGIN_URL . 'modules/qtc-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-qtc-hesaplama-css',
        HC_PLUGIN_URL . 'modules/qtc-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-qtc-calc">
        <h3>QTc Hesaplama (Bazett)</h3>
        <div class="hc-form-group">
            <label for="hc-qt-val">Ölçülen QT Aralığı (ms)</label>
            <input type="number" id="hc-qt-val" placeholder="Örn: 400">
        </div>
        <div class="hc-form-group">
            <label for="hc-qt-hr">Kalp Hızı (atım/dk)</label>
            <input type="number" id="hc-qt-hr" placeholder="Örn: 75">
        </div>
        <button class="hc-btn" onclick="hcQTcHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-qt-result">
            <div class="hc-result-label">Düzeltilmiş QT (QTc):</div>
            <div class="hc-result-value" id="hc-qt-res">-</div>
        </div>
    </div>
    <?php
}
