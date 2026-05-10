<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kuvvetli_asit_ph_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kuvvetli-asit-ph-hesaplama',
        HC_PLUGIN_URL . 'modules/kuvvetli-asit-ph-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kuvvetli-asit-ph-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kuvvetli-asit-ph-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-strong-acid">
        <h3>Kuvvetli Asit pH Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-sa-conc">Asit Derişimi (Molar, mol/L)</label>
            <input type="number" id="hc-sa-conc" placeholder="Örn: 0.01" step="0.000001">
        </div>
        <div class="hc-form-group">
            <label for="hc-sa-valency">Tesir Değerliği (H+ Sayısı)</label>
            <input type="number" id="hc-sa-valency" value="1" min="1">
        </div>
        <button class="hc-btn" onclick="hcKuvvetliAsitpHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-sa-result">
            <div id="hc-sa-stats" style="text-align:left; font-size:1.1em; line-height:1.8;"></div>
        </div>
    </div>
    <?php
}
