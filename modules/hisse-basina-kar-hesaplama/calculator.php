<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hisse_basina_kar_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eps',
        HC_PLUGIN_URL . 'modules/hisse-basina-kar-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-eps-css',
        HC_PLUGIN_URL . 'modules/hisse-basina-kar-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-eps">
        <h3>Hisse Başına Kar (EPS) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-eps-net-income">Yıllık Net Kar (TL)</label>
            <input type="number" id="hc-eps-net-income" placeholder="Net Income">
        </div>

        <div class="hc-form-group">
            <label for="hc-eps-shares">Toplam Hisse Adedi</label>
            <input type="number" id="hc-eps-shares" placeholder="Ödenmiş Sermaye">
        </div>
        
        <button class="hc-btn" onclick="hcEPSHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-eps-result">
            <div class="hc-result-value" id="hc-eps-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Hisse Başına Kar (EPS)</p>
        </div>
    </div>
    <?php
}
