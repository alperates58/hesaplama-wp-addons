<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_orneklem_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-orneklem-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/orneklem-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-orneklem-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/orneklem-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-orneklem-orani-hesaplama">
        <h3>Örneklem Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-prop-x">Olay Sayısı (X)</label>
            <input type="number" id="hc-prop-x" min="0" placeholder="Örn: 150">
        </div>
        <div class="hc-form-group">
            <label for="hc-prop-n">Toplam Örneklem Sayısı (n)</label>
            <input type="number" id="hc-prop-n" min="1" placeholder="Örn: 500">
        </div>
        <button class="hc-btn" onclick="hcOrneklemOraniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-orneklem-orani-hesaplama-result">
            <span class="hc-label">Örneklem Oranı (p̂):</span>
            <div class="hc-result-value" id="hc-prop-res-value">0</div>
            <div id="hc-prop-res-percent" style="margin-top:10px; font-weight:bold;"></div>
        </div>
    </div>
    <?php
}
