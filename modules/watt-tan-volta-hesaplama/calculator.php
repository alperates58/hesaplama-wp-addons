<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_watt_tan_volta_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-watt-tan-volta-hesaplama',
        HC_PLUGIN_URL . 'modules/watt-tan-volta-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-watt-tan-volta-hesaplama-css',
        HC_PLUGIN_URL . 'modules/watt-tan-volta-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-watt-tan-volta-hesaplama">
        <div class="hc-cal-header">
            <h3>Watt'tan Volt'a Hesaplama</h3>
            <p>Bir elektrik devresinin gücünü (Watt) ve devreden geçen akımı (Amper) kullanarak sistem gerilimini (Volt) hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-wtv2-power">Güç (P - Watt - W)</label>
            <input type="number" id="hc-wtv2-power" class="hc-input" placeholder="örn. 2400" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-wtv2-current">Akım (I - Amper - A)</label>
            <input type="number" id="hc-wtv2-current" class="hc-input" placeholder="örn. 10" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-wtv2-type">Akım ve Devre Türü</label>
            <select id="hc-wtv2-type" class="hc-select" onchange="hcWattTanVoltaTipiDegisti()">
                <option value="dc">Doğru Akım (DC)</option>
                <option value="ac1">Alternatif Akım - Tek Faz (AC 1 Faz)</option>
                <option value="ac3">Alternatif Akım - Üç Faz (AC 3 Faz)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-wtv2-pf-group" style="display:none;">
            <label for="hc-wtv2-pf">Güç Faktörü (cosφ)</label>
            <input type="number" id="hc-wtv2-pf" class="hc-input" value="0.8" step="any" min="0.1" max="1.0">
        </div>

        <button class="hc-btn" onclick="hcWattTanVoltaHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-watt-tan-volta-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Voltaj Sonucu</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Gerilim (Volt - V):</span>
                <span class="hc-result-value" id="hc-wtv2-res-volt">-</span>
            </div>
            <div class="hc-result-desc" id="hc-wtv2-desc"></div>
        </div>
    </div>
    <?php
}
