<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_donma_noktasi_dusmesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-donma-noktasi',
        HC_PLUGIN_URL . 'modules/donma-noktasi-dusmesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-donma-noktasi-css',
        HC_PLUGIN_URL . 'modules/donma-noktasi-dusmesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-donma-noktasi">
        <h3>Donma Noktası Düşmesi (ΔTf)</h3>
        <div class="hc-form-group">
            <label for="hc-dn-i">van't Hoff Faktörü (i)</label>
            <input type="number" id="hc-dn-i" placeholder="Örn: 1 (Şeker), 2 (NaCl)" value="1" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dn-kf">Kriyoskopi Sabiti (Kf - °C/m)</label>
            <input type="number" id="hc-dn-kf" placeholder="Örn: 1.86 (Su)" value="1.86" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-dn-m">Molalite (m - mol/kg)</label>
            <input type="number" id="hc-dn-m" placeholder="Örn: 0.5" step="any">
        </div>
        <button class="hc-btn" onclick="hcDNDHesapla()">ΔTf Hesapla</button>
        <div class="hc-result" id="hc-dn-result">
            <div class="hc-result-label">Donma Noktası Düşüşü:</div>
            <div class="hc-result-value" id="hc-dn-val">-</div>
            <div class="hc-result-note">ΔTf = i * Kf * m</div>
        </div>
    </div>
    <?php
}
