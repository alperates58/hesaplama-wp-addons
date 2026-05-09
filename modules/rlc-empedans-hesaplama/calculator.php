<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rlc_empedans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rlc-imp',
        HC_PLUGIN_URL . 'modules/rlc-empedans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rlc-imp-css',
        HC_PLUGIN_URL . 'modules/rlc-empedans-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rlc-imp">
        <h3>Seri RLC Empedans Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-ri-f">Frekans (f) [Hz]</label>
            <input type="number" id="hc-ri-f" value="50">
        </div>
        <div class="hc-form-group">
            <label for="hc-ri-r">Direnç (R) [Ω]</label>
            <input type="number" id="hc-ri-r" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-ri-l">Endüktans (L) [mH]</label>
            <input type="number" id="hc-ri-l" value="100">
        </div>
        <div class="hc-form-group">
            <label for="hc-ri-c">Kapasitans (C) [μF]</label>
            <input type="number" id="hc-ri-c" value="47">
        </div>
        <button class="hc-btn" onclick="hcRlcImphesapla()">Empedansı Hesapla</button>
        <div class="hc-result" id="hc-rlc-imp-result">
            <div class="hc-result-item">
                <span>Empedans (Z):</span>
                <span class="hc-result-value" id="hc-res-ri-z">0 Ω</span>
            </div>
            <div class="hc-result-item">
                <span>Faz Açısı (φ):</span>
                <span id="hc-res-ri-phi">0°</span>
            </div>
        </div>
    </div>
    <?php
}
