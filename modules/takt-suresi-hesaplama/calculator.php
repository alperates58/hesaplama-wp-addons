<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_takt_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-takt-time',
        HC_PLUGIN_URL . 'modules/takt-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-takt-time-css',
        HC_PLUGIN_URL . 'modules/takt-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-takt-time">
        <h3>Takt Süresi (Takt Time)</h3>
        <div class="hc-form-group">
            <label for="hc-tt-time">Net Çalışma Süresi [Dakika/Vardiya]</label>
            <input type="number" id="hc-tt-time" value="450">
        </div>
        <div class="hc-form-group">
            <label for="hc-tt-demand">Müşteri Talebi [Adet/Vardiya]</label>
            <input type="number" id="hc-tt-demand" value="200">
        </div>
        <button class="hc-btn" onclick="hcTaktTimeHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-takt-time-result">
            <div class="hc-result-item">
                <span>Takt Süresi:</span>
                <span class="hc-result-value" id="hc-res-tt-val">0 saniye/adet</span>
            </div>
            <p class="hc-tt-note">Not: Bu süre, üretim hızınızın üst sınırıdır.</p>
        </div>
    </div>
    <?php
}
