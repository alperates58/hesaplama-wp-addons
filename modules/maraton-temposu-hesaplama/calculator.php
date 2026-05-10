<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maraton_temposu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-marathon-pace',
        HC_PLUGIN_URL . 'modules/maraton-temposu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-run-pace-css',
        HC_PLUGIN_URL . 'modules/kosu-temposu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-marathon-pace">
        <h3>Maraton (42.195 km) Tempo Hesabı</h3>
        <div class="hc-form-group">
            <label>Hedef Bitirme Süresi (Saat : Dakika):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-mp-hr" placeholder="3" style="flex:1;">
                <input type="number" id="hc-mp-min" placeholder="30" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcMarathonPaceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-marathon-pace-result">
            <strong>Gereken Ortalama Tempo:</strong>
            <div id="hc-mp-res-val" class="hc-result-value">-</div>
            <span>dk / km</span>
        </div>
    </div>
    <?php
}
