<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ses_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ses-hizi-hesaplama',
        HC_PLUGIN_URL . 'modules/ses-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ses-hizi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ses-hizi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ses-hizi-hesaplama">
        <div class="hc-cal-header">
            <h3>Ses Hızı Hesaplama</h3>
            <p>Ses dalgalarının hava (sıcaklığa bağlı), su, çelik veya özel tanımlanmış katı/sıvı ortamlarındaki yayılma hızını hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sh-medium">Ortam Türü</label>
            <select id="hc-sh-medium" class="hc-select" onchange="hcSesHiziOrtamDegisti()">
                <option value="air">Hava (Gaz - Sıcaklığa Duyarlı)</option>
                <option value="liquid">Sıvı (Bulk Modülü ve Yoğunluğa Göre)</option>
                <option value="solid">Katı (Young Modülü ve Yoğunluğa Göre)</option>
            </select>
        </div>

        <!-- Hava için -->
        <div class="hc-form-group" id="hc-sh-temp-group">
            <label for="hc-sh-temp">Hava Sıcaklığı (°C)</label>
            <input type="number" id="hc-sh-temp" class="hc-input" value="20" step="any">
        </div>

        <!-- Sıvı için -->
        <div id="hc-sh-liquid-group" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-sh-bulk">Bulk (Hacimsel Esneklik) Modülü (GPa)</label>
                <input type="number" id="hc-sh-bulk" class="hc-input" placeholder="örn. 2.2 (Su)" step="any" min="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-sh-rho-liq">Sıvı Yoğunluğu (kg/m³)</label>
                <input type="number" id="hc-sh-rho-liq" class="hc-input" placeholder="örn. 1000" step="any" min="0">
            </div>
        </div>

        <!-- Katı için -->
        <div id="hc-sh-solid-group" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-sh-young">Young Modülü (Boyutsal Esneklik) (GPa)</label>
                <input type="number" id="hc-sh-young" class="hc-input" placeholder="örn. 200 (Çelik)" step="any" min="0">
            </div>
            <div class="hc-form-group">
                <label for="hc-sh-rho-sol">Katı Yoğunluğu (kg/m³)</label>
                <input type="number" id="hc-sh-rho-sol" class="hc-input" placeholder="örn. 7850" step="any" min="0">
            </div>
        </div>

        <button class="hc-btn" onclick="hcSesHiziHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ses-hizi-hesaplama-result">
            <div class="hc-result-title">Ses Yayılma Hızı Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Metre / Saniye (m/s):</span>
                <span class="hc-result-value" id="hc-sh-res-ms">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kilometre / Saat (km/sa):</span>
                <span class="hc-result-value" id="hc-sh-res-kmh">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sh-desc"></div>
        </div>
    </div>
    <?php
}
