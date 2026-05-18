<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yogunluk_ve_hacimden_kutle_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yogunluk-ve-hacimden-kutle-hesaplama',
        HC_PLUGIN_URL . 'modules/yogunluk-ve-hacimden-kutle-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-yogunluk-ve-hacimden-kutle-hesaplama-css',
        HC_PLUGIN_URL . 'modules/yogunluk-ve-hacimden-kutle-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-yogunluk-ve-hacimden-kutle-hesaplama">
        <div class="hc-cal-header">
            <h3>Yoğunluk ve Hacimden Kütle Hesaplama</h3>
            <p>Malzemenin özkütlesi (yoğunluğu) ve cismin hacmini kullanarak cismin toplam kütlesini (m = d × V) yüksek hassasiyetle hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-yhk2-density">Yoğunluk (d - kg/m³)</label>
            <input type="number" id="hc-yhk2-density" class="hc-input" placeholder="örn. 7874 (Demir)" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-yhk2-preset">Hazır Malzemeler</label>
            <select id="hc-yhk2-preset" class="hc-select" onchange="hcYhk2PresetDegisti()">
                <option value="">-- Şablon Seçin --</option>
                <option value="1000">Saf Su (1.000 kg/m³)</option>
                <option value="7874">Demir (7.874 kg/m³)</option>
                <option value="2700">Alüminyum (2.700 kg/m³)</option>
                <option value="19300">Altın (19.300 kg/m³)</option>
                <option value="1.225">Hava (1.225 kg/m³)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-yhk2-volume">Hacim (V)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-yhk2-volume-val" class="hc-input" placeholder="Miktar" step="any" min="0">
                <select id="hc-yhk2-volume-unit" class="hc-select" style="max-width: 120px;">
                    <option value="m3">Metreküp (m³)</option>
                    <option value="l">Litre (L)</option>
                    <option value="cm3">Santimetreküp (cm³)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcYoğunlukHacimdenKütleHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-yogunluk-ve-hacimden-kutle-hesaplama-result">
            <div class="hc-result-title">Hesaplanan Kütle (Ağırlık)</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Toplam Kütle (Kilogram - kg):</span>
                <span class="hc-result-value" id="hc-yhk2-res-kg">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Toplam Kütle (Gram - g):</span>
                <span class="hc-result-value" id="hc-yhk2-res-g">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Toplam Kütle (Ton):</span>
                <span class="hc-result-value" id="hc-yhk2-res-ton">-</span>
            </div>
            <div class="hc-result-desc" id="hc-yhk2-desc"></div>
        </div>
    </div>
    <?php
}
