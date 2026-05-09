<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gidada_sulfit_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sulfite-qty',
        HC_PLUGIN_URL . 'modules/gidada-sulfit-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sulfite-qty-css',
        HC_PLUGIN_URL . 'modules/gidada-sulfit-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sulfite-qty">
        <h3>Sülfit (SO2) Hesapla</h3>
        <div class="hc-form-group">
            <label for="hc-sq-total">Hacim / Ağırlık (Litre veya kg)</label>
            <input type="number" id="hc-sq-total" value="1" min="0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sq-amount">Eklenen Sülfit (mg)</label>
            <input type="number" id="hc-sq-amount" value="50">
        </div>
        <button class="hc-btn" onclick="hcSulfiteQtyHesapla()">Konsantrasyonu Gör</button>
        <div class="hc-result" id="hc-sulfite-qty-result">
            <div class="hc-result-item">
                <span>Konsantrasyon:</span>
                <span class="hc-result-value" id="hc-res-sq-conc">0 mg/L</span>
            </div>
            <p id="hc-sq-warning" class="hc-sq-note" style="display:none">DİKKAT: 10 mg/L üzerindeki değerler için "Sülfit içerir" uyarısı zorunludur.</p>
        </div>
    </div>
    <?php
}
