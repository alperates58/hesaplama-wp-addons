<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pulmoner_emboli_wells_skoru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pulmoner-emboli-wells-skoru-hesaplama',
        HC_PLUGIN_URL . 'modules/pulmoner-emboli-wells-skoru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pulmoner-emboli-wells-skoru-hesaplama-css',
        HC_PLUGIN_URL . 'modules/pulmoner-emboli-wells-skoru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wells-pe">
        <h3>Wells Pulmoner Emboli Skoru</h3>
        <div class="hc-form-group">
            <div class="hc-checkbox-group">
                <label><input type="checkbox" class="hc-ws-check" data-val="3.0"> DVT klinik belirtileri (şişlik, hassasiyet)</label>
                <label><input type="checkbox" class="hc-ws-check" data-val="3.0"> Alternatif tanı emboliden daha az olası</label>
                <label><input type="checkbox" class="hc-ws-check" data-val="1.5"> Kalp hızı > 100/dk</label>
                <label><input type="checkbox" class="hc-ws-check" data-val="1.5"> Son 4 haftada cerrahi veya immobilizasyon</label>
                <label><input type="checkbox" class="hc-ws-check" data-val="1.5"> Daha önce DVT veya PE öyküsü</label>
                <label><input type="checkbox" class="hc-ws-check" data-val="1.0"> Hemoptizi (Kanlı öksürük)</label>
                <label><input type="checkbox" class="hc-ws-check" data-val="1.0"> Malignite (Aktif kanser tedavisi)</label>
            </div>
        </div>
        <button class="hc-btn" onclick="hcWellsPEHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ws-result">
            <div id="hc-ws-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
