<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_acisal_hiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-acisal-hiz-hesaplama',
        HC_PLUGIN_URL . 'modules/acisal-hiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-acisal-hiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/acisal-hiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-acisal-hiz-hesaplama">
        <h3>Açısal Hız Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ah-type">Giriş Tipi</label>
            <select id="hc-ah-type" onchange="hcAHToggle()">
                <option value="rpm">Dönme Hızı (RPM)</option>
                <option value="linear">Çizgisel Hız (v - m/s)</option>
            </select>
        </div>
        <div class="hc-form-group" id="hc-ah-rpm-group">
            <label for="hc-ah-rpm">Dakikadaki Devir Sayısı (RPM)</label>
            <input type="number" id="hc-ah-rpm" placeholder="Örn: 3000" step="any">
        </div>
        <div id="hc-ah-linear-group" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-ah-v">Çizgisel Hız (m/s)</label>
                <input type="number" id="hc-ah-v" placeholder="Örn: 20" step="any">
            </div>
            <div class="hc-form-group">
                <label for="hc-ah-r">Yarıçap (m)</label>
                <input type="number" id="hc-ah-r" placeholder="Örn: 0.5" step="any">
            </div>
        </div>
        <button class="hc-btn" onclick="hcAHHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ah-result">
            <div class="hc-result-label">Açısal Hız (ω):</div>
            <div class="hc-result-value" id="hc-ah-val">-</div>
            <div class="hc-result-note" id="hc-ah-note">ω = 2πn/60</div>
        </div>
    </div>
    <?php
}
