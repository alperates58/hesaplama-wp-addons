<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_filtre_kahve_olcusu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-filter-coffee',
        HC_PLUGIN_URL . 'modules/filtre-kahve-olcusu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-filter-coffee-css',
        HC_PLUGIN_URL . 'modules/filtre-kahve-olcusu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-filter-coffee">
        <h3>Filtre Kahve Ölçüsü</h3>
        <div class="hc-form-group">
            <label for="hc-fc-cups">Fincan Sayısı (200ml)</label>
            <input type="number" id="hc-fc-cups" value="2" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-fc-strength">Sertlik Oranı</label>
            <select id="hc-fc-strength">
                <option value="17">Hafif (1:17)</option>
                <option value="16" selected>Orta (1:16)</option>
                <option value="15">Sert (1:15)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcFilterCoffeeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-filter-coffee-result">
            <div class="hc-result-item"> <span>Gereken Kahve:</span> <b id="hc-res-fc-coffee">0 gr</b> </div>
            <div class="hc-result-item"> <span>Gereken Su:</span> <b id="hc-res-fc-water">0 ml</b> </div>
        </div>
    </div>
    <?php
}
