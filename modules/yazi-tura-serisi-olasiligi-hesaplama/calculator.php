<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yazi_tura_serisi_olasiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-coin-series',
        HC_PLUGIN_URL . 'modules/yazi-tura-serisi-olasiligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-coin-series-css',
        HC_PLUGIN_URL . 'modules/yazi-tura-serisi-olasiligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-coin-series">
        <h3>Yazı Tura Serisi Olasılığı</h3>
        <div class="hc-form-group">
            <label for="hc-cs-count">Seri Uzunluğu (Adet)</label>
            <input type="number" id="hc-cs-count" value="5" min="1" max="50">
        </div>
        <button class="hc-btn" onclick="hcCoinSeriesHesapla()">Olasılığı Hesapla</button>
        <div class="hc-result" id="hc-coin-series-result">
            <div class="hc-result-item">
                <span>Olasılık (1 / 2^n):</span>
                <span class="hc-result-value" id="hc-res-cs-val">%0</span>
            </div>
            <p class="hc-cs-note">Örn: 5 kez üst üste Yazı gelme olasılığı hesaplanır.</p>
        </div>
    </div>
    <?php
}
