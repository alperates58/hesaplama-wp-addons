<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tank_karistirma_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tank-mixing',
        HC_PLUGIN_URL . 'modules/tank-karistirma-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tank-mixing-css',
        HC_PLUGIN_URL . 'modules/tank-karistirma-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tank-mixing">
        <h3>Tank Karıştırma Süresi</h3>
        <div class="hc-form-group">
            <label for="hc-tm-vol">Tank Hacmi [Litre]</label>
            <input type="number" id="hc-tm-vol" value="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-tm-flow">Karıştırma Debisi [L/dk]</label>
            <input type="number" id="hc-tm-flow" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-tm-turn">Devir Sayısı (Turnover)</label>
            <input type="number" id="hc-tm-turn" value="3">
            <small>Genelde 3-5 devir homojenlik sağlar.</small>
        </div>
        <button class="hc-btn" onclick="hcTankMixingHesapla()">Süreyi Hesapla</button>
        <div class="hc-result" id="hc-tank-mixing-result">
            <div class="hc-result-item">
                <span>Gereken Süre:</span>
                <span class="hc-result-value" id="hc-res-tm-val">0 dakika</span>
            </div>
        </div>
    </div>
    <?php
}
