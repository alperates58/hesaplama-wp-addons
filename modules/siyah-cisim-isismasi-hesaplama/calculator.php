<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_siyah_cisim_isismasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-siyah-cisim-isismasi-hesaplama',
        HC_PLUGIN_URL . 'modules/siyah-cisim-isismasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-siyah-cisim-isismasi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/siyah-cisim-isismasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-siyah-cisim-isismasi-hesaplama">
        <div class="hc-cal-header">
            <h3>Siyah Cisim Işıması Hesaplama</h3>
            <p>Wien Kayma Yasası ve Stefan-Boltzmann Yasası'nı kullanarak, ideal bir siyah cismin sıcaklığına bağlı ışıma özelliklerini hesaplar.</p>
        </div>

        <div class="hc-form-group">
            <label for="hc-sci-t-type">Sıcaklık Birimi</label>
            <select id="hc-sci-t-type" class="hc-select">
                <option value="c">Derece Celsius (°C)</option>
                <option value="k">Kelvin (K)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sci-t">Sıcaklık Değeri</label>
            <input type="number" id="hc-sci-t" class="hc-input" placeholder="örn. 5778 (Güneş Yüzeyi için K)" step="any">
        </div>

        <button class="hc-btn" onclick="hcSiyahCisimIsismasiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-siyah-cisim-isismasi-hesaplama-result">
            <div class="hc-result-title">Işıma ve Dalga Boyu Analizi</div>
            <div class="hc-result-item">
                <span class="hc-result-label">Tepe Dalga Boyu (λ_max):</span>
                <span class="hc-result-value" id="hc-sci-res-lambda">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Renk/Spektrum Bölgesi:</span>
                <span class="hc-result-value" id="hc-sci-res-spec">-</span>
            </div>
            <div class="hc-result-item">
                <span class="hc-result-label">Birim Yüzey Toplam Gücü (I):</span>
                <span class="hc-result-value" id="hc-sci-res-power">-</span>
            </div>
            <div class="hc-result-desc" id="hc-sci-desc"></div>
        </div>
    </div>
    <?php
}
