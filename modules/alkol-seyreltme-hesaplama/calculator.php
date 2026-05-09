<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_alkol_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-alkol-seyreltme',
        HC_PLUGIN_URL . 'modules/alkol-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-alkol-seyreltme-css',
        HC_PLUGIN_URL . 'modules/alkol-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alkol-seyreltme">
        <h3>Alkol Seyreltme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-as-v1">Mevcut Alkol Hacmi (ml)</label>
            <input type="number" id="hc-as-v1" placeholder="Örn: 1000" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-as-c1">Mevcut Alkol Derecesi (%)</label>
            <input type="number" id="hc-as-c1" placeholder="Örn: 96" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-as-c2">Hedef Alkol Derecesi (%)</label>
            <input type="number" id="hc-as-c2" placeholder="Örn: 70" step="any">
        </div>
        <button class="hc-btn" onclick="hcAlkolHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-as-result">
            <div class="hc-as-grid">
                <div class="hc-as-item">
                    <span class="hc-result-label">Eklenmesi Gereken Su:</span>
                    <span class="hc-result-value" id="hc-as-water">-</span>
                </div>
                <div class="hc-as-item">
                    <span class="hc-result-label">Toplam Son Hacim:</span>
                    <span class="hc-result-value" id="hc-as-total">-</span>
                </div>
            </div>
            <div class="hc-result-note">Not: Alkol ve su karışımında hacim kaybı (kontraksiyon) ihmal edilmiştir.</div>
        </div>
    </div>
    <?php
}
