<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_denge_sabiti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-denge',
        HC_PLUGIN_URL . 'modules/denge-sabiti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-denge-css',
        HC_PLUGIN_URL . 'modules/denge-sabiti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-denge">
        <h3>Denge Sabiti (Kc) Hesaplama</h3>
        <p style="font-size:0.9em; opacity:0.8;">aA + bB ⇌ cC + dD tepkimesi için:</p>
        <div class="hc-form-group">
            <label>Girenler (A ve B)</label>
            <div style="display:flex; gap:10px; margin-bottom:5px;">
                <input type="number" id="hc-ds-a" placeholder="[A]" step="any">
                <input type="number" id="hc-ds-aa" placeholder="katsayı a" value="1" step="any">
            </div>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-ds-b" placeholder="[B]" step="any">
                <input type="number" id="hc-ds-bb" placeholder="katsayı b" value="1" step="any">
            </div>
        </div>
        <div class="hc-form-group">
            <label>Ürünler (C ve D)</label>
            <div style="display:flex; gap:10px; margin-bottom:5px;">
                <input type="number" id="hc-ds-c" placeholder="[C]" step="any">
                <input type="number" id="hc-ds-cc" placeholder="katsayı c" value="1" step="any">
            </div>
            <div style="display:flex; gap:10px;">
                <input type="number" id="hc-ds-d" placeholder="[D]" step="any">
                <input type="number" id="hc-ds-dd" placeholder="katsayı d" value="1" step="any">
            </div>
        </div>
        <button class="hc-btn" onclick="hcDengeHesapla()">Kc Hesapla</button>
        <div class="hc-result" id="hc-ds-result">
            <div class="hc-result-label">Denge Sabiti (Kc):</div>
            <div class="hc-result-value" id="hc-ds-val">-</div>
            <div class="hc-result-note">Kc = ([C]ᶜ * [D]ᵈ) / ([A]ᵃ * [B]ᵇ)</div>
        </div>
    </div>
    <?php
}
