<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_satis_karliligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ros',
        HC_PLUGIN_URL . 'modules/satis-karliligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ros-css',
        HC_PLUGIN_URL . 'modules/satis-karliligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ros">
        <h3>Satış Karlılığı (ROS) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ros-net-profit">Yıllık Net Kar (TL)</label>
            <input type="number" id="hc-ros-net-profit">
        </div>

        <div class="hc-form-group">
            <label for="hc-ros-revenue">Toplam Net Satışlar (Ciro) (TL)</label>
            <input type="number" id="hc-ros-revenue">
        </div>
        
        <button class="hc-btn" onclick="hcROSHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ros-result">
            <div class="hc-result-value" id="hc-ros-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Net Kar Marjı (ROS)</p>
        </div>
    </div>
    <?php
}
