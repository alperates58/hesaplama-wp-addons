<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hata_yayilimi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-hata-yayilimi-hesaplama',
        HC_PLUGIN_URL . 'modules/hata-yayilimi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hata-yayilimi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/hata-yayilimi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-error-prop">
        <h3>Hata Yayılımı (Error Propagation)</h3>
        <div class="hc-form-group">
            <label for="hc-err-op">İşlem Türü:</label>
            <select id="hc-err-op" class="hc-input">
                <option value="add">Toplama / Çıkarma (A ± B)</option>
                <option value="mul">Çarpma / Bölme (A * B veya A / B)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-err-val-a">A Değeri:</label>
            <input type="number" id="hc-err-val-a" class="hc-input" step="any" placeholder="Örn: 10.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-err-std-a">A Hatası (σA):</label>
            <input type="number" id="hc-err-std-a" class="hc-input" step="any" placeholder="Örn: 0.1">
        </div>
        <div class="hc-form-group">
            <label for="hc-err-val-b">B Değeri:</label>
            <input type="number" id="hc-err-val-b" class="hc-input" step="any" placeholder="Örn: 5.2">
        </div>
        <div class="hc-form-group">
            <label for="hc-err-std-b">B Hatası (σB):</label>
            <input type="number" id="hc-err-std-b" class="hc-input" step="any" placeholder="Örn: 0.05">
        </div>
        <button class="hc-btn" onclick="hcHataYayilimiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-hata-yayilimi-result">
            <div class="hc-result-label">Bileşik Hata (σZ):</div>
            <div class="hc-result-value" id="hc-res-err-prop">-</div>
            <p id="hc-err-formula" style="margin-top:10px; font-size:0.9em; color:#666;"></p>
        </div>
    </div>
    <?php
}
