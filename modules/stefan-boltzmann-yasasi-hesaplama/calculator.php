<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_stefan_boltzmann_yasasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-stefan-boltzmann-yasasi-hesaplama',
        HC_PLUGIN_URL . 'modules/stefan-boltzmann-yasasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-stefan-boltzmann-yasasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/stefan-boltzmann-yasasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-stefan-boltzmann-yasasi-hesaplama">
        <div class="hc-cal-header">
            <h3>Stefan-Boltzmann Yasası Hesaplama</h3>
            <p>Bir cismin yüzeyinden yayılan toplam termal enerji miktarını yüzey alanı, sıcaklık ve malzeme yayma katsayısına bağlı olarak hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sby-area">Yüzey Alanı (A - m²)</label>
            <input type="number" id="hc-sby-area" class="hc-input" placeholder="örn. 2" step="any" min="0">
        </div>

        <div class="hc-form-group">
            <label for="hc-sby-temp-type">Sıcaklık Birimi</label>
            <select id="hc-sby-temp-type" class="hc-select">
                <option value="c">Derece Celsius (°C)</option>
                <option value="k">Kelvin (K)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sby-temp">Sıcaklık Değeri</label>
            <input type="number" id="hc-sby-temp" class="hc-input" placeholder="örn. 100" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-sby-e">Yayma Katsayısı / Emisivite (ε)</label>
            <input type="number" id="hc-sby-e" class="hc-input" value="1.0" step="any" min="0" max="1">
            <span style="font-size: 11px; color: #777;">İdeal siyah cisim: 1.0, Mat boyalı yüzeyler: 0.90, Parlak metaller: 0.05 - 0.20</span>
        </div>

        <button class="hc-btn" onclick="hcStefanBoltzmannHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-stefan-boltzmann-yasasi-hesaplama-result">
            <div class="hc-result-title">Işıma Gücü Sonuçları</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Toplam Işınan Güç (P):</span>
                <span class="hc-result-value" id="hc-sby-res-w">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Birim Alan Başına Güç (P/A):</span>
                <span class="hc-result-value" id="hc-sby-res-wa">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sby-desc"></div>
        </div>
    </div>
    <?php
}
