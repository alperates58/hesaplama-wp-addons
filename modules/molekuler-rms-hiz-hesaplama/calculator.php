<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_molekuler_rms_hiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-molekuler-rms-hiz-hesaplama',
        HC_PLUGIN_URL . 'modules/molekuler-rms-hiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-molekuler-rms-hiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/molekuler-rms-hiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-m-rms">
        <h3>Moleküler RMS Hız Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mrms-gas">Gaz Seçimi</label>
            <select id="hc-mrms-gas" onchange="hcMrmsGasChange()">
                <option value="0.004">Helyum (He) - 4 g/mol</option>
                <option value="0.028" selected>Azot (N₂) - 28 g/mol</option>
                <option value="0.032">Oksijen (O₂) - 32 g/mol</option>
                <option value="0.044">Karbondioksit (CO₂) - 44 g/mol</option>
                <option value="0.002">Hidrojen (H₂) - 2 g/mol</option>
                <option value="custom">Özel Gaz (Molar Kütle Girişi)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-mrms-custom-molar-group" style="display: none;">
            <label for="hc-mrms-m">Gazın Molar Kütlesi (g/mol)</label>
            <input type="number" id="hc-mrms-m" placeholder="Örn: 28" value="28">
        </div>

        <div class="hc-form-group">
            <label for="hc-mrms-temp">Sıcaklık (°C)</label>
            <input type="number" id="hc-mrms-temp" placeholder="Örn: 25" value="25">
        </div>

        <button class="hc-btn" onclick="hcMolekülerRMSHızHesapla()">RMS Hızını Hesapla</button>

        <div class="hc-result" id="hc-molekuler-rms-hiz-result">
            <div class="hc-result-label">Moleküler RMS Hızı (v_rms):</div>
            <div class="hc-result-value" id="hc-mrms-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Sıcaklık (Kelvin - K):</strong></td>
                            <td id="hc-mrms-kelvin-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Hız (km/sa):</strong></td>
                            <td id="hc-mrms-kmh-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
