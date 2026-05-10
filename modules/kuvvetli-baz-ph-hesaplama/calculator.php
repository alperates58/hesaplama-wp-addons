<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kuvvetli_baz_ph_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kuvvetli-baz-ph-hesaplama',
        HC_PLUGIN_URL . 'modules/kuvvetli-baz-ph-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kuvvetli-baz-ph-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kuvvetli-baz-ph-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-strong-base">
        <h3>Kuvvetli Baz pH Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sb-conc">Baz Derişimi (Molar, mol/L)</label>
            <input type="number" id="hc-sb-conc" placeholder="Örn: 0.05" step="0.000001">
        </div>
        <div class="hc-form-group">
            <label for="hc-sb-valency">Tesir Değerliği (OH- Sayısı)</label>
            <input type="number" id="hc-sb-valency" value="1" min="1">
        </div>
        <button class="hc-btn" onclick="hcKuvvetliBazpHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sb-result">
            <div id="hc-sb-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
