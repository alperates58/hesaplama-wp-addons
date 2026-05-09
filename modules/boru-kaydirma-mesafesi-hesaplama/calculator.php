<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_boru_kaydirma_mesapasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-boru-kaydirma-mesafesi-hesaplama',
        HC_PLUGIN_URL . 'modules/boru-kaydirma-mesafesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-boru-kaydirma-mesafesi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/boru-kaydirma-mesafesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-boru-kaydirma-mesafesi-hesaplama">
        <h3>Boru Kaydırma (Ofset) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bk-offset">Ofset Mesafesi (cm)</label>
            <input type="number" id="hc-bk-offset" placeholder="Örn: 50" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bk-angle">Dirsek Açısı (°)</label>
            <select id="hc-bk-angle">
                <option value="45">45°</option>
                <option value="22.5">22.5°</option>
                <option value="60">60°</option>
                <option value="30">30°</option>
                <option value="11.25">11.25°</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBKHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bk-result">
            <div class="hc-bk-grid">
                <div class="hc-bk-item">
                    <span class="hc-result-label">Seyahat (Travel):</span>
                    <span class="hc-result-value" id="hc-bk-travel">-</span>
                </div>
                <div class="hc-bk-item">
                    <span class="hc-result-label">Yatay (Run):</span>
                    <span class="hc-result-value" id="hc-bk-run">-</span>
                </div>
            </div>
            <div class="hc-result-note">Seyahat, iki dirsek arasındaki borunun net boyudur.</div>
        </div>
    </div>
    <?php
}
