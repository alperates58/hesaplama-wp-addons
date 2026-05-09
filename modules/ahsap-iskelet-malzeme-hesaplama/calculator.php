<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ahsap_iskelet_malzeme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ahsap-iskelet-malzeme-hesaplama',
        HC_PLUGIN_URL . 'modules/ahsap-iskelet-malzeme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ahsap-iskelet-malzeme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ahsap-iskelet-malzeme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ahsap-iskelet-malzeme-hesaplama">
        <h3>Ahşap İskelet (Karkas) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-aim-length">Duvar Uzunluğu (m)</label>
            <input type="number" id="hc-aim-length" placeholder="Örn: 5" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-aim-spacing">Dikme Aralığı (cm)</label>
            <input type="number" id="hc-aim-spacing" placeholder="Örn: 40 veya 60" value="40">
        </div>
        <div class="hc-form-group">
            <label for="hc-aim-corners">Köşe Sayısı</label>
            <input type="number" id="hc-aim-corners" placeholder="Örn: 2" value="2">
        </div>
        <button class="hc-btn" onclick="hcAIMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-aim-result">
            <div class="hc-aim-grid">
                <div class="hc-aim-item">
                    <span class="hc-result-label">Dikme Sayısı:</span>
                    <span class="hc-result-value" id="hc-aim-studs">-</span>
                </div>
                <div class="hc-aim-item">
                    <span class="hc-result-label">Plaka Metrajı:</span>
                    <span class="hc-result-value" id="hc-aim-plates">-</span>
                </div>
            </div>
            <div class="hc-result-note">Plaka metrajı 1 alt + 2 üst plaka üzerinden hesaplanmıştır.</div>
        </div>
    </div>
    <?php
}
