<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_geri_donusum_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-geri-donusum-etkisi-hesaplama',
        HC_PLUGIN_URL . 'modules/geri-donusum-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-geri-donusum-etkisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/geri-donusum-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-recycle-impact">
        <h3>Geri Dönüşüm Etkisi</h3>
        <div class="hc-form-group">
            <label for="hc-ri-paper">Kağıt (kg)</label>
            <input type="number" id="hc-ri-paper" placeholder="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ri-plastic">Plastik (kg)</label>
            <input type="number" id="hc-ri-plastic" placeholder="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ri-glass">Cam (kg)</label>
            <input type="number" id="hc-ri-glass" placeholder="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-ri-metal">Metal / Alüminyum (kg)</label>
            <input type="number" id="hc-ri-metal" placeholder="0">
        </div>
        <button class="hc-btn" onclick="hcGeriDönüşümEtkisiHesapla()">Etkiyi Hesapla</button>
        <div class="hc-result" id="hc-ri-result">
            <div id="hc-ri-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
