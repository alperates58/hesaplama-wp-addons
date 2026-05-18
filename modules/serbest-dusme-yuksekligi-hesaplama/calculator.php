<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_serbest_dusme_yuksekligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-serbest-dusme-yuksekligi-hesaplama',
        HC_PLUGIN_URL . 'modules/serbest-dusme-yuksekligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-serbest-dusme-yuksekligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/serbest-dusme-yuksekligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-serbest-dusme-yuksekligi-hesaplama">
        <div class="hc-cal-header">
            <h3>Serbest Düşme Yüksekliği Hesaplama</h3>
            <p>Sürtünmesiz bir ortamda, yere çarptığı andaki hızı bilinen bir cismin serbest bırakıldığı dikey yüksekliği (h) hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sdy-v-type">Hız Birimi</label>
            <select id="hc-sdy-v-type" class="hc-select">
                <option value="ms">Metre / Saniye (m/s)</option>
                <option value="kmh">Kilometre / Saat (km/sa)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sdy-v">Yere Çarpma Hızı</label>
            <input type="number" id="hc-sdy-v" class="hc-input" placeholder="örn. 30" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sdy-g">Yerçekimi İvmesi (g - m/s²)</label>
            <input type="number" id="hc-sdy-g" class="hc-input" value="9.80665" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSerbestDusmeYuksekligiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-serbest-dusme-yuksekligi-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Bırakılma Yüksekliği</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Yükseklik (metre - m):</span>
                <span class="hc-result-value" id="hc-sdy-res-m">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Yükseklik (kilometre - km):</span>
                <span class="hc-result-value" id="hc-sdy-res-km">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sdy-desc"></div>
        </div>
    </div>
    <?php
}
