<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_birim_oran_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-birim-oran-hesaplama', HC_PLUGIN_URL . 'modules/birim-oran-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-birim-oran-hesaplama-css', HC_PLUGIN_URL . 'modules/birim-oran-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-birim-oran-hesaplama">
        <h3>Birim Oran Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bor-miktar1">Miktar 1</label>
            <input type="number" id="hc-bor-miktar1" placeholder="örn. 150" step="any" />
        </div>
        <div class="hc-form-group">
            <label for="hc-bor-birim1">Birim 1 (isteğe bağlı)</label>
            <input type="text" id="hc-bor-birim1" placeholder="örn. km" />
        </div>
        <div class="hc-form-group">
            <label for="hc-bor-miktar2">Miktar 2</label>
            <input type="number" id="hc-bor-miktar2" placeholder="örn. 3" step="any" />
        </div>
        <div class="hc-form-group">
            <label for="hc-bor-birim2">Birim 2 (isteğe bağlı)</label>
            <input type="text" id="hc-bor-birim2" placeholder="örn. saat" />
        </div>
        <button class="hc-btn" onclick="hcBirimOranHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-birim-oran-hesaplama-result"></div>
    </div>
    <?php
}
