<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_od600_bakteri_buyumesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-od600-calc',
        HC_PLUGIN_URL . 'modules/od600-bakteri-buyumesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-od600-calc-css',
        HC_PLUGIN_URL . 'modules/od600-bakteri-buyumesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-od600-calc">
        <h3>OD600 Bakteri Sayısı Tahmini</h3>
        <div class="hc-form-group">
            <label for="hc-od-val">OD600 Değeri:</label>
            <input type="number" id="hc-od-val" step="0.001" placeholder="0.600">
        </div>
        <div class="hc-form-group">
            <label for="hc-od-species">Bakteri Türü:</label>
            <select id="hc-od-species">
                <option value="8e8">E. coli (0.6 OD ≈ 8x10^8 cells/mL)</option>
                <option value="1e8">Yeast (0.6 OD ≈ 1x10^7 cells/mL - ayarlanmış)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcOd600Hesapla()">Tahmin Et</button>
        <div class="hc-result" id="hc-od600-calc-result">
            <strong>Tahmini Hücre Sayısı:</strong>
            <div id="hc-od-res-val" class="hc-result-value">-</div>
            <span>hücre / mL</span>
        </div>
    </div>
    <?php
}
