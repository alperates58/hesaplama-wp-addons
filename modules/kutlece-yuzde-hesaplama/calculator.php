<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kutlece_yuzde_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kutlece-yuzde-hesaplama',
        HC_PLUGIN_URL . 'modules/kutlece-yuzde-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kutlece-yuzde-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kutlece-yuzde-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-mass-percent">
        <h3>Kütlece Yüzde Hesaplama (% w/w)</h3>
        <div class="hc-form-group">
            <label for="hc-mp-solute">Çözünen Kütlesi (g / kg)</label>
            <input type="number" id="hc-mp-solute" placeholder="Örn: 25">
        </div>
        <div class="hc-form-group">
            <label for="hc-mp-solvent">Çözücü Kütlesi (g / kg)</label>
            <input type="number" id="hc-mp-solvent" placeholder="Örn: 75">
        </div>
        <button class="hc-btn" onclick="hcKütleceYüzdeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-mp-result">
            <div class="hc-result-label">Kütlece Yüzde:</div>
            <div class="hc-result-value" id="hc-mp-val">-</div>
        </div>
    </div>
    <?php
}
