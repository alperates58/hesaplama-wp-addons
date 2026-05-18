<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_surukleme_kuvveti_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-surukleme-kuvveti-hesaplama',
        HC_PLUGIN_URL . 'modules/surukleme-kuvveti-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-surukleme-kuvveti-hesaplama-css',
        HC_PLUGIN_URL . 'modules/surukleme-kuvveti-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-surukleme-kuvveti-hesaplama">
        <div class="hc-cal-header">
            <h3>Sürükleme Kuvveti Hesaplama</h3>
            <p>Akışkan içinde hareket eden cisimlerin hız, kesit alanı, akışkan yoğunluğu ve sürükleme katsayılarına göre maruz kaldıkları direnç kuvvetini hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-srk-preset">Cisim Geometrisi / Sürükleme Katsayısı (C_d)</label>
            <select id="hc-srk-preset" class="hc-select" onchange="hcSuruklemeSablonDegisti()">
                <option value="custom">Özel Katsayı Gir</option>
                <option value="sphere">Küre [Cd = 0.47]</option>
                <option value="cube">Küp [Cd = 1.05]</option>
                <option value="cylinder">Düz Silindir [Cd = 0.82]</option>
                <option value="car">Binek Otomobil [Cd = 0.28]</option>
                <option value="streamlined">Aerodinamik Damla Formu [Cd = 0.04]</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-srk-cd">Sürükleme Katsayısı (C_d)</label>
            <input type="number" id="hc-srk-cd" class="hc-input" value="0.47" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-srk-fluid">Akışkan Ortamı (Yoğunluk Preseti)</label>
            <select id="hc-srk-fluid" class="hc-select" onchange="hcSuruklemeAkiskanDegisti()">
                <option value="air">Hava (Deniz Seviyesi, 15°C) [1.225 kg/m³]</option>
                <option value="water">Tatlı Su (20°C) [998 kg/m³]</option>
                <option value="custom">Özel Yoğunluk Gir (kg/m³)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-srk-rho-group" style="display:none;">
            <label for="hc-srk-rho">Akışkan Yoğunluğu (ρ - kg/m³)</label>
            <input type="number" id="hc-srk-rho" class="hc-input" value="1.225" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-srk-v">Cisim Hızı (m/s)</label>
            <input type="number" id="hc-srk-v" class="hc-input" placeholder="örn. 30 (Hava için ~108 km/sa)" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-srk-area">Projeksiyon Kesit Alanı (A - m²)</label>
            <input type="number" id="hc-srk-area" class="hc-input" placeholder="örn. 0.5" step="any" min="0">
        </div>

        <button class="hc-btn" onclick="hcSuruklemeKuvvetiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-surukleme-kuvveti-hesaplama-result">
            <div class="hc-result-title">Sürükleme Direnci Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Sürükleme Kuvveti (F_d):</span>
                <span class="hc-result-value" id="hc-srk-res-fd">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Hız (km/sa):</span>
                <span class="hc-result-value" id="hc-srk-res-kmh">-</span>
            </div>
            <div class="hc-result-desc" id="hc-srk-desc"></div>
        </div>
    </div>
    <?php
}
