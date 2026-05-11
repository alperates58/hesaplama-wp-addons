<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_isil_genlesme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-thermal-exp',
        HC_PLUGIN_URL . 'modules/isil-genlesme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-thermal-exp">
        <h3>Isıl Genleşme Hesaplama</h3>
        <p><small>ΔL = α × L₀ × ΔT</small></p>
        
        <div class="hc-form-group">
            <label>Malzeme Seçimi</label>
            <select id="hc-tx-mat">
                <option value="12e-6">Çelik (12x10⁻⁶)</option>
                <option value="23e-6">Alüminyum (23x10⁻⁶)</option>
                <option value="17e-6">Bakır (17x10⁻⁶)</option>
                <option value="9e-6">Beton (9x10⁻⁶)</option>
                <option value="custom">Özel...</option>
            </select>
        </div>
        
        <div class="hc-form-group" id="hc-tx-custom-group" style="display:none;">
            <label>Genleşme Katsayısı (α, 1/°C)</label>
            <input type="number" id="hc-tx-alpha" placeholder="Örn: 0.000012" step="0.000001">
        </div>
        
        <div class="hc-form-group">
            <label>Başlangıç Boyu (L₀, metre)</label>
            <input type="number" id="hc-tx-l0" placeholder="m" step="0.1">
        </div>
        
        <div class="hc-form-group">
            <label>Sıcaklık Değişimi (ΔT, °C)</label>
            <input type="number" id="hc-tx-dt" placeholder="°C" step="1">
        </div>
        
        <button class="hc-btn" onclick="hcThermalExpHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-tx-result">
            <span>Boydaki Değişim (ΔL):</span>
            <div class="hc-result-value" id="hc-tx-res-val">0 mm</div>
        </div>
    </div>
    <script>
        document.getElementById('hc-tx-mat').addEventListener('change', function() {
            document.getElementById('hc-tx-custom-group').style.display = (this.value === 'custom' ? 'block' : 'none');
        });
    </script>
    <?php
}
