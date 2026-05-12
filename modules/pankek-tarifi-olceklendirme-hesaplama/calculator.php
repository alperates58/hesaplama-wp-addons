<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pankek_tarifi_olceklendirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pancake-scaling-js',
        HC_PLUGIN_URL . 'modules/pankek-tarifi-olceklendirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pancake-scaling-css',
        HC_PLUGIN_URL . 'modules/pankek-tarifi-olceklendirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pancake-scaling">
        <h3>Pankek Tarifi Ölçeklendirme</h3>
        
        <div class="hc-form-group">
            <label for="hc-ps-eggs">Elinizdeki Yumurta Sayısı</label>
            <input type="number" id="hc-ps-eggs" value="2" min="1">
        </div>

        <button class="hc-btn" onclick="hcPankekOlçekle()">Hesapla</button>

        <div class="hc-result" id="hc-pancake-scaling-result">
            <div id="hc-ps-res-list">
                <!-- JS populated -->
            </div>
        </div>
    </div>
    <?php
}
