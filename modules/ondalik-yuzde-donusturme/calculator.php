<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ondalik_yuzde_donusturme( $atts ) {
    wp_enqueue_script(
        'hc-ondalik-yuzde-donusturme',
        HC_PLUGIN_URL . 'modules/ondalik-yuzde-donusturme/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ondalik-yuzde-donusturme-css',
        HC_PLUGIN_URL . 'modules/ondalik-yuzde-donusturme/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ondalik-yuzde-donusturme">
        <div class="hc-header">
            <h3>Ondalık ➔ Yüzde Dönüştürücü</h3>
            <p>Ondalık bir sayıyı yüzdeye çevirmek için değeri girin.</p>
        </div>
        
        <div class="hc-form-group">
            <label>Ondalık Sayı</label>
            <input type="number" id="hc-dec-val" placeholder="Örn: 0.125" step="any">
        </div>

        <button class="hc-btn" onclick="hcDecToPerc()">Dönüştür</button>

        <div class="hc-result" id="hc-dec-result">
            <div class="hc-res-box">
                <div class="hc-res-label">YÜZDE KARŞILIĞI</div>
                <div class="hc-res-main">
                    %<span id="hc-res-dec-perc">0</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
