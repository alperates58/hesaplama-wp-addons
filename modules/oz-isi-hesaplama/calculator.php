<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_oz_isi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-oz-isi',
        HC_PLUGIN_URL . 'modules/oz-isi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-oz-isi">
        <h3>Öz Isı (c) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-oi-heat">Aktarılan Isı (Q - Joule)</label>
            <input type="number" id="hc-oi-heat" placeholder="J" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-oi-mass">Kütle (m - kg)</label>
            <input type="number" id="hc-oi-mass" placeholder="kg" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-oi-temp">Sıcaklık Değişimi (ΔT - °C veya K)</label>
            <input type="number" id="hc-oi-temp" placeholder="ΔT" step="any">
        </div>

        <button class="hc-btn" onclick="hcOzIsiHesapla()">Öz Isıyı Hesapla</button>

        <div class="hc-result" id="hc-oi-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Öz Isı (c):</span>
                <span class="hc-result-value" id="hc-oi-res-total">--</span>
                <span class="hc-result-unit">J/kg·°C</span>
            </div>
        </div>
    </div>
    <?php
}
