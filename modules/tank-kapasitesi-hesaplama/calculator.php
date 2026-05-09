<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tank_kapasitesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tank-cap',
        HC_PLUGIN_URL . 'modules/tank-kapasitesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tank-cap-css',
        HC_PLUGIN_URL . 'modules/tank-kapasitesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tank-cap">
        <h3>Tank Hacim Hesaplayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-tc-shape">Tank Şekli</label>
            <select id="hc-tc-shape" onchange="hcToggleTankInputs()">
                <option value="cyl">Silindirik (Dikey)</option>
                <option value="rect">Dikdörtgen / Kare</option>
            </select>
        </div>
        <div id="hc-tc-cyl-inputs">
            <div class="hc-form-group">
                <label for="hc-tc-dia">Çap [m]</label>
                <input type="number" id="hc-tc-dia" value="2" step="0.1">
            </div>
            <div class="hc-form-group">
                <label for="hc-tc-h">Yükseklik [m]</label>
                <input type="number" id="hc-tc-h" value="3" step="0.1">
            </div>
        </div>
        <div id="hc-tc-rect-inputs" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-tc-l">Boy [m]</label>
                <input type="number" id="hc-tc-l" value="2">
            </div>
            <div class="hc-form-group">
                <label for="hc-tc-w">En [m]</label>
                <input type="number" id="hc-tc-w" value="2">
            </div>
            <div class="hc-form-group">
                <label for="hc-tc-rh">Yükseklik [m]</label>
                <input type="number" id="hc-tc-rh" value="2">
            </div>
        </div>
        <button class="hc-btn" onclick="hcTankCapHesapla()">Hacmi Hesapla</button>
        <div class="hc-result" id="hc-tank-cap-result">
            <div class="hc-result-item">
                <span>Toplam Hacim:</span>
                <span class="hc-result-value" id="hc-res-tc-val">0 m³</span>
            </div>
            <div class="hc-result-item">
                <span>Litre Cinsinden:</span>
                <span id="hc-res-tc-lit">0 L</span>
            </div>
        </div>
    </div>
    <?php
}
