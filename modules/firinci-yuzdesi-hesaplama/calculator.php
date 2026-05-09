<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_firinci_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bakers-perc',
        HC_PLUGIN_URL . 'modules/firinci-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bakers-perc-css',
        HC_PLUGIN_URL . 'modules/firinci-yuzdesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bakers-perc">
        <h3>Fırıncı Yüzdesi (Baker's %)</h3>
        <div class="hc-form-group">
            <label for="hc-bp-flour">Toplam Un (gr)</label>
            <input type="number" id="hc-bp-flour" value="1000" min="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-bp-water">Su Oranı (%)</label>
            <input type="number" id="hc-bp-water" value="65" min="40">
        </div>
        <div class="hc-form-group">
            <label for="hc-bp-salt">Tuz Oranı (%)</label>
            <input type="number" id="hc-bp-salt" value="2" step="0.1" min="0">
        </div>
        <button class="hc-btn" onclick="hcBakersPercHesapla()">Gramajları Gör</button>
        <div class="hc-result" id="hc-bakers-perc-result">
            <div class="hc-result-item"> <span>Su:</span> <b id="hc-res-bp-water">0 gr</b> </div>
            <div class="hc-result-item"> <span>Tuz:</span> <b id="hc-res-bp-salt">0 gr</b> </div>
            <div class="hc-result-item"> <span>Toplam Hamur:</span> <b id="hc-res-bp-total">0 gr</b> </div>
        </div>
    </div>
    <?php
}
