<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_nabiz_bolgesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hr-bike',
        HC_PLUGIN_URL . 'modules/bisiklet-nabiz-bolgesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hr-bike-css',
        HC_PLUGIN_URL . 'modules/bisiklet-nabiz-bolgesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hr-bike">
        <h3>Bisiklet Nabız Bölgeleri (Friel Sistemi)</h3>
        <div class="hc-form-group">
            <label for="hc-hb-lthr">Laktat Eşik Nabzınız (LTHR):</label>
            <input type="number" id="hc-hb-lthr" placeholder="165">
            <small>30 dakikalık zamana karşı testin son 20 dk ortalaması.</small>
        </div>
        <button class="hc-btn" onclick="hcHrBikeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hr-bike-result">
            <table class="hc-zones-table">
                <thead>
                    <tr><th>Bölge</th><th>Açıklama</th><th>Aralık</th></tr>
                </thead>
                <tbody id="hc-hb-tbody"></tbody>
            </table>
        </div>
    </div>
    <?php
}
