<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bileske_kuvvet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-bileske-kuvvet-hesaplama',
        HC_PLUGIN_URL . 'modules/bileske-kuvvet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bileske-kuvvet-hesaplama-css',
        HC_PLUGIN_URL . 'modules/bileske-kuvvet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bileske-kuvvet-hesaplama">
        <h3>Bileşke Kuvvet Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bk-f1">Birinci Kuvvet (F₁ - N)</label>
            <input type="number" id="hc-bk-f1" placeholder="Örn: 10" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bk-f2">İkinci Kuvvet (F₂ - N)</label>
            <input type="number" id="hc-bk-f2" placeholder="Örn: 15" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-bk-angle">Aralarındaki Açı (θ - Derece)</label>
            <input type="number" id="hc-bk-angle" placeholder="Örn: 60" value="0" step="any">
        </div>
        <button class="hc-btn" onclick="hcBKHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bk-result">
            <div class="hc-result-label">Bileşke Kuvvet (R):</div>
            <div class="hc-result-value" id="hc-bk-val">-</div>
            <div class="hc-result-note">R = √(F₁² + F₂² + 2F₁F₂cosθ)</div>
        </div>
    </div>
    <?php
}
