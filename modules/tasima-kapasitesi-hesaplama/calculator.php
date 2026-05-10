<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tasima_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tasima-kapasitesi-hesaplama',
        HC_PLUGIN_URL . 'modules/tasima-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tasima-kapasitesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tasima-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-carry-cap">
        <h3>Ekosistem Taşıma Kapasitesi</h3>
        <div class="hc-form-group">
            <label for="hc-cc-resource">Toplam Mevcut Kaynak (Birim)</label>
            <input type="number" id="hc-cc-resource" placeholder="Örn: 10000">
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-consumption">Kişi Başı Tüketim (Birim/Yıl)</label>
            <input type="number" id="hc-cc-consumption" placeholder="Örn: 200">
        </div>
        <div class="hc-form-group">
            <label for="hc-cc-regen">Yıllık Yenilenme Oranı (%)</label>
            <input type="number" id="hc-cc-regen" value="5">
        </div>
        <button class="hc-btn" onclick="hcTaşıma KapasitesiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cc-result">
            <div class="hc-result-label">Sürdürülebilir Maks. Nüfus (K):</div>
            <div class="hc-result-value" id="hc-cc-val">-</div>
        </div>
    </div>
    <?php
}
