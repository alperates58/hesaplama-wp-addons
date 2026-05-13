<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_normal_dagilim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-normal-dagilim-hesaplama',
        HC_PLUGIN_URL . 'modules/normal-dagilim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-normal-dagilim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/normal-dagilim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-normal-dagilim-hesaplama">
        <h3>Normal Dağılım Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-nd-mu">Ortalama (μ)</label>
            <input type="number" id="hc-nd-mu" step="any" placeholder="Örn: 0">
        </div>
        <div class="hc-form-group">
            <label for="hc-nd-sigma">Standart Sapma (σ)</label>
            <input type="number" id="hc-nd-sigma" step="any" placeholder="Örn: 1">
        </div>
        <div class="hc-form-group">
            <label for="hc-nd-x">X Değeri</label>
            <input type="number" id="hc-nd-x" step="any" placeholder="Örn: 1.96">
        </div>
        <button class="hc-btn" onclick="hcNormalDagilimHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-normal-dagilim-hesaplama-result">
            <div id="hc-nd-res-z"></div>
            <div id="hc-nd-res-pdf"></div>
            <div id="hc-nd-res-cdf"></div>
        </div>
    </div>
    <?php
}
