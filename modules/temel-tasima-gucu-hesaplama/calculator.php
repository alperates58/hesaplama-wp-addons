<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_temel_tasima_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-footing-bearing',
        HC_PLUGIN_URL . 'modules/temel-tasima-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-footing-bearing-css',
        HC_PLUGIN_URL . 'modules/temel-tasima-gucu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-footing-bearing">
        <h3>Temel Taşıma Gücü (Terzaghi)</h3>
        <div class="hc-form-group">
            <label for="hc-fb-c">Kohezyon (c) [kPa]</label>
            <input type="number" id="hc-fb-c" value="20">
        </div>
        <div class="hc-form-group">
            <label for="hc-fb-phi">İçsel Sürtünme Açısı (φ) [Derece]</label>
            <input type="number" id="hc-fb-phi" value="30">
        </div>
        <div class="hc-form-group">
            <label for="hc-fb-gamma">Birim Hacim Ağırlık (γ) [kN/m³]</label>
            <input type="number" id="hc-fb-gamma" value="18">
        </div>
        <div class="hc-form-group">
            <label for="hc-fb-b">Temel Genişliği (B) [m]</label>
            <input type="number" id="hc-fb-b" value="2">
        </div>
        <div class="hc-form-group">
            <label for="hc-fb-df">Temel Derinliği (Df) [m]</label>
            <input type="number" id="hc-fb-df" value="1.5">
        </div>
        <button class="hc-btn" onclick="hcFootingBearingHesapla()">Taşıma Gücünü Hesapla</button>
        <div class="hc-result" id="hc-footing-bearing-result">
            <div class="hc-result-item">
                <span>Nihai Taşıma Gücü (qult):</span>
                <span class="hc-result-value" id="hc-res-fb-val">0 kPa</span>
            </div>
            <p class="hc-fb-note">Not: Genel kayma kırılması varsayılmıştır.</p>
        </div>
    </div>
    <?php
}
