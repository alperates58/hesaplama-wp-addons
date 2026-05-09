<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cift_bag_esdegeri_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dbe',
        HC_PLUGIN_URL . 'modules/cift-bag-esdegeri-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dbe-css',
        HC_PLUGIN_URL . 'modules/cift-bag-esdegeri-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dbe">
        <h3>Çift Bağ Eşdeğeri (DBE) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-db-c">Karbon Sayısı (C)</label>
            <input type="number" id="hc-db-c" placeholder="0" value="0" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-db-h">Hidrojen Sayısı (H)</label>
            <input type="number" id="hc-db-h" placeholder="0" value="0" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-db-n">Azot Sayısı (N)</label>
            <input type="number" id="hc-db-n" placeholder="0" value="0" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-db-x">Halojen Sayısı (F, Cl, Br, I)</label>
            <input type="number" id="hc-db-x" placeholder="0" value="0" min="0">
        </div>
        <button class="hc-btn" onclick="hcDBEHesapla()">DBE Hesapla</button>
        <div class="hc-result" id="hc-db-result">
            <div class="hc-result-label">Doymamışlık Derecesi:</div>
            <div class="hc-result-value" id="hc-db-val">-</div>
            <div class="hc-result-note">Formül: C + 1 - H/2 - X/2 + N/2</div>
        </div>
    </div>
    <?php
}
