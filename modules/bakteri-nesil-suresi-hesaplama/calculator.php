<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bakteri_nesil_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bakteri-nesil-suresi-hesaplama',
        HC_PLUGIN_URL . 'modules/bakteri-nesil-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bakteri-nesil-suresi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bakteri-nesil-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bakteri-nesil-suresi-hesaplama">
        <h3>Bakteri Nesil Süresi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-gen-n0">Başlangıç Sayısı (N₀)</label>
            <input type="number" id="hc-gen-n0" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-gen-nt">Son Sayı (Nₜ)</label>
            <input type="number" id="hc-gen-nt" placeholder="Örn: 6400" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-gen-time">Geçen Süre (dakika)</label>
            <input type="number" id="hc-gen-time" placeholder="Örn: 120" step="any">
        </div>
        <button class="hc-btn" onclick="hcBakteriNesilHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-gen-result">
            <div class="hc-gen-grid">
                <div class="hc-gen-item">
                    <span class="hc-result-label">Nesil Sayısı (n):</span>
                    <span class="hc-result-value" id="hc-gen-n-val">-</span>
                </div>
                <div class="hc-gen-item">
                    <span class="hc-result-label">Nesil Süresi (g):</span>
                    <span class="hc-result-value" id="hc-gen-g-val">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
