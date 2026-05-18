<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_watt_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-watt-hesaplama',
        HC_PLUGIN_URL . 'modules/watt-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-watt-hesaplama-css',
        HC_PLUGIN_URL . 'modules/watt-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-watt-hesaplama">
        <div class="hc-cal-header">
            <h3>Watt (Elektriksel Güç) Hesaplama</h3>
            <p>Joule ve Ohm Kanunları çerçevesinde; voltaj, elektrik akımı veya direnç parametrelerinden bilinen iki tanesini kullanarak sistem gücünü (Watt) hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-wth-mode">Giriş Parametreleri</label>
            <select id="hc-wth-mode" class="hc-select" onchange="hcWattHesaplaModDegisti()">
                <option value="vi">Voltaj (V) ve Akım (I)</option>
                <option value="ir">Akım (I) ve Direnç (R)</option>
                <option value="vr">Voltaj (V) ve Direnç (R)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-wth-v-group">
            <label for="hc-wth-v">Voltaj (V - Volt)</label>
            <input type="number" id="hc-wth-v" class="hc-input" placeholder="örn. 220" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-wth-i-group">
            <label for="hc-wth-i">Akım (I - Amper - A)</label>
            <input type="number" id="hc-wth-i" class="hc-input" placeholder="örn. 10" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-wth-r-group" style="display:none;">
            <label for="hc-wth-r">Direnç (R - Ohm - Ω)</label>
            <input type="number" id="hc-wth-r" class="hc-input" placeholder="örn. 22" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcWattHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-watt-hesaplama-result">
            <div class="hc-result-title">Elektriksel Güç Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Güç (P):</span>
                <span class="hc-result-value" id="hc-wth-res-w">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Güç (kW):</span>
                <span class="hc-result-value" id="hc-wth-res-kw">-</span>
            </div>
            <div class="hc-result-desc" id="hc-wth-desc"></div>
        </div>
    </div>
    <?php
}
