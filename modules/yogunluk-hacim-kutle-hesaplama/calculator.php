<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yogunluk_hacim_kutle_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yogunluk-hacim-kutle-hesaplama',
        HC_PLUGIN_URL . 'modules/yogunluk-hacim-kutle-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yogunluk-hacim-kutle-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yogunluk-hacim-kutle-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yogunluk-hacim-kutle-hesaplama">
        <div class="hc-cal-header">
            <h3>Yoğunluk, Hacim ve Kütle Hesaplama</h3>
            <p>Maddelerin en temel fiziksel özelliklerinden olan yoğunluk (özkütle), kütle ve hacim parametrelerinden bilinen ikisiyle üçüncüyü hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-yhk-solve">Hesaplanacak Değişken</label>
            <select id="hc-yhk-solve" class="hc-select" onchange="hcYhkSolveDegisti()">
                <option value="density">Yoğunluk (d - kg/m³)</option>
                <option value="mass">Kütle (m - kg)</option>
                <option value="volume">Hacim (V - m³)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-yhk-density-group" style="display:none;">
            <label for="hc-yhk-density">Yoğunluk (d - kg/m³)</label>
            <input type="number" id="hc-yhk-density" class="hc-input" placeholder="örn. 1000" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-yhk-mass-group">
            <label for="hc-yhk-mass">Kütle (m - kg)</label>
            <input type="number" id="hc-yhk-mass" class="hc-input" placeholder="örn. 5" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-yhk-volume-group">
            <label for="hc-yhk-volume">Hacim (V - metreküp - m³)</label>
            <input type="number" id="hc-yhk-volume" class="hc-input" placeholder="örn. 0.005 (yani 5 Litre)" step="any" min="0">
        </div>

        <div class="hc-form-group" id="hc-yhk-preset-group">
            <label for="hc-yhk-preset">Malzeme Yoğunluğu Hazır Şablonları</label>
            <select id="hc-yhk-preset" class="hc-select" onchange="hcYhkPresetDegisti()">
                <option value="">-- Malzeme Seçin --</option>
                <option value="1000">Saf Su (1.000 kg/m³)</option>
                <option value="7874">Demir (7.874 kg/m³)</option>
                <option value="2700">Alüminyum (2.700 kg/m³)</option>
                <option value="19300">Altın (19.300 kg/m³)</option>
                <option value="10500">Gümüş (10.500 kg/m³)</option>
                <option value="8960">Bakır (8.960 kg/m³)</option>
                <option value="1.225">Hava (1.225 kg/m³)</option>
                <option value="700">Meşe Ahşap (yaklaşık 700 kg/m³)</option>
                <option value="2500">Cam (2.500 kg/m³)</option>
                <option value="13600">Cıva (13.600 kg/m³)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcYhkHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-yogunluk-hacim-kutle-hesaplama-result">
            <div class="hc-result-title">Hesaplama Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label" id="hc-yhk-res-label">Yoğunluk:</span>
                <span class="hc-result-value" id="hc-yhk-res-val">-</span>
            </div>
            <div class="hc-result-item" id="hc-yhk-res-extra-row">
                <span class="hc-result-label">Litre (L) veya g/cm³ Karşılığı:</span>
                <span class="hc-result-value" id="hc-yhk-res-extra">-</span>
            </div>
            <div class="hc-result-desc" id="hc-yhk-desc"></div>
        </div>
    </div>
    <?php
}
