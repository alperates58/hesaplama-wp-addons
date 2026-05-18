<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ses_dalga_boyu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ses-dalga-boyu-hesaplama',
        HC_PLUGIN_URL . 'modules/ses-dalga-boyu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ses-dalga-boyu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/ses-dalga-boyu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ses-dalga-boyu-hesaplama">
        <div class="hc-cal-header">
            <h3>Ses Dalga Boyu Hesaplama</h3>
            <p>Frekans ve ortam koşullarına (sıcaklık) göre ses dalgalarının fiziksel uzunluğunu hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sdb-f">Frekans (Hertz - Hz)</label>
            <input type="number" id="hc-sdb-f" class="hc-input" placeholder="örn. 440" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sdb-mode">Ses Hızı Belirleme Yöntemi</label>
            <select id="hc-sdb-mode" class="hc-select" onchange="hcSesDalgaBoyuModDegisti()">
                <option value="temp">Ortam Sıcaklığına Göre (Hava)</option>
                <option value="custom">Özel Ses Hızı Gir</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-sdb-temp-group">
            <label for="hc-sdb-temp">Hava Sıcaklığı (°C)</label>
            <input type="number" id="hc-sdb-temp" class="hc-input" value="20" step="any">
        </div>

        <div class="hc-form-group" id="hc-sdb-v-group" style="display:none;">
            <label for="hc-sdb-v">Ses Hızı (m/s)</label>
            <input type="number" id="hc-sdb-v" class="hc-input" placeholder="örn. 343" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSesDalgaBoyuHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-ses-dalga-boyu-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Ses Dalga Boyu</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Dalga Boyu (Metre - m):</span>
                <span class="hc-result-value" id="hc-sdb-res-m">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Dalga Boyu (Santimetre - cm):</span>
                <span class="hc-result-value" id="hc-sdb-res-cm">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Kullanılan Ses Hızı:</span>
                <span class="hc-result-value" id="hc-sdb-res-v">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sdb-desc"></div>
        </div>
    </div>
    <?php
}
