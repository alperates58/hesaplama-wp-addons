<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_notrofil_lenfosit_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-notrofil-lenfosit-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/notrofil-lenfosit-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-notrofil-lenfosit-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/notrofil-lenfosit-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nlr">
        <h3>Nötrofil / Lenfosit Oranı (NLR)</h3>
        <div class="hc-form-group">
            <label for="hc-nl-neu">Mutlak Nötrofil Sayısı</label>
            <input type="number" id="hc-nl-neu" placeholder="4500">
        </div>
        <div class="hc-form-group">
            <label for="hc-nl-lym">Mutlak Lenfosit Sayısı</label>
            <input type="number" id="hc-nl-lym" placeholder="1500">
        </div>
        <button class="hc-btn" onclick="hcNötrofilLenfositOranıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-nl-result">
            <div class="hc-result-label">Oran:</div>
            <div class="hc-result-value" id="hc-nl-val">-</div>
            <p id="hc-nl-desc" style="margin-top:10px; font-size:0.9em;"></p>
        </div>
    </div>
    <?php
}
