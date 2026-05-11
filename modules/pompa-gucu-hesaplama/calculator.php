<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pompa_gucu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pompa-guc',
        HC_PLUGIN_URL . 'modules/pompa-gucu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pompa-guc">
        <h3>Pompa Gücü Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pg-flow">Hacimsel Debi (Q - m³/saat)</label>
            <input type="number" id="hc-pg-flow" placeholder="m³/saat" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-pg-head">Toplam Basma Yüksekliği (H - metre)</label>
            <input type="number" id="hc-pg-head" placeholder="metre" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-pg-rho">Akışkan Yoğunluğu (ρ - kg/m³)</label>
            <input type="number" id="hc-pg-rho" placeholder="kg/m³" step="any" value="1000">
        </div>

        <div class="hc-form-group">
            <label for="hc-pg-eff">Pompa Verimi (η - 0 ile 1 arası)</label>
            <input type="number" id="hc-pg-eff" placeholder="0.75" step="0.01" value="0.75">
        </div>

        <button class="hc-btn" onclick="hcPompaGucHesapla()">Gücü Hesapla</button>

        <div class="hc-result" id="hc-pg-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Gerekli Mil Gücü (P):</span>
                <span class="hc-result-value" id="hc-pg-res-total">--</span>
                <span class="hc-result-unit">kW</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Beygir Gücü:</span>
                <span id="hc-pg-res-hp">--</span>
                <span class="hc-result-unit">HP</span>
            </div>
        </div>
    </div>
    <?php
}
