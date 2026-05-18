<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rms_hiz_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rms-hiz-hesaplama',
        HC_PLUGIN_URL . 'modules/rms-hiz-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rms-hiz-hesaplama-css',
        HC_PLUGIN_URL . 'modules/rms-hiz-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rms-speed">
        <h3>RMS Hız Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-rms-method">Hesaplama Tipi</label>
            <select id="hc-rms-method" onchange="hcRmsMethodChange()">
                <option value="dataset">Hız Değerleri Veri Kümesi Girişi</option>
                <option value="particle">Tekil Parçacık (Boltzman Sabiti & Sıcaklık)</option>
            </select>
        </div>

        <div id="hc-rms-dataset-group">
            <div class="hc-form-group">
                <label for="hc-rms-speeds">Hız Değerleri (Virgül veya boşluk ile ayırın - m/s)</label>
                <textarea id="hc-rms-speeds" placeholder="Örn: 10, 20, 30, 40" rows="3">10, 20, 30, 40</textarea>
            </div>
        </div>

        <div id="hc-rms-particle-group" style="display: none;">
            <div class="hc-form-group">
                <label for="hc-rms-temp">Sıcaklık (°C)</label>
                <input type="number" id="hc-rms-temp" placeholder="Örn: 25" value="25">
            </div>
            <div class="hc-form-group">
                <label for="hc-rms-mass">Tekil Parçacık Kütlesi (kg)</label>
                <input type="text" id="hc-rms-mass" placeholder="Örn: 6.64e-27 (Helyum atomu)" value="6.64e-27">
            </div>
        </div>

        <button class="hc-btn" onclick="hcRMSHızHesapla()">RMS Hızını Hesapla</button>

        <div class="hc-result" id="hc-rms-hiz-result">
            <div class="hc-result-label">RMS Hızı (v_rms):</div>
            <div class="hc-result-value" id="hc-rms-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Aritmetik Ortalama Hız:</strong></td>
                            <td id="hc-rms-avg-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Veri/Örnek Sayısı:</strong></td>
                            <td id="hc-rms-count-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
