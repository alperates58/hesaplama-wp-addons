<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dizi_izleme_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dizi-izleme-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/dizi-izleme-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dizi-izleme-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/dizi-izleme-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-series">
        <h3>Dizi İzleme Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sr-episodes">Toplam Bölüm Sayısı</label>
            <input type="number" id="hc-sr-episodes" placeholder="Örn: 62">
        </div>
        <div class="hc-form-group">
            <label for="hc-sr-duration">Bölüm Başı Süre (Dakika)</label>
            <input type="number" id="hc-sr-duration" placeholder="Örn: 45">
        </div>
        <button class="hc-btn" onclick="hcDiziİzlemeSüresiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sr-result">
            <div class="hc-result-label">Toplam İzleme Süresi:</div>
            <div class="hc-result-value" id="hc-sr-val">-</div>
        </div>
    </div>
    <?php
}
