<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_serbest_dusme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-serbest-dusme-hesaplama',
        HC_PLUGIN_URL . 'modules/serbest-dusme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-serbest-dusme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/serbest-dusme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-serbest-dusme-hesaplama">
        <div class="hc-cal-header">
            <h3>Serbest Düşme Hesaplama</h3>
            <p>Hava sürtünmesi ihmal edilerek, yerçekimi ivmesiyle serbest düşüşe bırakılan nesnelerin hareket parametrelerini hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sd-mode">Hesaplama Türü</label>
            <select id="hc-sd-mode" class="hc-select" onchange="hcSerbestDusmeModDegisti()">
                <option value="time">Düşme Süresinden Hesapla</option>
                <option value="height">Düşme Yüksekliğinden Hesapla</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-sd-time-group">
            <label for="hc-sd-time">Düşme Süresi (saniye - s)</label>
            <input type="number" id="hc-sd-time" class="hc-input" placeholder="örn. 3" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-sd-height-group" style="display:none;">
            <label for="hc-sd-height">Düşme Yüksekliği (metre - m)</label>
            <input type="number" id="hc-sd-height" class="hc-input" placeholder="örn. 45" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sd-g">Yerçekimi İvmesi (g - m/s²)</label>
            <input type="number" id="hc-sd-g" class="hc-input" value="9.80665" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sd-mass">Cisim Kütlesi (kilogram - kg - İsteğe Bağlı)</label>
            <input type="number" id="hc-sd-mass" class="hc-input" placeholder="Enerji hesabı için kütle girin" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSerbestDusmeHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-serbest-dusme-hesaplama-result">
            <div class="hc-result-title">Düşüş Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Düşme Süresi:</span>
                <span class="hc-result-value" id="hc-sd-res-time">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Düşme Yüksekliği:</span>
                <span class="hc-result-value" id="hc-sd-res-height">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Çarpma Hızı (m/s):</span>
                <span class="hc-result-value" id="hc-sd-res-v-ms">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Çarpma Hızı (km/sa):</span>
                <span class="hc-result-value" id="hc-sd-res-v-kmh">-</span>
            </div>
            <div class="hc-result-item" id="hc-sd-energy-row" style="display:none;">
                <span class="hc-result-label">Yere Çarpma Kinetik Enerjisi:</span>
                <span class="hc-result-value" id="hc-sd-res-energy">-</span>
            </div>
        </div>
    </div>
    <?php
}
