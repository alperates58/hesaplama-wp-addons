<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cig_pirincten_pismis_pirince_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rice-cooked',
        HC_PLUGIN_URL . 'modules/cig-pirincten-pismis-pirince-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rice-cooked-css',
        HC_PLUGIN_URL . 'modules/cig-pirincten-pismis-pirince-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rice-cooked">
        <h3>Pirinç Pişme Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-rc-raw">Çiğ Pirinç (gr)</label>
            <input type="number" id="hc-rc-raw" value="200" step="50" min="50">
        </div>
        <button class="hc-btn" onclick="hcRiceCookedHesapla()">Pişmiş Miktarı Gör</button>
        <div class="hc-result" id="hc-rice-cooked-result">
            <div class="hc-result-item">
                <span>Pişmiş Ağırlık:</span>
                <span class="hc-result-value" id="hc-res-rc-cooked">0 gr</span>
            </div>
            <p class="hc-rc-note">Pirinç piştiğinde yaklaşık 3 katı ağırlığa ulaşır.</p>
        </div>
    </div>
    <?php
}
