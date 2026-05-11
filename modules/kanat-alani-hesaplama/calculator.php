<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kanat_alani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wing-area',
        HC_PLUGIN_URL . 'modules/kanat-alani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-wing-area">
        <h3>Kanat Alanı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Hesaplama Yöntemi</label>
            <select id="hc-wa-mode" onchange="hcWaToggleMode()">
                <option value="geo">Geometrik (Açıklık × Veter)</option>
                <option value="aero">Aerodinamik (Kaldırma Kuvvetinden)</option>
            </select>
        </div>
        
        <!-- Geometric Mode -->
        <div id="hc-wa-geo-inputs">
            <div class="hc-form-group">
                <label>Kanat Açıklığı (b, metre)</label>
                <input type="number" id="hc-wa-b" placeholder="m" step="0.1">
            </div>
            <div class="hc-form-group">
                <label>Ortalama Veter (c, metre)</label>
                <input type="number" id="hc-wa-c" placeholder="m" step="0.01">
            </div>
        </div>
        
        <!-- Aerodynamic Mode -->
        <div id="hc-wa-aero-inputs" style="display:none;">
            <div class="hc-form-group">
                <label>Gereken Kaldırma Kuvveti (L, N)</label>
                <input type="number" id="hc-wa-l" placeholder="N" step="1">
            </div>
            <div class="hc-form-group">
                <label>Kaldırma Katsayısı (Cl)</label>
                <input type="number" id="hc-wa-cl" placeholder="Örn: 0.5" step="0.01">
            </div>
            <div class="hc-form-group">
                <label>Hız (V, m/s)</label>
                <input type="number" id="hc-wa-v" placeholder="m/s" step="0.1">
            </div>
        </div>
        
        <button class="hc-btn" onclick="hcWingAreaHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-wa-result">
            <span>Hesaplanan Kanat Alanı (S):</span>
            <div class="hc-result-value" id="hc-wa-res-val">0 m²</div>
        </div>
    </div>
    <?php
}
