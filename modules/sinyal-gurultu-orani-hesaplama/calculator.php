<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sinyal_gurultu_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sinyal-gurultu-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/sinyal-gurultu-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sinyal-gurultu-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/sinyal-gurultu-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sinyal-gurultu-orani-hesaplama">
        <div class="hc-cal-header">
            <h3>Sinyal Gürültü Oranı Hesaplama</h3>
            <p>Elektriksel, ses veya optik sinyallerin temizliğini ölçmek için Sinyal/Gürültü Oranını (SNR) ve dB seviyesini hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sgo-type">Sinyal Türü</label>
            <select id="hc-sgo-type" class="hc-select" onchange="hcSinyalGurultuTuruDegisti()">
                <option value="power">Güç (Power - Watt, mW vb.)</option>
                <option value="voltage">Gerilim/Genlik (Voltage - Volt, mV vb.)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sgo-sig" id="hc-sgo-sig-label">Sinyal Seviyesi (Watt)</label>
            <input type="number" id="hc-sgo-sig" class="hc-input" placeholder="örn. 100" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sgo-noise" id="hc-sgo-noise-label">Gürültü Seviyesi (Watt)</label>
            <input type="number" id="hc-sgo-noise" class="hc-input" placeholder="örn. 2" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSinyalGurultuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-sinyal-gurultu-orani-hesaplama-result">
            <div class="hc-result-title">Hesaplanan SNR Değerleri</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Sinyal Gürültü Oranı (Lineer):</span>
                <span class="hc-result-value" id="hc-sgo-res-ratio">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">SNR Desibel Değeri (dB):</span>
                <span class="hc-result-value" id="hc-sgo-res-db">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sgo-desc"></div>
        </div>
    </div>
    <?php
}
