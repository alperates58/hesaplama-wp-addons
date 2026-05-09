<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_deplasman_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-deplasman-hesaplama',
        HC_PLUGIN_URL . 'modules/deplasman-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-deplasman-hesaplama-css',
        HC_PLUGIN_URL . 'modules/deplasman-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-deplasman-hesaplama">
        <h3>Yer Değiştirme (Deplasman) Hesaplama</h3>
        <div class="hc-form-group">
            <label>Başlangıç Noktası (x₁, y₁)</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-dep-x1" placeholder="x₁" step="any">
                <input type="number" id="hc-dep-y1" placeholder="y₁" step="any">
            </div>
        </div>
        <div class="hc-form-group">
            <label>Bitiş Noktası (x₂, y₂)</label>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-dep-x2" placeholder="x₂" step="any">
                <input type="number" id="hc-dep-y2" placeholder="y₂" step="any">
            </div>
        </div>
        <button class="hc-btn" onclick="hcDEPHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dep-result">
            <div class="hc-result-label">Toplam Yer Değiştirme (Δr):</div>
            <div class="hc-result-value" id="hc-dep-val">-</div>
            <div class="hc-result-note">Δr = √((x₂-x₁)² + (y₂-y₁)²)</div>
        </div>
    </div>
    <?php
}
