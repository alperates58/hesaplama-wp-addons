<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kelime_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kelime-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kelime-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kelime-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kelime-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-word-count">
        <h3>Kelime Sayısı Hesaplama</h3>
        <div class="hc-form-group">
            <textarea id="hc-wc-text" placeholder="Metninizi buraya yapıştırın..." rows="8" oninput="hcKelimeSayısıHesapla()"></textarea>
        </div>
        <div class="hc-result visible" id="hc-wc-result">
            <div class="hc-sp-grid" style="display:grid; grid-template-columns: 1fr 1fr; text-align:center;">
                <div>
                    <div class="hc-result-label">Kelime</div>
                    <div class="hc-result-value" id="hc-wc-val">0</div>
                </div>
                <div>
                    <div class="hc-result-label">Karakter (Boşluklu)</div>
                    <div class="hc-result-value" id="hc-wc-char">0</div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
