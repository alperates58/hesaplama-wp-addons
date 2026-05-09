<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kesir_yuzde_hesaplayici( $atts ) {
    wp_enqueue_script(
        'hc-kesir-yuzde-hesaplayici',
        HC_PLUGIN_URL . 'modules/kesir-yuzde-hesaplayici/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kesir-yuzde-hesaplayici-css',
        HC_PLUGIN_URL . 'modules/kesir-yuzde-hesaplayici/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kesir-yuzde-hesaplayici">
        <div class="hc-header">
            <h3>Kesir ➔ Yüzde Dönüştürücü</h3>
            <p>Pay ve paydayı girerek yüzde değerini bulun.</p>
        </div>
        
        <div class="hc-fraction-ui">
            <div class="hc-form-group">
                <input type="number" id="hc-num-val" placeholder="Pay" step="any">
            </div>
            <div class="hc-divider"></div>
            <div class="hc-form-group">
                <input type="number" id="hc-den-val" placeholder="Payda" step="any">
            </div>
        </div>

        <button class="hc-btn" onclick="hcKesirHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-kesir-result">
            <div class="hc-res-box">
                <div class="hc-res-label">SONUÇ</div>
                <div class="hc-res-main">
                    %<span id="hc-res-kesir-val">0</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
