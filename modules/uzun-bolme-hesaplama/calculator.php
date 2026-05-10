<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uzun_bolme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-long-div',
        HC_PLUGIN_URL . 'modules/uzun-bolme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-long-div">
        <h3>Uzun Bölme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ld-s1">Bölünen:</label>
            <input type="number" id="hc-ld-s1" placeholder="125">
        </div>
        <div class="hc-form-group">
            <label for="hc-ld-s2">Bölen:</label>
            <input type="number" id="hc-ld-s2" placeholder="4">
        </div>
        <button class="hc-btn" onclick="hcLongDivHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-uzun-bolme-result">
            <div style="margin-bottom:10px;">
                <strong>Bölüm:</strong>
                <div id="hc-ld-res-quo" class="hc-result-value">-</div>
            </div>
            <div>
                <strong>Kalan:</strong>
                <div id="hc-ld-res-rem" style="font-size:1.4rem;">-</div>
            </div>
        </div>
    </div>
    <?php
}
