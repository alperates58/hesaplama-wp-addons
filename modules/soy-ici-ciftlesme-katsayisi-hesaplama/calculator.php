<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_soy_ici_ciftlesme_katsayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-inbreeding',
        HC_PLUGIN_URL . 'modules/soy-ici-ciftlesme-katsayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-inbreeding-css',
        HC_PLUGIN_URL . 'modules/soy-ici-ciftlesme-katsayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-inbreeding">
        <h3>Soy içi Çiftleşme Katsayısı (F)</h3>
        <div class="hc-form-group">
            <label for="hc-ib-relation">Akrabalık Derecesi:</label>
            <select id="hc-ib-relation">
                <option value="0.25">Kardeş / Ebeveyn-Yavru (F = 0.25)</option>
                <option value="0.125">Yarım Kardeş / Amca-Yeğen (F = 0.125)</option>
                <option value="0.0625">Birinci Derece Kuzen (F = 0.0625)</option>
                <option value="0.0156">İkinci Derece Kuzen (F = 0.0156)</option>
                <option value="0">Akraba Değil (F = 0)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcInbreedingHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-inbreeding-result">
            <strong>Katsayı (F):</strong>
            <div id="hc-ib-res-val" class="hc-result-value">-</div>
            <p id="hc-ib-res-desc" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
