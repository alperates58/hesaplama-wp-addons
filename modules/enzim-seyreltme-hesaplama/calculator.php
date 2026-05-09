<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_enzim_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-enzim-seyreltme-hesaplama',
        HC_PLUGIN_URL . 'modules/enzim-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-enzim-seyreltme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/enzim-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-enzim-seyreltme-hesaplama">
        <h3>Enzim Seyreltme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-enz-c1">Stok Aktivitesi (U/mL)</label>
            <input type="number" id="hc-enz-c1" placeholder="Örn: 100" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-enz-c2">Hedef Aktivite (U/mL)</label>
            <input type="number" id="hc-enz-c2" placeholder="Örn: 1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-enz-v2">Hedef Toplam Hacim (µL)</label>
            <input type="number" id="hc-enz-v2" placeholder="Örn: 1000" step="any">
        </div>
        <button class="hc-btn" onclick="hcEnzimSeyreltmeHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-enz-dil-result">
            <div class="hc-enz-grid">
                <div class="hc-enz-item">
                    <span class="hc-result-label">Gereken Enzim:</span>
                    <span class="hc-result-value" id="hc-enz-v1">-</span>
                </div>
                <div class="hc-enz-item">
                    <span class="hc-result-label">Gereken Tampon:</span>
                    <span class="hc-result-value" id="hc-enz-buffer">-</span>
                </div>
            </div>
        </div>
    </div>
    <?php
}
