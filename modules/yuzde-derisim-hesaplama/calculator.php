<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzde_derisim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yuzde-derisim-hesaplama',
        HC_PLUGIN_URL . 'modules/yuzde-derisim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yuzde-derisim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yuzde-derisim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-perc-conc">
        <h3>Yüzde Derişim Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-pc-solute">Çözünen Miktarı (g veya mL)</label>
            <input type="number" id="hc-pc-solute" placeholder="Örn: 20">
        </div>
        <div class="hc-form-group">
            <label for="hc-pc-solvent">Çözücü Miktarı (g veya mL)</label>
            <input type="number" id="hc-pc-solvent" placeholder="Örn: 80">
        </div>
        <button class="hc-btn" onclick="hcYüzdeDerişimHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pc-result">
            <div class="hc-result-label">Yüzde Derişim:</div>
            <div class="hc-result-value" id="hc-pc-val">-</div>
        </div>
    </div>
    <?php
}
