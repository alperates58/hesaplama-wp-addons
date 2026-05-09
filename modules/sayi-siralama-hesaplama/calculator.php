<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sayi_siralama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-number-sort',
        HC_PLUGIN_URL . 'modules/sayi-siralama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-number-sort-css',
        HC_PLUGIN_URL . 'modules/sayi-siralama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-number-sort">
        <h3>Gelişmiş Sayı Sıralama</h3>
        <div class="hc-form-group">
            <label for="hc-ns-data">Sayı Listesi</label>
            <textarea id="hc-ns-data" placeholder="10, 5, 20..."></textarea>
        </div>
        <button class="hc-btn" onclick="hcNumberSortHesapla()">Analiz Et ve Sırala</button>
        <div class="hc-result" id="hc-number-sort-result">
            <div class="hc-result-item"> <span>Sıralı:</span> <span id="hc-res-ns-sorted"></span> </div>
            <div class="hc-result-item"> <span>En Küçük:</span> <b id="hc-res-ns-min">0</b> </div>
            <div class="hc-result-item"> <span>En Büyük:</span> <b id="hc-res-ns-max">0</b> </div>
        </div>
    </div>
    <?php
}
