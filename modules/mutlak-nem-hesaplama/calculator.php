<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_mutlak_nem_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-mutlak-nem-hesaplama',
        HC_PLUGIN_URL . 'modules/mutlak-nem-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-mutlak-nem-hesaplama-css',
        HC_PLUGIN_URL . 'modules/mutlak-nem-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-abs-humidity">
        <h3>Mutlak Nem Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ah-temp">Hava Sıcaklığı (°C)</label>
            <input type="number" id="hc-ah-temp" placeholder="Örn: 25" value="25" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ah-rh">Bağıl Nem (% RH)</label>
            <input type="number" id="hc-ah-rh" placeholder="Örn: 60" value="60" min="0" max="100">
        </div>

        <button class="hc-btn" onclick="hcMutlakNemHesapla()">Mutlak Nemi Hesapla</button>

        <div class="hc-result" id="hc-mutlak-nem-result">
            <div class="hc-result-label">Mutlak Nem (AH):</div>
            <div class="hc-result-value" id="hc-ah-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Doymuş Buhar Basıncı (es):</strong></td>
                            <td id="hc-ah-es-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Aktüel Buhar Basıncı (e):</strong></td>
                            <td id="hc-ah-e-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Çiy Noktası (Tahmini):</strong></td>
                            <td id="hc-ah-dewpoint-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
