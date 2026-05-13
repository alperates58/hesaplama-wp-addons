<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_normal_yaklasim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-normal-yaklasim-hesaplama',
        HC_PLUGIN_URL . 'modules/normal-yaklasim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-normal-yaklasim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/normal-yaklasim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-normal-yaklasim-hesaplama">
        <h3>Normal Dağılım Yaklaşımı (Binom için)</h3>
        <div class="hc-form-group">
            <label for="hc-ny-n">Deneme Sayısı (n)</label>
            <input type="number" id="hc-ny-n" min="1" placeholder="Örn: 100">
        </div>
        <div class="hc-form-group">
            <label for="hc-ny-p">Başarı Olasılığı (p) [0-1]</label>
            <input type="number" id="hc-ny-p" step="0.01" min="0" max="1" placeholder="Örn: 0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-ny-x">Aranan Başarı Sayısı (x)</label>
            <input type="number" id="hc-ny-x" min="0" placeholder="Örn: 45">
        </div>
        <button class="hc-btn" onclick="hcNormalYaklasimHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-normal-yaklasim-hesaplama-result">
            <div id="hc-ny-params" style="margin-bottom:10px; font-size:0.9rem; color:#666;"></div>
            <div id="hc-ny-res-prob"></div>
            <div id="hc-ny-res-desc" style="margin-top:10px; font-style:italic;"></div>
        </div>
    </div>
    <?php
}
