<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_youden_indeksi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-youden',
        HC_PLUGIN_URL . 'modules/youden-indeksi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-youden-css',
        HC_PLUGIN_URL . 'modules/youden-indeksi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-youden">
        <h3>Youden İndeksi (J)</h3>
        <div class="hc-form-group">
            <label for="hc-yi-sens">Duyarlılık (Sensitivity) [0-1]</label>
            <input type="number" id="hc-yi-sens" value="0.95" step="0.01" min="0" max="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-yi-spec">Özgüllük (Specificity) [0-1]</label>
            <input type="number" id="hc-yi-spec" value="0.90" step="0.01" min="0" max="1">
        </div>
        <button class="hc-btn" onclick="hcYoudenHesapla()">İndeksi Hesapla</button>
        <div class="hc-result" id="hc-youden-result">
            <div class="hc-result-item">
                <span>Youden İndeksi (J):</span>
                <span class="hc-result-value" id="hc-res-yi-val">0</span>
            </div>
            <p class="hc-yi-note">Formül: Duyarlılık + Özgüllük - 1. Değer 1'e ne kadar yakınsa test o kadar mükemmeldir.</p>
        </div>
    </div>
    <?php
}
