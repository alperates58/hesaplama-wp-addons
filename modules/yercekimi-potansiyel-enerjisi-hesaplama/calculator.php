<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yercekimi_potansiyel_enerjisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yercekimi-potansiyel-enerjisi-hesaplama',
        HC_PLUGIN_URL . 'modules/yercekimi-potansiyel-enerjisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yercekimi-potansiyel-enerjisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yercekimi-potansiyel-enerjisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yercekimi-potansiyel-enerjisi-hesaplama">
        <div class="hc-cal-header">
            <h3>Yerçekimi Potansiyel Enerjisi Hesaplama</h3>
            <p>Bir cismin kütlesi, bulunduğu yükseklik ve yerçekimi ivmesi parametrelerini kullanarak kazandığı potansiyel enerjiyi (Joule) hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-peh-solve">Hesaplanacak Değişken</label>
            <select id="hc-peh-solve" class="hc-select" onchange="hcPotansiyelSolveDegisti()">
                <option value="energy">Potansiyel Enerji (PE - Joule)</option>
                <option value="mass">Kütle (m - kg)</option>
                <option value="height">Yükseklik (h - m)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-peh-energy-group" style="display:none;">
            <label for="hc-peh-energy">Potansiyel Enerji (E - Joule - J)</label>
            <input type="number" id="hc-peh-energy" class="hc-input" placeholder="örn. 980" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-peh-mass-group">
            <label for="hc-peh-mass">Kütle (m - kilogram - kg)</label>
            <input type="number" id="hc-peh-mass" class="hc-input" placeholder="örn. 10" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-peh-height-group">
            <label for="hc-peh-height">Yükseklik (h - metre - m)</label>
            <input type="number" id="hc-peh-height" class="hc-input" placeholder="örn. 10" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-peh-planet">Yerçekimi İvmesi Gök Cismi Seçimi</label>
            <select id="hc-peh-planet" class="hc-select" onchange="hcPotansiyelGezegenDegisti()">
                <option value="9.80665">Dünya (g = 9.81 m/s²)</option>
                <option value="1.62">Ay (g = 1.62 m/s²)</option>
                <option value="3.71">Mars (g = 3.71 m/s²)</option>
                <option value="24.79">Jüpiter (g = 24.79 m/s²)</option>
                <option value="custom">Özel Yerçekimi İvmesi...</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-peh-custom-g-group" style="display:none;">
            <label for="hc-peh-custom-g">Özel Yerçekimi İvmesi (g - m/s²)</label>
            <input type="number" id="hc-peh-custom-g" class="hc-input" value="9.80665" step="any" min="0.1">
        </div>

        <button class="hc-btn" onclick="hcPotansiyelEnerjiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-yercekimi-potansiyel-enerjisi-hesaplama-result">
            <div class="hc-result-title">Enerji Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label" id="hc-peh-res-label">Potansiyel Enerji (PE):</span>
                <span class="hc-result-value" id="hc-peh-res-val">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kalori (cal) Karşılığı:</span>
                <span class="hc-result-value" id="hc-peh-res-cal">-</span>
            </div>
            <div class="hc-result-desc" id="hc-peh-desc"></div>
        </div>
    </div>
    <?php
}
