<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enflasyona_gore_yatirim_getirisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-enf-getiri',
        HC_PLUGIN_URL . 'modules/enflasyona-gore-yatirim-getirisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-enf-getiri-css',
        HC_PLUGIN_URL . 'modules/enflasyona-gore-yatirim-getirisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-enf-y">
        <h3>Enflasyona Göre Getiri Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-ey-amount">Yatırım Tutarı (₺)</label>
            <input type="number" id="hc-ey-amount" placeholder="Örn: 100.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-ey-return">Yatırım Getiri Oranı (%)</label>
            <input type="number" id="hc-ey-return" placeholder="Örn: 50">
        </div>
        <div class="hc-form-group">
            <label for="hc-ey-inflation">Dönem Enflasyon Oranı (%)</label>
            <input type="number" id="hc-ey-inflation" placeholder="Örn: 40">
        </div>
        <button class="hc-btn" onclick="hcEnfGetiriHesapla()">Analiz Et</button>
        <div class="hc-result" id="hc-ey-result">
            <div class="hc-result-item">
                <span>Nominal Bakiye:</span>
                <strong id="hc-ey-res-nominal">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Reel Değer (Bugünkü Alım Gücü):</span>
                <strong id="hc-ey-res-real">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Reel Kâr / Zarar:</span>
                <strong class="hc-result-value" id="hc-ey-res-profit">-</strong>
            </div>
        </div>
    </div>
    <?php
}
