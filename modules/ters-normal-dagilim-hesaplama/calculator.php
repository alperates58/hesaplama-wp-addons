<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ters_normal_dagilim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-inv-norm',
        HC_PLUGIN_URL . 'modules/ters-normal-dagilim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-inv-norm-css',
        HC_PLUGIN_URL . 'modules/ters-normal-dagilim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-inv-norm">
        <h3>Ters Normal Dağılım</h3>
        <div class="hc-form-group">
            <label for="hc-in-prob">Kümülatif Olasılık (P) [0-1]</label>
            <input type="number" id="hc-in-prob" value="0.95" step="0.01" min="0" max="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-in-mean">Ortalama (μ)</label>
            <input type="number" id="hc-in-mean" value="0">
        </div>
        <div class="hc-form-group">
            <label for="hc-in-std">Standart Sapma (σ)</label>
            <input type="number" id="hc-in-std" value="1">
        </div>
        <button class="hc-btn" onclick="hcInvNormHesapla()">X Değerini Bul</button>
        <div class="hc-result" id="hc-inv-norm-result">
            <div class="hc-result-item">
                <span>Eşik Değeri (x):</span>
                <span class="hc-result-value" id="hc-res-in-val">0</span>
            </div>
            <p class="hc-in-note">Verilen olasılık için alt tarafta kalan kritik değeri hesaplar.</p>
        </div>
    </div>
    <?php
}
