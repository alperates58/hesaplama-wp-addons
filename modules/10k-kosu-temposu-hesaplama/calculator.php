<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_10k_kosu_temposu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-10k-pace',
        HC_PLUGIN_URL . 'modules/10k-kosu-temposu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-run-pace-css',
        HC_PLUGIN_URL . 'modules/kosu-temposu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-10k-pace">
        <h3>10K Tempo Hesabı</h3>
        <div class="hc-form-group">
            <label>Hedef Bitirme Süresi (Dakika : Saniye):</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-10k-min" placeholder="50" style="flex:1;">
                <input type="number" id="hc-10k-sec" placeholder="00" style="flex:1;">
            </div>
        </div>
        <button class="hc-btn" onclick="hc10kPaceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-10k-pace-result">
            <strong>Gereken Ortalama Tempo:</strong>
            <div id="hc-10k-res-val" class="hc-result-value">-</div>
            <span>dk / km</span>
        </div>
    </div>
    <?php
}
