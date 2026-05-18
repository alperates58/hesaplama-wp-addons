<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yogunluk_ve_kutleden_hacim_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yogunluk-ve-kutleden-hacim-hesaplama',
        HC_PLUGIN_URL . 'modules/yogunluk-ve-kutleden-hacim-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yogunluk-ve-kutleden-hacim-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yogunluk-ve-kutleden-hacim-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yogunluk-ve-kutleden-hacim-hesaplama">
        <div class="hc-cal-header">
            <h3>Yoğunluk ve Kütleden Hacim Hesaplama</h3>
            <p>Malzemenin özkütlesi (yoğunluğu) ve cismin kütlesini kullanarak kapladığı fiziksel hacmi (V = m / d) yüksek hassasiyetle hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-ykv-density">Yoğunluk (d - kg/m³)</label>
            <input type="number" id="hc-ykv-density" class="hc-input" placeholder="örn. 1000 (Su)" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-ykv-preset">Hazır Malzemeler</label>
            <select id="hc-ykv-preset" class="hc-select" onchange="hcYkvPresetDegisti()">
                <option value="">-- Şablon Seçin --</option>
                <option value="1000">Saf Su (1.000 kg/m³)</option>
                <option value="7874">Demir (7.874 kg/m³)</option>
                <option value="2700">Alüminyum (2.700 kg/m³)</option>
                <option value="19300">Altın (19.300 kg/m³)</option>
                <option value="1.225">Hava (1.225 kg/m³)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-ykv-mass">Kütle (m)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-ykv-mass-val" class="hc-input" placeholder="Miktar" step="any" min="0">
                <select id="hc-ykv-mass-unit" class="hc-select" style="max-width: 120px;">
                    <option value="kg">Kilogram (kg)</option>
                    <option value="g">Gram (g)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcYoğunlukKütledenHacimHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-yogunluk-ve-kutleden-hacim-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Hacim (V)</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Toplam Hacim (Metreküp - m³):</span>
                <span class="hc-result-value" id="hc-ykv-res-m3">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Toplam Hacim (Litre - L):</span>
                <span class="hc-result-value" id="hc-ykv-res-l">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Toplam Hacim (cm³):</span>
                <span class="hc-result-value" id="hc-ykv-res-cm3">-</span>
            </div>
            <div class="hc-result-desc" id="hc-ykv-desc"></div>
        </div>
    </div>
    <?php
}
