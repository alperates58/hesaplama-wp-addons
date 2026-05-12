<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sarap_so2_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-wine-so2-js',
        HC_PLUGIN_URL . 'modules/sarap-so2-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-wine-so2-css',
        HC_PLUGIN_URL . 'modules/sarap-so2-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-wine-so2">
        <h3>Şarap SO₂ (Kükürt) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ws-vol">Şarap Hacmi (Litre)</label>
            <input type="number" id="hc-ws-vol" value="20" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ws-target">Hedef Serbest SO₂ Artışı (PPM / mg/L)</label>
            <input type="number" id="hc-ws-target" value="30" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ws-source">Kükürt Kaynağı</label>
            <select id="hc-ws-source">
                <option value="57">Potasyum Metabisülfit (KMS - %57 SO₂)</option>
                <option value="5">SO₂ Çözeltisi (%5)</option>
                <option value="10">SO₂ Çözeltisi (%10)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcWineSO2Hesapla()">Hesapla</button>

        <div class="hc-result" id="hc-wine-so2-result">
            <div class="hc-result-item">
                <span>Eklenmesi Gereken Miktar:</span>
                <strong class="hc-result-value" id="hc-ws-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama, teorik kükürt salınımı baz alınarak yapılmıştır. Şarap pH değeri kükürt etkinliğini değiştirir.</div>
        </div>
    </div>
    <?php
}
