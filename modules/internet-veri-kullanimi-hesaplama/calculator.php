<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_internet_veri_kullanimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-internet-veri-kullanimi-hesaplama',
        HC_PLUGIN_URL . 'modules/internet-veri-kullanimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-internet-veri-kullanimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/internet-veri-kullanimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-data">
        <h3>İnternet Veri Kullanımı</h3>
        <div class="hc-form-group">
            <label>Video İzleme (Saat/Gün)</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-data-vid-sd" placeholder="SD" value="0">
                <input type="number" id="hc-data-vid-hd" placeholder="HD" value="0">
                <input type="number" id="hc-data-vid-4k" placeholder="4K" value="0">
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-data-music">Müzik Dinleme (Saat/Gün)</label>
            <input type="number" id="hc-data-music" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-data-browse">Sosyal Medya / Web (Saat/Gün)</label>
            <input type="number" id="hc-data-browse" value="0">
        </div>
        <button class="hc-btn" onclick="hcİnternetVeriKullanımıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-data-result">
            <div class="hc-result-label">Tahmini Aylık Tüketim:</div>
            <div class="hc-result-value" id="hc-data-val">-</div>
        </div>
    </div>
    <?php
}
