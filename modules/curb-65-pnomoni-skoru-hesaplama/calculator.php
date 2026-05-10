<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_curb_65_pnomoni_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-curb65',
        HC_PLUGIN_URL . 'modules/curb-65-pnomoni-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-curb65-css',
        HC_PLUGIN_URL . 'modules/curb-65-pnomoni-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-curb65">
        <h3>CURB-65 Pnömoni Risk Skoru</h3>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-c65-c"> <strong>C: Konfüzyon</strong> (Yeni gelişen oryantasyon bozukluğu)</label>
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-c65-u"> <strong>U: Üre</strong> (BUN > 19 mg/dL veya Üre > 7 mmol/L)</label>
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-c65-r"> <strong>R: Solunum Sayısı</strong> (≥ 30/dakika)</label>
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-c65-b"> <strong>B: Kan Basıncı</strong> (Sistolik < 90 veya Diyastolik ≤ 60 mmHg)</label>
        </div>
        <div class="hc-form-group">
            <label><input type="checkbox" id="hc-c65-65"> <strong>65: Yaş</strong> (≥ 65 yaş)</label>
        </div>
        <button class="hc-btn" onclick="hcCurb65Hesapla()">Hesapla</button>
        <div class="hc-result" id="hc-curb65-result">
            <strong>Toplam Skor: <span id="hc-c65-res-val" class="hc-result-value">-</span></strong>
            <div id="hc-c65-res-risk" style="margin-top:10px; font-weight:bold;"></div>
            <div id="hc-c65-res-rec" style="margin-top:5px; font-size:0.9em;"></div>
        </div>
    </div>
    <?php
}
