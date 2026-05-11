<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pastorizasyon_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pastor',
        HC_PLUGIN_URL . 'modules/pastorizasyon-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pastor">
        <h3>Pastörizasyon Süresi (F-Değeri) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ps-target-f">Hedef F-Değeri (Dakika)</label>
            <input type="number" id="hc-ps-target-f" placeholder="Örn: 3.0" step="any" value="3.0">
            <small>Hedeflenen öldürme etkisi.</small>
        </div>

        <div class="hc-form-group">
            <label for="hc-ps-temp">Pastörizasyon Sıcaklığı (T - °C)</label>
            <input type="number" id="hc-ps-temp" placeholder="°C" step="any" value="72">
        </div>

        <div class="hc-form-group">
            <label for="hc-ps-tref">Referans Sıcaklık (T<sub>ref</sub> - °C)</label>
            <input type="number" id="hc-ps-tref" placeholder="Örn: 71.1" step="any" value="71.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ps-z">Z-Değeri (°C)</label>
            <input type="number" id="hc-ps-z" placeholder="Örn: 10" step="any" value="10">
            <small>Sıcaklık katsayısı.</small>
        </div>

        <button class="hc-btn" onclick="hcPastorHesapla()">Gerekli Süreyi Hesapla</button>

        <div class="hc-result" id="hc-ps-result">
            <div class="hc-result-item">
                <span class="hc-result-label">Gerekli İşlem Süresi (t):</span>
                <span class="hc-result-value" id="hc-ps-res-total">--</span>
                <span class="hc-result-unit">Dakika</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Saniye Cinsinden:</span>
                <span id="hc-ps-res-sec">--</span>
                <span class="hc-result-unit">saniye</span>
            </div>
        </div>
    </div>
    <?php
}
