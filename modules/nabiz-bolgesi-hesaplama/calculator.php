<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nabiz_bolgesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hr-zones',
        HC_PLUGIN_URL . 'modules/nabiz-bolgesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hr-zones-css',
        HC_PLUGIN_URL . 'modules/nabiz-bolgesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hr-zones">
        <h3>Nabız Bölgeleri (Z1 - Z5)</h3>
        <div class="hc-form-group">
            <label for="hc-hz-age">Yaşınız:</label>
            <input type="number" id="hc-hz-age" placeholder="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-hz-rest">Dinlenik Nabız:</label>
            <input type="number" id="hc-hz-rest" placeholder="70">
        </div>
        <button class="hc-btn" onclick="hcHrZonesHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hr-zones-result">
            <table class="hc-zones-table">
                <thead>
                    <tr><th>Bölge</th><th>Açıklama</th><th>Aralık</th></tr>
                </thead>
                <tbody id="hc-hz-tbody"></tbody>
            </table>
        </div>
    </div>
    <?php
}
