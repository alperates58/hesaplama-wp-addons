<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hayvan_ilac_dozu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hayvan-ilac-dozu-hesaplama',
        HC_PLUGIN_URL . 'modules/hayvan-ilac-dozu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hayvan-ilac-dozu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hayvan-ilac-dozu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hayvan-ilac-dozu-hesaplama">
        <h3>Hayvan İlaç Dozu Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-dose-weight">Hayvan Ağırlığı (kg)</label>
            <input type="number" id="hc-dose-weight" placeholder="Örn: 25" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dose-rate">Önerilen Doz (mg/kg)</label>
            <input type="number" id="hc-dose-rate" placeholder="Örn: 10" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dose-conc">İlaç Konsantrasyonu (mg/mL)</label>
            <input type="number" id="hc-dose-conc" placeholder="Örn: 50" step="any">
        </div>
        <button class="hc-btn" onclick="hcHayvanDozHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dose-result">
            <div class="hc-result-label">Uygulanacak Miktar:</div>
            <div class="hc-result-value" id="hc-dose-val">-</div>
            <div class="hc-result-note" id="hc-dose-note"></div>
        </div>
    </div>
    <?php
}
