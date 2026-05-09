<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karbonat_sertligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-carbonate-hardness',
        HC_PLUGIN_URL . 'modules/karbonat-sertligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-carbonate-hardness-css',
        HC_PLUGIN_URL . 'modules/karbonat-sertligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-carbonate-hardness">
        <h3>Karbonat Sertliği (KH) Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-kh-hco3">Bikarbonat Derişimi (mg/L HCO₃⁻)</label>
            <input type="number" id="hc-kh-hco3" placeholder="Örn: 150" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-kh-co3">Karbonat Derişimi (mg/L CO₃²⁻)</label>
            <input type="number" id="hc-kh-co3" placeholder="Örn: 10" value="0" step="any">
        </div>
        <button class="hc-btn" onclick="hcKHesapla()">Sertlik Hesapla</button>
        <div class="hc-result" id="hc-kh-result">
            <div class="hc-kh-grid">
                <div class="hc-kh-item"><span>mg/L CaCO₃:</span> <span id="hc-kh-val-mg">-</span></div>
                <div class="hc-kh-item"><span>Alman Derecesi (°dH):</span> <span id="hc-kh-val-dh">-</span></div>
            </div>
            <div class="hc-result-note">KH = (HCO₃⁻/61.02 + 2*CO₃²⁻/60.01) * 50.04</div>
        </div>
    </div>
    <?php
}
