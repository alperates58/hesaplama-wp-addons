<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_negatif_binom_dagilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-negatif-binom-dagilimi-hesaplama',
        HC_PLUGIN_URL . 'modules/negatif-binom-dagilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-negatif-binom-dagilimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/negatif-binom-dagilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-negatif-binom-dagilimi-hesaplama">
        <h3>Negatif Binom Dağılımı</h3>
        <div class="hc-form-group">
            <label for="hc-nb-r">Hedeflenen Başarı Sayısı (r)</label>
            <input type="number" id="hc-nb-r" min="1" placeholder="Örn: 3">
        </div>
        <div class="hc-form-group">
            <label for="hc-nb-k">Toplam Deneme Sayısı (k)</label>
            <input type="number" id="hc-nb-k" min="1" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-nb-p">Her Denemede Başarı Olasılığı (p)</label>
            <input type="number" id="hc-nb-p" step="0.01" min="0" max="1" placeholder="Örn: 0.25">
        </div>
        <button class="hc-btn" onclick="hcNegatifBinomHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-negatif-binom-dagilimi-hesaplama-result">
            <div id="hc-nb-res-exact"></div>
            <div id="hc-nb-res-mean"></div>
            <div id="hc-nb-res-var"></div>
        </div>
    </div>
    <?php
}
