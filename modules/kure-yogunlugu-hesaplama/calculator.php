<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kure_yogunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kure-yogunlugu-hesaplama',
        HC_PLUGIN_URL . 'modules/kure-yogunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kure-yogunlugu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kure-yogunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kure-yogunlugu">
        <h3>Küre Yoğunluğu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-sphere-dim-type">Boyut Girdi Türü</label>
            <select id="hc-sphere-dim-type" onchange="hcSphereDimTypeChange()">
                <option value="radius">Yarıçap (r)</option>
                <option value="diameter">Çap (d)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-sphere-dim" id="hc-sphere-dim-label">Kürenin Yarıçapı</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-sphere-dim" placeholder="Örn: 5" value="5" style="flex: 2;">
                <select id="hc-sphere-dim-unit" style="flex: 1;">
                    <option value="cm">Santimetre (cm)</option>
                    <option value="m">Metre (m)</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-sphere-mass">Kürenin Kütlesi</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-sphere-mass" placeholder="Örn: 500" value="500" style="flex: 2;">
                <select id="hc-sphere-mass-unit" style="flex: 1;">
                    <option value="g">Gram (g)</option>
                    <option value="kg">Kilogram (kg)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcKüreYoğunluğuHesapla()">Yoğunluğu Hesapla</button>

        <div class="hc-result" id="hc-kure-yogunlugu-result">
            <div class="hc-result-label">Kürenin Yoğunluğu (&rho;):</div>
            <div class="hc-result-value" id="hc-sphere-rho-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Kürenin Hacmi:</strong></td>
                            <td id="hc-sphere-v-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Yoğunluk (g/cm³):</strong></td>
                            <td id="hc-sphere-rho-gcm-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Tahmini Malzeme Tipi:</strong></td>
                            <td id="hc-sphere-material-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
