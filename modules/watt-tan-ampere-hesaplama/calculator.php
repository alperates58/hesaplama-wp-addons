<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_watt_tan_ampere_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-watt-tan-ampere-hesaplama',
        HC_PLUGIN_URL . 'modules/watt-tan-ampere-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-watt-tan-ampere-hesaplama-css',
        HC_PLUGIN_URL . 'modules/watt-tan-ampere-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-watt-tan-ampere-hesaplama">
        <div class="hc-cal-header">
            <h3>Watt'tan Amper'e Hesaplama</h3>
            <p>Elektrik gücünü (Watt) devrenizin voltaj düzeyine göre elektrik akımına (Amper) çevirir.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-wta2-power">Güç (P - Watt - W)</label>
            <input type="number" id="hc-wta2-power" class="hc-input" placeholder="örn. 2200" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-wta2-type">Akım ve Faz Türü</label>
            <select id="hc-wta2-type" class="hc-select" onchange="hcWattTanAmpereTipiDegisti()">
                <option value="dc">Doğru Akım (DC)</option>
                <option value="ac1">Alternatif Akım - Tek Faz (AC 1 Faz - 220V)</option>
                <option value="ac3">Alternatif Akım - Üç Faz (AC 3 Faz - 380V)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-wta2-voltage">Voltaj (Volt - V)</label>
            <input type="number" id="hc-wta2-voltage" class="hc-input" value="12" step="any" min="1">
        </div>

        <div class="hc-form-group" id="hc-wta2-pf-group" style="display:none;">
            <label for="hc-wta2-pf">Güç Faktörü (cosφ)</label>
            <input type="number" id="hc-wta2-pf" class="hc-input" value="0.8" step="any" min="0.1" max="1.0">
        </div>

        <button class="hc-btn" onclick="hcWattTanAmpereHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-watt-tan-ampere-hesaplama-result">
            <div class="hc-result-title">Akım Şiddeti Sonucu</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Akım (Amper):</span>
                <span class="hc-result-value" id="hc-wta2-res-amp">-</span>
            </div>
            <div class="hc-result-desc" id="hc-wta2-desc"></div>
        </div>
    </div>
    <?php
}
