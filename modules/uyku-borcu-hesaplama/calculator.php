<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_uyku_borcu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-uyku-borcu',
        HC_PLUGIN_URL . 'modules/uyku-borcu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-uyku-borcu-css',
        HC_PLUGIN_URL . 'modules/uyku-borcu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-uyku-borcu">
        <h3>Uyku Borcu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ub-target">Hedeflenen Günlük Uyku (Saat):</label>
            <input type="number" id="hc-ub-target" value="8" step="0.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-ub-actual">Son 7 Günde Ortalama Uyku (Saat):</label>
            <input type="number" id="hc-ub-actual" placeholder="Örn: 6.5" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcUykuBorcuHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-uyku-borcu-result">
            <strong>Haftalık Toplam Uyku Borcu:</strong>
            <div id="hc-ub-res-val" class="hc-result-value">-</div>
            <p id="hc-ub-res-desc" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
