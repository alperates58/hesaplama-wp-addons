<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_et_kureleme_tuz_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-meat-cure',
        HC_PLUGIN_URL . 'modules/et-kureleme-tuz-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-meat-cure-css',
        HC_PLUGIN_URL . 'modules/et-kureleme-tuz-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-meat-cure">
        <h3>Et Kürleme (Denge)</h3>
        <div class="hc-form-group">
            <label for="hc-mc-weight">Et Ağırlığı (gr)</label>
            <input type="number" id="hc-mc-weight" value="1000" min="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-mc-salt">Tuz Oranı (%)</label>
            <input type="number" id="hc-mc-salt" value="2.5" step="0.1" min="1" max="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-mc-nitrite">Nitritli Tuz (Cure #1) Kullanılsın mı?</label>
            <select id="hc-mc-nitrite">
                <option value="yes">Evet (%0.25)</option>
                <option value="no">Hayır</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMeatCureHesapla()">Miktarları Gör</button>
        <div class="hc-result" id="hc-meat-cure-result">
            <div class="hc-result-item"> <span>Deniz Tuzu:</span> <b id="hc-res-mc-salt">0 gr</b> </div>
            <div id="hc-mc-nit-res" class="hc-result-item" style="display:none"> <span>Cure #1:</span> <b id="hc-res-mc-nit">0 gr</b> </div>
            <p class="hc-mc-note">Kürleme işlemi için etin vakumlu poşette veya sızdırmaz kapta buzdolabında bekletilmesi gerekir.</p>
        </div>
    </div>
    <?php
}
