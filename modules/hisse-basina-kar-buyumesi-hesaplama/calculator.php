<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hisse_basina_kar_buyumesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-eps-growth',
        HC_PLUGIN_URL . 'modules/hisse-basina-kar-buyumesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-eps-growth-css',
        HC_PLUGIN_URL . 'modules/hisse-basina-kar-buyumesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-eps-growth">
        <h3>Hisse Başına Kar (EPS) Büyümesi</h3>
        
        <div class="hc-form-group">
            <label for="hc-eg-current">Güncel EPS (TL)</label>
            <input type="number" id="hc-eg-current" step="0.01">
        </div>

        <div class="hc-form-group">
            <label for="hc-eg-previous">Önceki Dönem EPS (TL)</label>
            <input type="number" id="hc-eg-previous" step="0.01">
        </div>
        
        <button class="hc-btn" onclick="hcEPSGrowthHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-eps-growth-result">
            <div class="hc-result-value" id="hc-eg-res-val">
                -
            </div>
            <p style="text-align:center; font-size: 0.9em; color: #666;">Yıllık EPS Büyüme Oranı</p>
        </div>
    </div>
    <?php
}
