<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yogunluk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yogunluk-hesaplama',
        HC_PLUGIN_URL . 'modules/yogunluk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yogunluk-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yogunluk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yogunluk-hesaplama">
        <div class="hc-cal-header">
            <h3>Yoğunluk (Özkütle) Hesaplama</h3>
            <p>Bir maddenin kütlesini ve kapladığı hacmi girerek yoğunluğunu (d = m / V) hesaplar ve farklı özkütle birimlerine dönüştürür.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-ygh-mass">Kütle (m)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-ygh-mass-val" class="hc-input" placeholder="Miktar" step="any" min="0">
                <select id="hc-ygh-mass-unit" class="hc-select" style="max-width: 120px;">
                    <option value="kg">Kilogram (kg)</option>
                    <option value="g">Gram (g)</option>
                    <option value="ton">Ton (t)</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-ygh-volume">Hacim (V)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-ygh-volume-val" class="hc-input" placeholder="Miktar" step="any" min="0">
                <select id="hc-ygh-volume-unit" class="hc-select" style="max-width: 120px;">
                    <option value="m3">Metreküp (m³)</option>
                    <option value="l">Litre (L)</option>
                    <option value="cm3">Santimetreküp (cm³)</option>
                    <option value="ml">Mililitre (mL)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcYoğunlukHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-yogunluk-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Özkütle Değerleri</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Yoğunluk (kg/m³):</span>
                <span class="hc-result-value" id="hc-ygh-res-kgm3">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Yoğunluk (g/cm³ veya g/mL):</span>
                <span class="hc-result-value" id="hc-ygh-res-gcm3">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Yoğunluk (kg/L):</span>
                <span class="hc-result-value" id="hc-ygh-res-kgl">-</span>
            </div>
            <div class="hc-result-desc" id="hc-ygh-desc"></div>
        </div>
    </div>
    <?php
}
