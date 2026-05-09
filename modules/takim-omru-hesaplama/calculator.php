<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_takim_omru_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tool-life',
        HC_PLUGIN_URL . 'modules/takim-omru-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tool-life-css',
        HC_PLUGIN_URL . 'modules/takim-omru-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tool-life">
        <h3>Taylor Takım Ömrü (T)</h3>
        <div class="hc-form-group">
            <label for="hc-tl-v">Kesme Hızı (V) [m/dk]</label>
            <input type="number" id="hc-tl-v" value="150">
        </div>
        <div class="hc-form-group">
            <label for="hc-tl-n">Taylor Üssü (n)</label>
            <input type="number" id="hc-tl-n" value="0.125" step="0.001">
            <small>HSS: 0.1, Karbür: 0.2</small>
        </div>
        <div class="hc-form-group">
            <label for="hc-tl-c">Sabit (C)</label>
            <input type="number" id="hc-tl-c" value="300">
        </div>
        <button class="hc-btn" onclick="hcToolLifeHesapla()">Ömrü Hesapla</button>
        <div class="hc-result" id="hc-tool-life-result">
            <div class="hc-result-item">
                <span>Tahmini Ömür (T):</span>
                <span class="hc-result-value" id="hc-res-tl-val">0 dakika</span>
            </div>
            <p class="hc-tl-note">V * T^n = C</p>
        </div>
    </div>
    <?php
}
