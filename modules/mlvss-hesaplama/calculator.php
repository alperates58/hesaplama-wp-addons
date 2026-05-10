<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mlvss_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mlvss-calc',
        HC_PLUGIN_URL . 'modules/mlvss-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mlvss-calc-css',
        HC_PLUGIN_URL . 'modules/mlvss-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mlvss-calc">
        <h3>MLVSS (Mixed Liquor Volatile Suspended Solids)</h3>
        <div class="hc-form-group">
            <label for="hc-mv-dry">Kurutulmuş Filtre Ağırlığı (mg):</label>
            <input type="number" id="hc-mv-dry" placeholder="1250">
        </div>
        <div class="hc-form-group">
            <label for="hc-mv-ash">Yakılmış (Kül Olmuş) Filtre Ağırlığı (mg):</label>
            <input type="number" id="hc-mv-ash" placeholder="1210">
        </div>
        <div class="hc-form-group">
            <label for="hc-mv-sample">Numune Hacmi (mL):</label>
            <input type="number" id="hc-mv-sample" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcMlvssHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mlvss-calc-result">
            <strong>MLVSS Konsantrasyonu:</strong>
            <div id="hc-mv-res-val" class="hc-result-value">-</div>
            <span>mg / L</span>
        </div>
    </div>
    <?php
}
