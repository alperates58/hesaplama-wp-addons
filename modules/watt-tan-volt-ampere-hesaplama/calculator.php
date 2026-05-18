<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_watt_tan_volt_ampere_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-watt-tan-volt-ampere-hesaplama',
        HC_PLUGIN_URL . 'modules/watt-tan-volt-ampere-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-watt-tan-volt-ampere-hesaplama-css',
        HC_PLUGIN_URL . 'modules/watt-tan-volt-ampere-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-watt-tan-volt-ampere-hesaplama">
        <div class="hc-cal-header">
            <h3>Watt'tan Volt-Amper'e (VA) Hesaplama</h3>
            <p>Elektriksel aktif gücü (Watt), devrenin güç faktörü (cosφ) değerine bölerek alternatif akım devrelerindeki toplam görünür gücü (Volt-Amper - VA) hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-wtv-power">Aktif Güç (P - Watt - W)</label>
            <input type="number" id="hc-wtv-power" class="hc-input" placeholder="örn. 500" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-wtv-pf">Güç Faktörü (Power Factor - cosφ)</label>
            <input type="number" id="hc-wtv-pf" class="hc-input" value="0.8" step="any" min="0.1" max="1.0">
        </div>

        <button class="hc-btn" onclick="hcWattTanVoltAmpereHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-watt-tan-volt-ampere-hesaplama-result">
            <div class="hc-result-title">Elektriksel Güç Sonucu</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Görünür Güç (VA):</span>
                <span class="hc-result-value" id="hc-wtv-res-va">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Görünür Güç (kVA):</span>
                <span class="hc-result-value" id="hc-wtv-res-kva">-</span>
            </div>
            <div class="hc-result-desc" id="hc-wtv-desc"></div>
        </div>
    </div>
    <?php
}
