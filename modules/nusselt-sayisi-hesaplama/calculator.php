<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nusselt_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nusselt',
        HC_PLUGIN_URL . 'modules/nusselt-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-nusselt">
        <h3>Nusselt Sayısı (Nu) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-nu-h">Konveksiyon Katsayısı (h - W/m²·K)</label>
            <input type="number" id="hc-nu-h" placeholder="W/m²·K" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-nu-l">Karakteristik Uzunluk (L - m)</label>
            <input type="number" id="hc-nu-l" placeholder="m" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-nu-k">Isıl İletkenlik (k - W/m·K)</label>
            <input type="number" id="hc-nu-k" placeholder="W/m·K" step="any">
        </div>

        <button class="hc-btn" onclick="hcNusseltHesapla()">Nu Hesapla</button>

        <div class="hc-result" id="hc-nu-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Nusselt Sayısı (Nu):</span>
                <span class="hc-result-value" id="hc-nu-res-total">--</span>
            </div>
        </div>
    </div>
    <?php
}
