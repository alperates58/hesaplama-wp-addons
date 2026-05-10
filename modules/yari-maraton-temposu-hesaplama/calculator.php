<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yari_maraton_temposu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-half-pace',
        HC_PLUGIN_URL . 'modules/yari-maraton-temposu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-run-pace-css',
        HC_PLUGIN_URL . 'modules/kosu-temposu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-half-pace">
        <h3>Yarı Maraton (21.097 km) Tempo Hesabı</h3>
        <div class="hc-form-group">
            <label>Hedef Bitirme Süresi (Saat : Dakika):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-hmp-hr" placeholder="1" style="flex:1;">
                <input type="number" id="hc-hmp-min" placeholder="45" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hcHalfPaceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-half-pace-result">
            <strong>Gereken Ortalama Tempo:</strong>
            <div id="hc-hmp-res-val" class="hc-result-value">-</div>
            <span>dk / km</span>
        </div>
    </div>
    <?php
}
