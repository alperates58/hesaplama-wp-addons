<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuruyus_temposu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-walk-pace',
        HC_PLUGIN_URL . 'modules/yuruyus-temposu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-walk-pace-css',
        HC_PLUGIN_URL . 'modules/yuruyus-temposu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-walk-pace">
        <h3>Yürüyüş Temposu & Hız Hesabı</h3>
        <div class="hc-form-group">
            <label for="hc-wp-dist">Mesafe (km):</label>
            <input type="number" id="hc-wp-dist" step="0.1" placeholder="3.0">
        </div>
        <div class="hc-form-group">
            <label>Süre (Dakika : Saniye):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-wp-min" placeholder="45" style="flex:1;">
                <input type="number" id="hc-wp-sec" placeholder="0" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcWalkPaceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-walk-pace-result">
            <div class="hc-walk-grid">
                <div class="hc-walk-item">
                    <strong>Hız</strong>
                    <div id="hc-wp-res-speed">-</div>
                    <span>km/s</span>
                </div>
                <div class="hc-walk-item">
                    <strong>Tempo</strong>
                    <div id="hc-wp-res-pace">-</div>
                    <span>dk/km</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
