<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bilimsel_gosterim_donusturme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sci-not-conv',
        HC_PLUGIN_URL . 'modules/bilimsel-gosterim-donusturme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sci-not-conv-css',
        HC_PLUGIN_URL . 'modules/bilimsel-gosterim-donusturme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sci-conv">
        <h3>Bilimsel Gösterim Dönüştürücü</h3>
        
        <div class="hc-form-group">
            <label for="hc-sc-val">Sayıyı Girin</label>
            <input type="text" id="hc-sc-val" placeholder="Örn: 500000 veya 5e5">
        </div>

        <button class="hc-btn" onclick="hcBilimselDonustur()">Dönüştür</button>

        <div class="hc-result" id="hc-sc-result">
            <div class="hc-result-item">
                <span>Bilimsel Gösterim:</span>
                <span class="hc-result-value highlight" id="hc-res-sc-sci">-</span>
            </div>
            <div class="hc-result-item">
                <span>Standart Sayı:</span>
                <span class="hc-result-value" id="hc-res-sc-std">-</span>
            </div>
            <div class="hc-result-item">
                <span>Mühendislik Gösterimi:</span>
                <span class="hc-result-value" id="hc-res-sc-eng">-</span>
            </div>
        </div>
    </div>
    <?php
}
