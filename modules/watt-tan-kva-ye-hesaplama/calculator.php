<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_watt_tan_kva_ye_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-watt-tan-kva-ye-hesaplama',
        HC_PLUGIN_URL . 'modules/watt-tan-kva-ye-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-watt-tan-kva-ye-hesaplama-css',
        HC_PLUGIN_URL . 'modules/watt-tan-kva-ye-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-watt-tan-kva-ye-hesaplama">
        <div class="hc-cal-header">
            <h3>Watt'tan kVA'ya Hesaplama</h3>
            <p>Elektriksel aktif gücü (Watt - W), şebeke güç faktörünü (cosφ) kullanarak görünür güce (kilovolt-amper - kVA) dönüştürür. Trafo, jeneratör ve regülatör seçimlerinde kritik bir hesaptır.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-wtk-power">Aktif Güç (P - Watt - W)</label>
            <input type="number" id="hc-wtk-power" class="hc-input" placeholder="örn. 8000" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-wtk-pf">Güç Faktörü (Power Factor - cosφ)</label>
            <input type="number" id="hc-wtk-pf" class="hc-input" value="0.8" step="any" min="0.1" max="1.0">
            <span style="font-size: 11px; color: #777;">Ortalama endüstriyel şebeke standardı 0.8'dir. Rezistif yüklerde 1.0 alınır.</span>
        </div>

        <button class="hc-btn" onclick="hcWattTankVaHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-watt-tan-kva-ye-hesaplama-result">
            <div class="hc-result-title">Elektriksel Güç Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Görünür Güç (kVA):</span>
                <span class="hc-result-value" id="hc-wtk-res-kva">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Görünür Güç (VA):</span>
                <span class="hc-result-value" id="hc-wtk-res-va">-</span>
            </div>
            <div class="hc-result-desc" id="hc-wtk-desc"></div>
        </div>
    </div>
    <?php
}
