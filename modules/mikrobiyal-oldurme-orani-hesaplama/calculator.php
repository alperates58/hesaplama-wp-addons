<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mikrobiyal_oldurme_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-micro-kill',
        HC_PLUGIN_URL . 'modules/mikrobiyal-oldurme-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-micro-kill-css',
        HC_PLUGIN_URL . 'modules/mikrobiyal-oldurme-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-micro-kill">
        <h3>Mikrobiyal Öldürme Oranı (%)</h3>
        <div class="hc-form-group">
            <label for="hc-mk-before">Başlangıç (Pre-treatment) Sayısı:</label>
            <input type="number" id="hc-mk-before" placeholder="1000000">
        </div>
        <div class="hc-form-group">
            <label for="hc-mk-after">Sonuç (Post-treatment) Sayısı:</label>
            <input type="number" id="hc-mk-after" placeholder="10">
        </div>
        <button class="hc-btn" onclick="hcMicroKillHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-micro-kill-result">
            <strong>Öldürme Verimliliği:</strong>
            <div id="hc-mk-res-val" class="hc-result-value">-</div>
            <span>%</span>
        </div>
    </div>
    <?php
}
