<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bisiklet_tempo_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bisiklet-tempo-hesaplama',
        HC_PLUGIN_URL . 'modules/bisiklet-tempo-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bisiklet-tempo-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bisiklet-tempo-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bike-pace">
        <h3>Bisiklet Tempo Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bike-pace-speed">Hız (km/h)</label>
            <input type="number" id="hc-bike-pace-speed" placeholder="Örn: 25" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcBisikletTempoHesapla()">Tempoyu Hesapla</button>
        <div class="hc-result" id="hc-bike-pace-result">
            <div class="hc-result-label">Temponuz:</div>
            <div class="hc-result-value" id="hc-bike-pace-val">-</div>
            <div id="hc-bike-pace-desc" style="margin-top: 10px; font-size: 0.9em;"></div>
        </div>
    </div>
    <?php
}
