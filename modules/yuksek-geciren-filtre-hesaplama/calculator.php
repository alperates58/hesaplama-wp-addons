<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuksek_geciren_filtre_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hpf-calc',
        HC_PLUGIN_URL . 'modules/yuksek-geciren-filtre-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hpf-calc-css',
        HC_PLUGIN_URL . 'modules/yuksek-geciren-filtre-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hpf-calc">
        <h3>Yüksek Geçiren Filtre (HPF)</h3>
        <div class="hc-form-group">
            <label for="hc-hpf-r">Direnç (R) [Ohm Ω]</label>
            <input type="number" id="hc-hpf-r" value="10000" step="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-hpf-c">Kondansatör (C) [Farad F]</label>
            <input type="number" id="hc-hpf-c" value="0.0000001" step="1e-10" placeholder="Örn: 100nF = 1e-7">
        </div>
        <button class="hc-btn" onclick="hcHPFHesapla()">Kesim Frekansını Hesapla</button>
        <div class="hc-result" id="hc-hpf-calc-result">
            <div class="hc-result-item">
                <span>Kesim Frekansı (fc):</span>
                <span class="hc-result-value" id="hc-res-hpf-val">0 Hz</span>
            </div>
            <p class="hc-hpf-note">fc = 1 / (2 * π * R * C)</p>
        </div>
    </div>
    <?php
}
