<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_evsel_atik_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-evsel-atik-miktari-hesaplama',
        HC_PLUGIN_URL . 'modules/evsel-atik-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-evsel-atik-miktari-hesaplama-css',
        HC_PLUGIN_URL . 'modules/evsel-atik-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-waste">
        <h3>Evsel Atık Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-wa-persons">Hane Halkı Sayısı</label>
            <input type="number" id="hc-wa-persons" value="1" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-wa-lifestyle">Yaşam Tarzı</label>
            <select id="hc-wa-lifestyle">
                <option value="0.8">Düşük Atık (Sıfır Atık Odaklı)</option>
                <option value="1.1" selected>Ortalama (Türkiye Ortalaması)</option>
                <option value="1.5">Yüksek Atık (Yoğun Tüketim)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcEvselAtıkMiktarıHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-wa-result">
            <div class="hc-result-label">Yıllık Tahmini Atık:</div>
            <div class="hc-result-value" id="hc-wa-val">-</div>
            <p id="hc-wa-details" style="margin-top:10px; font-size:0.85em; color:#666;"></p>
        </div>
    </div>
    <?php
}
