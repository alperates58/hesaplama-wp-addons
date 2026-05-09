<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kok_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kok-hesaplama',
        HC_PLUGIN_URL . 'modules/kok-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kok-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kok-hesaplama/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kok-hesaplama">
        <div class="hc-header">
            <h3>Kök Hesaplama</h3>
            <p>Karekök, küp kök veya istediğiniz dereceden kök değerini bulun.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Sayı (x)</label>
                <input type="number" id="hc-root-val" placeholder="Örn: 144" step="any">
            </div>
            <div class="hc-form-group">
                <label>Kök Derecesi (n)</label>
                <input type="number" id="hc-root-deg" placeholder="Örn: 2" value="2" step="1">
            </div>
        </div>

        <button class="hc-btn" onclick="hcKokHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-root-result">
            <div class="hc-res-label">SONUÇ</div>
            <div class="hc-res-main">
                <span id="hc-res-root-val">-</span>
            </div>
            <div class="hc-res-formula" id="hc-res-root-desc"></div>
        </div>
    </div>
    <?php
}
