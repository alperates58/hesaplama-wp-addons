<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_orman_karbon_depolama_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-orman-karbon-depolama-hesaplama',
        HC_PLUGIN_URL . 'modules/orman-karbon-depolama-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-orman-karbon-depolama-hesaplama-css',
        HC_PLUGIN_URL . 'modules/orman-karbon-depolama-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-forest-carbon">
        <h3>Orman Karbon Depolama</h3>
        <div class="hc-form-group">
            <label for="hc-fc-area">Orman Alanı (Hektar)</label>
            <input type="number" id="hc-fc-area" placeholder="Örn: 10">
        </div>
        <div class="hc-form-group">
            <label for="hc-fc-type">Orman Tipi</label>
            <select id="hc-fc-type">
                <option value="5">Genç Orman (5 Ton CO2/hektar/yıl)</option>
                <option value="12" selected>Yetişkin Karma Orman (12 Ton CO2/hektar/yıl)</option>
                <option value="25">Tropikal Orman (25 Ton CO2/hektar/yıl)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcOrmanKarbonDepolamaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fc-result">
            <div class="hc-result-label">Yıllık Karbon Emilimi:</div>
            <div class="hc-result-value" id="hc-fc-val">-</div>
        </div>
    </div>
    <?php
}
