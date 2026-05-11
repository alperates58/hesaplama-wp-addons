<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_reaktor_hacmi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-reaktor',
        HC_PLUGIN_URL . 'modules/reaktor-hacmi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-reaktor">
        <h3>Reaktör Hacmi (CSTR) Hesaplama</h3>
        <p class="hc-desc">1. Derece reaksiyon modeli temel alınmıştır.</p>
        
        <div class="hc-form-group">
            <label for="hc-rh-flow">Hacimsel Debi (Q - m³/saat)</label>
            <input type="number" id="hc-rh-flow" placeholder="m³/saat" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-rh-cin">Giriş Konsantrasyonu (C<sub>in</sub> - mol/m³)</label>
            <input type="number" id="hc-rh-cin" placeholder="Cin" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-rh-cout">Çıkış Konsantrasyonu (C<sub>out</sub> - mol/m³)</label>
            <input type="number" id="hc-rh-cout" placeholder="Cout" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-rh-k">Hız Sabiti (k - 1/saat)</label>
            <input type="number" id="hc-rh-k" placeholder="k" step="any">
        </div>

        <button class="hc-btn" onclick="hcReaktorHesapla()">Hacmi Hesapla</button>

        <div class="hc-result" id="hc-rh-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Gerekli Reaktör Hacmi (V):</span>
                <span class="hc-result-value" id="hc-rh-res-total">--</span>
                <span class="hc-result-unit">m³</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Alıkonma Süresi (τ):</span>
                <span id="hc-rh-res-tau">--</span>
                <span class="hc-result-unit">saat</span>
            </div>
        </div>
    </div>
    <?php
}
