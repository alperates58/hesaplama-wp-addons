<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_spor_sirasinda_su_ihtiyaci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-spor-sirasinda-su-ihtiyaci-hesaplama',
        HC_PLUGIN_URL . 'modules/spor-sirasinda-su-ihtiyaci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-spor-sirasinda-su-ihtiyaci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/spor-sirasinda-su-ihtiyaci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-water">
        <h3>Spor Sırasında Su İhtiyacı</h3>
        <div class="hc-form-group">
            <label for="hc-water-weight">Vücut Ağırlığınız (kg)</label>
            <input type="number" id="hc-water-weight" value="75">
        </div>
        <div class="hc-form-group">
            <label for="hc-water-dur">Egzersiz Süresi (Dakika)</label>
            <input type="number" id="hc-water-dur" value="60">
        </div>
        <div class="hc-form-group">
            <label for="hc-water-intensity">Yoğunluk ve Sıcaklık</label>
            <select id="hc-water-intensity">
                <option value="0.5">Düşük (Serin Hava)</option>
                <option value="0.8" selected>Orta (Normal Şartlar)</option>
                <option value="1.2">Yüksek (Sıcak / Yoğun)</option>
                <option value="1.8">Çok Yüksek (Aşırı Sıcak / Elit Antrenman)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSporSırasındaSuİhtiyacıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-water-result">
            <div class="hc-result-label">Önerilen Su Tüketimi:</div>
            <div class="hc-result-value" id="hc-water-val">-</div>
            <div id="hc-water-tips" style="margin-top: 10px; font-size: 0.85em; line-height: 1.5;"></div>
        </div>
    </div>
    <?php
}
