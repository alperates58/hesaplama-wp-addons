<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_genotip_frekansi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-genotip-frekansi-hesaplama',
        HC_PLUGIN_URL . 'modules/genotip-frekansi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-genotip-frekansi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/genotip-frekansi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-genotip-frekansi-hesaplama">
        <h3>Genotip Frekansı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gf-aa">AA Birey Sayısı</label>
            <input type="number" id="hc-gf-aa" placeholder="Örn: 50" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-gf-hetero">Aa Birey Sayısı</label>
            <input type="number" id="hc-gf-hetero" placeholder="Örn: 100" min="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-gf-reces">aa Birey Sayısı</label>
            <input type="number" id="hc-gf-reces" placeholder="Örn: 50" min="0">
        </div>
        <button class="hc-btn" onclick="hcGenotipFrekansHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gf-result">
            <div class="hc-gf-grid">
                <div class="hc-gf-item">
                    <span class="hc-result-label">Freq(AA):</span>
                    <span class="hc-result-value" id="hc-gf-aa-val">-</span>
                </div>
                <div class="hc-gf-item">
                    <span class="hc-result-label">Freq(Aa):</span>
                    <span class="hc-result-value" id="hc-gf-hetero-val">-</span>
                </div>
                <div class="hc-gf-item">
                    <span class="hc-result-label">Freq(aa):</span>
                    <span class="hc-result-value" id="hc-gf-reces-val">-</span>
                </div>
            </div>
            <div class="hc-result-note" id="hc-gf-note"></div>
        </div>
    </div>
    <?php
}
