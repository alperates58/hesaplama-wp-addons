<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_watt_ampere_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-watt-ampere-hesaplama',
        HC_PLUGIN_URL . 'modules/watt-ampere-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-watt-ampere-hesaplama-css',
        HC_PLUGIN_URL . 'modules/watt-ampere-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-watt-ampere-hesaplama">
        <div class="hc-cal-header">
            <h3>Watt Ampere Hesaplama</h3>
            <p>Elektriksel güç değerini (Watt), şebeke voltajı ve güç faktörünü kullanarak elektrik akımına (Amper) dönüştürür.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-wta-power">Güç (P - Watt - W)</label>
            <input type="number" id="hc-wta-power" class="hc-input" placeholder="örn. 2200" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-wta-type">Akım Türü / Devre Tipi</label>
            <select id="hc-wta-type" class="hc-select" onchange="hcWattAmpereTipiDegisti()">
                <option value="dc">Doğru Akım (DC)</option>
                <option value="ac1">Alternatif Akım - Tek Faz (AC 1 Faz - 220V)</option>
                <option value="ac3">Alternatif Akım - Üç Faz (AC 3 Faz - 380V)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-wta-voltage">Voltaj (V - Volt)</label>
            <input type="number" id="hc-wta-voltage" class="hc-input" value="12" step="any" min="1">
        </div>

        <div class="hc-form-group" id="hc-wta-pf-group" style="display:none;">
            <label for="hc-wta-pf">Güç Faktörü (Power Factor - cosφ)</label>
            <input type="number" id="hc-wta-pf" class="hc-input" value="0.8" step="any" min="0.1" max="1.0">
            <span style="font-size: 11px; color: #777;">Rezistif yükler (ısıtıcı vb.): 1.0, İndüktif yükler (motor vb.): 0.8</span>
        </div>

        <button class="hc-btn" onclick="hcWattAmpereHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-watt-ampere-hesaplama-result">
            <div class="hc-result-title">Elektriksel Akım Sonucu</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Elektrik Akımı (I):</span>
                <span class="hc-result-value" id="hc-wta-res-amp">-</span>
            </div>
            <div class="hc-result-desc" id="hc-wta-desc"></div>
        </div>
    </div>
    <?php
}
