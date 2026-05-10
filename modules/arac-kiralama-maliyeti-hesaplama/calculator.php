<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_arac_kiralama_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-arac-kiralama-maliyeti-hesaplama',
        HC_PLUGIN_URL . 'modules/arac-kiralama-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-arac-kiralama-maliyeti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/arac-kiralama-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-car-rental">
        <h3>Araç Kiralama Maliyeti</h3>
        <div class="hc-form-group">
            <label for="hc-cr-daily">Günlük Kira Ücreti (₺)</label>
            <input type="number" id="hc-cr-daily" placeholder="Örn: 1500">
        </div>
        <div class="hc-form-group">
            <label for="hc-cr-days">Gün Sayısı</label>
            <input type="number" id="hc-cr-days" value="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-cr-fuel">Tahmini Yakıt Harcaması (₺)</label>
            <input type="number" id="hc-cr-fuel" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-cr-extra">Ekstra Masraflar (Sigorta, HGS vb.) (₺)</label>
            <input type="number" id="hc-cr-extra" value="0">
        </div>
        <button class="hc-btn" onclick="hcAraçKiralamaMaliyetiHesapla()">Toplamı Hesapla</button>
        <div class="hc-result" id="hc-cr-result">
            <div class="hc-result-label">Toplam Kiralama Maliyeti:</div>
            <div class="hc-result-value" id="hc-cr-val">-</div>
        </div>
    </div>
    <?php
}
