<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_rakima_gore_hava_basinci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rakima-gore-hava-basinci-hesaplama',
        HC_PLUGIN_URL . 'modules/rakima-gore-hava-basinci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rakima-gore-hava-basinci-hesaplama-css',
        HC_PLUGIN_URL . 'modules/rakima-gore-hava-basinci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-alt-pressure">
        <h3>Rakıma Göre Hava Basıncı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ap-alt">Rakım / Deniz Seviyesinden Yükseklik (metre - m)</label>
            <input type="number" id="hc-ap-alt" placeholder="Örn: 800" value="800">
        </div>

        <button class="hc-btn" onclick="hcRakımaGöreHavaBasıncıHesapla()">Hava Basıncını Hesapla</button>

        <div class="hc-result" id="hc-rakima-gore-hava-basinci-result">
            <div class="hc-result-label">Tahmini Standart Hava Basıncı:</div>
            <div class="hc-result-value" id="hc-ap-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Kilopaskal (kPa):</strong></td>
                            <td id="hc-ap-kpa-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Milimetre Civa (mmHg - Torr):</strong></td>
                            <td id="hc-ap-mmhg-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Atmosfer (atm):</strong></td>
                            <td id="hc-ap-atm-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Deniz Seviyesi Basınç Oranı:</strong></td>
                            <td id="hc-ap-ratio-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
