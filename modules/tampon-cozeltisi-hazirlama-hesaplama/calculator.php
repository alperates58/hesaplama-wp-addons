<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tampon_cozeltisi_hazirlama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-buffer-prep',
        HC_PLUGIN_URL . 'modules/tampon-cozeltisi-hazirlama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-buffer-prep-css',
        HC_PLUGIN_URL . 'modules/tampon-cozeltisi-hazirlama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-buffer-prep">
        <h3>Tampon Çözelti Hazırlama</h3>
        <div class="hc-form-group">
            <label for="hc-bp-mw">Molekül Ağırlığı (g/mol):</label>
            <input type="number" id="hc-bp-mw" step="0.01" placeholder="121.14">
        </div>
        <div class="hc-form-group">
            <label for="hc-bp-molarity">Hedef Molarite (M):</label>
            <input type="number" id="hc-bp-molarity" step="0.001" placeholder="0.05">
        </div>
        <div class="hc-form-group">
            <label for="hc-bp-volume">Hedef Hacim (mL):</label>
            <input type="number" id="hc-bp-volume" step="1" placeholder="500">
        </div>
        <button class="hc-btn" onclick="hcBufferPrepHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-buffer-prep-result">
            <strong>Gereken Madde Miktarı:</strong>
            <div id="hc-bp-res-val" class="hc-result-value">-</div>
            <span>gram</span>
        </div>
    </div>
    <?php
}
