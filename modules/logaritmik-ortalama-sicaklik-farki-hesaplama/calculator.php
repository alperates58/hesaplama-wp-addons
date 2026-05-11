<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_logaritmik_ortalama_sicaklik_farki_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lmtd-calc',
        HC_PLUGIN_URL . 'modules/logaritmik-ortalama-sicaklik-farki-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-lmtd-calc">
        <h3>LMTD (Sıcaklık Farkı) Hesaplama</h3>
        <p><small>LMTD = (ΔT₁ - ΔT₂) / ln(ΔT₁ / ΔT₂)</small></p>
        
        <div style="display: flex; gap: 10px;">
            <div style="flex:1;">
                <h4>Sıcak Akışkan</h4>
                <div class="hc-form-group">
                    <label>Giriş (Th-in, °C)</label>
                    <input type="number" id="hc-lm-thin" placeholder="°C" step="0.1">
                </div>
                <div class="hc-form-group">
                    <label>Çıkış (Th-out, °C)</label>
                    <input type="number" id="hc-lm-thout" placeholder="°C" step="0.1">
                </div>
            </div>
            <div style="flex:1;">
                <h4>Soğuk Akışkan</h4>
                <div class="hc-form-group">
                    <label>Giriş (Tc-in, °C)</label>
                    <input type="number" id="hc-lm-tcin" placeholder="°C" step="0.1">
                </div>
                <div class="hc-form-group">
                    <label>Çıkış (Tc-out, °C)</label>
                    <input type="number" id="hc-lm-tcout" placeholder="°C" step="0.1">
                </div>
            </div>
        </div>
        
        <div class="hc-form-group">
            <label>Akış Tipi</label>
            <select id="hc-lm-flow">
                <option value="counter">Ters Akış (Counter-flow)</option>
                <option value="parallel">Paralel Akış (Parallel-flow)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcLmtdHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-lm-result">
            <span>Logaritmik Ort. Sıcaklık Farkı (LMTD):</span>
            <div class="hc-result-value" id="hc-lm-res-val">0 K</div>
        </div>
    </div>
    <?php
}
