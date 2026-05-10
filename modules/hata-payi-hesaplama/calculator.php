<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hata_payi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-margin-error',
        HC_PLUGIN_URL . 'modules/hata-payi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-margin-error-css',
        HC_PLUGIN_URL . 'modules/hata-payi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-margin-error">
        <h3>Hata Payı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-me-pop">Örneklem Büyüklüğü (n):</label>
            <input type="number" id="hc-me-pop" placeholder="400">
        </div>
        <div class="hc-form-group">
            <label for="hc-me-conf">Güven Düzeyi (%):</label>
            <select id="hc-me-conf">
                <option value="1.645">90 %</option>
                <option value="1.96" selected>95 %</option>
                <option value="2.576">99 %</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMarginErrorHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-margin-error-result">
            <strong>Hata Payı:</strong>
            <div id="hc-me-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
