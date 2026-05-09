<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alkol_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alcohol-dilute',
        HC_PLUGIN_URL . 'modules/alkol-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alcohol-dilute-css',
        HC_PLUGIN_URL . 'modules/alkol-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alcohol-dilute">
        <h3>Alkol Seyreltme</h3>
        <div class="hc-form-group">
            <label for="hc-ad-current-deg">Mevcut Alkol Derecesi (%)</label>
            <input type="number" id="hc-ad-current-deg" value="96" min="1" max="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-ad-current-vol">Mevcut Hacim (Litre)</label>
            <input type="number" id="hc-ad-current-vol" value="1" step="0.1" min="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-ad-target-deg">Hedef Alkol Derecesi (%)</label>
            <input type="number" id="hc-ad-target-deg" value="40" min="1" max="99">
        </div>
        <button class="hc-btn" onclick="hcAlcoholDiluteHesapla()">Su Miktarını Hesapla</button>
        <div class="hc-result" id="hc-alcohol-dilute-result">
            <div class="hc-result-item">
                <span>Eklenmesi Gereken Su:</span>
                <span class="hc-result-value" id="hc-res-ad-water">0 Litre</span>
            </div>
            <div class="hc-result-item">
                <span>Toplam Yeni Hacim:</span>
                <span id="hc-res-ad-total">0 Litre</span>
            </div>
        </div>
    </div>
    <?php
}
