<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cati_makasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cati-makasi-hesaplama',
        HC_PLUGIN_URL . 'modules/cati-makasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cati-makasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/cati-makasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cati-makasi-hesaplama">
        <h3>Çatı Makası (Rafter) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cm-span">Çatı Açıklığı (m)</label>
            <input type="number" id="hc-cm-span" placeholder="Örn: 8" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cm-rise">Çatı Yüksekliği (m)</label>
            <input type="number" id="hc-cm-rise" placeholder="Örn: 2" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cm-overhang">Saçak Payı (cm)</label>
            <input type="number" id="hc-cm-overhang" placeholder="Örn: 30" value="30">
        </div>
        <button class="hc-btn" onclick="hcCMHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cm-result">
            <div class="hc-cm-grid">
                <div class="hc-cm-item">
                    <span class="hc-result-label">Mertek Boyu:</span>
                    <span class="hc-result-value" id="hc-cm-rafter">-</span>
                </div>
                <div class="hc-cm-item">
                    <span class="hc-result-label">Kesim Açısı:</span>
                    <span class="hc-result-value" id="hc-cm-angle">-</span>
                </div>
            </div>
            <div class="hc-result-note">Mertek boyuna saçak payı dahildir.</div>
        </div>
    </div>
    <?php
}
