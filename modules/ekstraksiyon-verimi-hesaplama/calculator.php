<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ekstraksiyon_verimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ext-yield',
        HC_PLUGIN_URL . 'modules/ekstraksiyon-verimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ext-yield">
        <h3>Ekstraksiyon Verimi Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Başlangıçtaki Toplam Madde (g)</label>
            <input type="number" id="hc-ey-total" placeholder="gram" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Elde Edilen Ekstre (g)</label>
            <input type="number" id="hc-ey-yield" placeholder="gram" step="0.1">
        </div>
        
        <button class="hc-btn" onclick="hcExtYieldHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-ey-result">
            <span>Ekstraksiyon Verimi:</span>
            <div class="hc-result-value" id="hc-ey-res-val">%0</div>
        </div>
    </div>
    <?php
}
