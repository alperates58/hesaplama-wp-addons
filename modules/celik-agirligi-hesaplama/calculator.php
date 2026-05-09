<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_celik_agirligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-celik-agirligi-hesaplama',
        HC_PLUGIN_URL . 'modules/celik-agirligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-celik-agirligi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/celik-agirligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-celik-agirligi-hesaplama">
        <h3>Çelik Profil Ağırlığı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-stl-type">Profil Tipi</label>
            <select id="hc-stl-type" onchange="hcStlToggle()">
                <option value="flat">Lama / Plaka</option>
                <option value="round">Yuvarlak Mil</option>
                <option value="square">Kare Profil</option>
            </select>
        </div>
        <div id="hc-stl-flat">
            <div class="hc-form-group">
                <label for="hc-stl-w">Genişlik (mm)</label>
                <input type="number" id="hc-stl-w" placeholder="Örn: 50">
            </div>
            <div class="hc-form-group">
                <label for="hc-stl-t">Kalınlık (mm)</label>
                <input type="number" id="hc-stl-t" placeholder="Örn: 5">
            </div>
        </div>
        <div id="hc-stl-round" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-stl-d">Çap (mm)</label>
                <input type="number" id="hc-stl-d" placeholder="Örn: 20">
            </div>
        </div>
        <div id="hc-stl-square" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-stl-a">Kenar (mm)</label>
                <input type="number" id="hc-stl-a" placeholder="Örn: 40">
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-stl-len">Boy (m)</label>
            <input type="number" id="hc-stl-len" placeholder="Örn: 6" value="1">
        </div>
        <button class="hc-btn" onclick="hcStlHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-stl-result">
            <div class="hc-result-label">Tahmini Ağırlık:</div>
            <div class="hc-result-value" id="hc-stl-val">-</div>
            <div class="hc-result-note">Çelik yoğunluğu 7.85 g/cm³ baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
