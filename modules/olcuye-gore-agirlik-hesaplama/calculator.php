<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_olcuye_gore_agirlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dim-weight',
        HC_PLUGIN_URL . 'modules/olcuye-gore-agirlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-dim-weight-css',
        HC_PLUGIN_URL . 'modules/olcuye-gore-agirlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dim-weight">
        <h3>Ölçüye Göre Ağırlık Hesabı</h3>
        <div class="hc-dim-grid">
            <div class="hc-form-group">
                <label>Genişlik (cm):</label>
                <input type="number" id="hc-dw-w" placeholder="10">
            </div>
            <div class="hc-form-group">
                <label>Uzunluk (cm):</label>
                <input type="number" id="hc-dw-l" placeholder="20">
            </div>
            <div class="hc-form-group">
                <label>Yükseklik/Kalınlık (cm):</label>
                <input type="number" id="hc-dw-h" placeholder="5">
            </div>
            <div class="hc-form-group">
                <label>Malzeme:</label>
                <select id="hc-dw-mat">
                    <option value="7850">Çelik (7850 kg/m³)</option>
                    <option value="2700">Alüminyum (2700 kg/m³)</option>
                    <option value="600">Ahşap (~600 kg/m³)</option>
                    <option value="1200">Plastik (~1200 kg/m³)</option>
                    <option value="2500">Cam (2500 kg/m³)</option>
                </select>
            </div>
        </div>
        <button class="hc-btn" onclick="hcDimWeightHesapla()">Ağırlığı Hesapla</button>
        <div class="hc-result" id="hc-dim-weight-result">
            <strong>Toplam Ağırlık:</strong>
            <div id="hc-dw-res-val" class="hc-result-value">-</div>
            <span>Kilogram (kg)</span>
        </div>
    </div>
    <?php
}
