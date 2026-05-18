<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kup_yogunlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kup-yogunlugu-hesaplama',
        HC_PLUGIN_URL . 'modules/kup-yogunlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kup-yogunlugu-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kup-yogunlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kup-yogunlugu">
        <h3>Küp Yoğunluğu Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cube-side">Küpün Bir Kenar Uzunluğu</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-cube-side" placeholder="Örn: 10" value="10" style="flex: 2;">
                <select id="hc-cube-side-unit" style="flex: 1;">
                    <option value="cm">Santimetre (cm)</option>
                    <option value="m">Metre (m)</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-cube-mass">Küpün Kütlesi</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-cube-mass" placeholder="Örn: 2" value="2" style="flex: 2;">
                <select id="hc-cube-mass-unit" style="flex: 1;">
                    <option value="kg">Kilogram (kg)</option>
                    <option value="g">Gram (g)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcKüpYoğunluğuHesapla()">Yoğunluğu Hesapla</button>

        <div class="hc-result" id="hc-kup-yogunlugu-result">
            <div class="hc-result-label">Küpün Yoğunluğu (&rho;):</div>
            <div class="hc-result-value" id="hc-cube-rho-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Küpün Hacmi:</strong></td>
                            <td id="hc-cube-v-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Yoğunluk (g/cm³):</strong></td>
                            <td id="hc-cube-rho-gcm-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Tahmini Malzeme Tipi:</strong></td>
                            <td id="hc-cube-material-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
