<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kosu_temposu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-run-pace',
        HC_PLUGIN_URL . 'modules/kosu-temposu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-run-pace-css',
        HC_PLUGIN_URL . 'modules/kosu-temposu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-run-pace">
        <h3>Koşu Temposu & Hız Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-rp-dist">Mesafe (km):</label>
            <input type="number" id="hc-rp-dist" step="0.1" placeholder="5.0">
        </div>
        <div class="hc-form-group">
            <label>Süre (Saat : Dakika : Saniye):</label>
            <div style="display:flex; gap:5px;">
                <input type="number" id="hc-rp-hr" placeholder="0" style="flex:1;">
                <input type="number" id="hc-rp-min" placeholder="25" style="flex:1;">
                <input type="number" id="hc-rp-sec" placeholder="0" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcRunPaceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-run-pace-result">
            <div class="hc-pace-grid">
                <div class="hc-pace-item">
                    <strong>Tempo</strong>
                    <div id="hc-rp-res-pace">-</div>
                    <span>dk/km</span>
                </div>
                <div class="hc-pace-item">
                    <strong>Hız</strong>
                    <div id="hc-rp-res-speed">-</div>
                    <span>km/s</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
