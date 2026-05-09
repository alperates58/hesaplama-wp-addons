<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_aluminyum_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-aluminyum-agirligi-hesaplama',
        HC_PLUGIN_URL . 'modules/aluminyum-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-aluminyum-agirligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/aluminyum-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-aluminyum-agirligi-hesaplama">
        <h3>Alüminyum Ağırlığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-alu-type">Parça Tipi</label>
            <select id="hc-alu-type" onchange="hcAluToggle()">
                <option value="plate">Levha / Plaka</option>
                <option value="rod">Çubuk / Silindir</option>
            </select>
        </div>
        <div id="hc-alu-plate-inputs">
            <div class="hc-form-group">
                <label for="hc-alu-l">Uzunluk (mm)</label>
                <input type="number" id="hc-alu-l" placeholder="Örn: 1000">
            </div>
            <div class="hc-form-group">
                <label for="hc-alu-w">Genişlik (mm)</label>
                <input type="number" id="hc-alu-w" placeholder="Örn: 500">
            </div>
            <div class="hc-form-group">
                <label for="hc-alu-t">Kalınlık (mm)</label>
                <input type="number" id="hc-alu-t" placeholder="Örn: 5">
            </div>
        </div>
        <div id="hc-alu-rod-inputs" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-alu-d">Çap (mm)</label>
                <input type="number" id="hc-alu-d" placeholder="Örn: 20">
            </div>
            <div class="hc-form-group">
                <label for="hc-alu-len">Boy (mm)</label>
                <input type="number" id="hc-alu-len" placeholder="Örn: 2000">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAluHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-alu-result">
            <div class="hc-result-label">Tahmini Ağırlık:</div>
            <div class="hc-result-value" id="hc-alu-val">-</div>
            <div class="hc-result-note">Alüminyum yoğunluğu 2.70 g/cm³ baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
