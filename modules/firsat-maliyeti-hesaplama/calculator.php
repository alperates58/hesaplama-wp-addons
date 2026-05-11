<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_firsat_maliyeti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-firsat-maliyeti-hesaplama',
        HC_PLUGIN_URL . 'modules/firsat-maliyeti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-firsat-maliyeti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/firsat-maliyeti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-firsat-maliyeti">
        <h3>Fırsat Maliyeti Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-fm-chosen">Seçilen Seçeneğin Getirisi (₺)</label>
            <input type="number" id="hc-fm-chosen" placeholder="Örn: 15.000">
        </div>
        <div class="hc-form-group">
            <label for="hc-fm-foregone">Vazgeçilen En İyi Alternatifin Getirisi (₺)</label>
            <input type="number" id="hc-fm-foregone" placeholder="Örn: 20.000">
        </div>
        <button class="hc-btn" onclick="hcFirsatMaliyetiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fm-result">
            <div class="hc-result-item">
                <span>Fırsat Maliyeti:</span>
                <strong class="hc-result-value" id="hc-fm-value">-</strong>
            </div>
            <p class="hc-small-text">Fırsat maliyeti pozitifse, vazgeçilen seçenek daha karlıydı demektir.</p>
        </div>
    </div>
    <?php
}
