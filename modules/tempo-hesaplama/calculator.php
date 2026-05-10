<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tempo_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tempo-hesaplama',
        HC_PLUGIN_URL . 'modules/tempo-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tempo-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tempo-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-run-pace">
        <h3>Koşu / Yürüyüş Tempo Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-run-dist">Mesafe (metre)</label>
            <input type="number" id="hc-run-dist" placeholder="Örn: 5000" value="5000">
        </div>
        <div class="hc-form-group">
            <label>Geçen Süre</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-run-hr" placeholder="Saat" value="0">
                <input type="number" id="hc-run-min" placeholder="Dak" value="25">
                <input type="number" id="hc-run-sec" placeholder="Sn" value="0">
            </div>
        </div>
        <button class="hc-btn" onclick="hcTempoHesapla()">Tempoyu Hesapla</button>
        <div class="hc-result" id="hc-run-result">
            <div class="hc-sp-grid">
                <div>
                    <div class="hc-result-label">Tempo</div>
                    <div class="hc-result-value" id="hc-run-pace-val">-</div>
                </div>
                <div>
                    <div class="hc-result-label">Hız (km/h)</div>
                    <div class="hc-result-value" id="hc-run-speed-val">-</div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
