<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alcipan_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alcipan-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/alcipan-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alcipan-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/alcipan-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alcipan-miktari-hesaplama">
        <h3>Alçıpan ve Malzeme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-alc-area">Uygulama Alanı (m²)</label>
            <input type="number" id="hc-alc-area" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-alc-waste">Fire Payı (%)</label>
            <input type="number" id="hc-alc-waste" placeholder="Örn: 5" value="5">
        </div>
        <button class="hc-btn" onclick="hcALCHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-alc-result">
            <div class="hc-alc-grid">
                <div class="hc-alc-item">
                    <span class="hc-result-label">Plaka Sayısı:</span>
                    <span class="hc-result-value" id="hc-alc-boards">-</span>
                </div>
                <div class="hc-alc-item">
                    <span class="hc-result-label">Profil (m):</span>
                    <span class="hc-result-value" id="hc-alc-profiles">-</span>
                </div>
            </div>
            <div class="hc-result-note">Standart 1.2 x 2.5 m (3 m²) plaka boyutları baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
