<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cozelti_seyreltme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cozelti-seyreltme',
        HC_PLUGIN_URL . 'modules/cozelti-seyreltme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cozelti-seyreltme-css',
        HC_PLUGIN_URL . 'modules/cozelti-seyreltme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cozelti-seyreltme">
        <h3>Çözelti Seyreltme Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-cs-c1">Stok Derişim (M₁, % veya mg/L)</label>
            <input type="number" id="hc-cs-c1" placeholder="Örn: 1.0" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cs-c2">Hedef Derişim (M₂, % veya mg/L)</label>
            <input type="number" id="hc-cs-c2" placeholder="Örn: 0.1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-cs-v2">Hedef Hacim (V₂ - ml)</label>
            <input type="number" id="hc-cs-v2" placeholder="Örn: 100" step="any">
        </div>
        <button class="hc-btn" onclick="hcCozeltiSeyreltHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-cs-result">
            <div class="hc-cs-grid">
                <div class="hc-cs-item">
                    <span class="hc-result-label">Alınması Gereken Stok (V₁):</span>
                    <span class="hc-result-value" id="hc-cs-v1">-</span>
                </div>
                <div class="hc-cs-item">
                    <span class="hc-result-label">Eklenmesi Gereken Çözücü:</span>
                    <span class="hc-result-value" id="hc-cs-solvent">-</span>
                </div>
            </div>
            <div class="hc-result-note">Formül: C₁ * V₁ = C₂ * V₂</div>
        </div>
    </div>
    <?php
}
