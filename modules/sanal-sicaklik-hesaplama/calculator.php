<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sanal_sicaklik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sanal-sicaklik-hesaplama',
        HC_PLUGIN_URL . 'modules/sanal-sicaklik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sanal-sicaklik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/sanal-sicaklik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-virt-temp">
        <h3>Sanal Sıcaklık (Virtual Temperature) Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-vt-temp">Aktüel Hava Sıcaklığı (T - °C)</label>
            <input type="number" id="hc-vt-temp" placeholder="Örn: 30" value="30" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-vt-method">Nem Giriş Tipi</label>
            <select id="hc-vt-method" onchange="hcVtMethodChange()">
                <option value="mixing">Karışım Oranı (w - g/kg)</option>
                <option value="rh">Bağıl Nem (% RH) ve Basınç</option>
            </select>
        </div>

        <div id="hc-vt-mixing-group">
            <div class="hc-form-group">
                <label for="hc-vt-w">Su Buharı Karışım Oranı (w - g/kg kuru hava)</label>
                <input type="number" id="hc-vt-w" placeholder="Örn: 15" value="15" step="0.1">
            </div>
        </div>

        <div id="hc-vt-rh-group" style="display: none;">
            <div class="hc-form-group">
                <label for="hc-vt-rh">Bağıl Nem (% RH)</label>
                <input type="number" id="hc-vt-rh" placeholder="Örn: 60" value="60">
            </div>
            <div class="hc-form-group">
                <label for="hc-vt-p">Toplam Atmosfer Basıncı (hPa / mbar)</label>
                <input type="number" id="hc-vt-p" placeholder="Örn: 1013.25" value="1013.25">
            </div>
        </div>

        <button class="hc-btn" onclick="hcSanalSıcaklıkHesapla()">Sanal Sıcaklığı Hesapla</button>

        <div class="hc-result" id="hc-sanal-sicaklik-result">
            <div class="hc-result-label">Sanal Sıcaklık (Tv):</div>
            <div class="hc-result-value" id="hc-vt-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Sanal Sıcaklık (Kelvin):</strong></td>
                            <td id="hc-vt-k-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Sıcaklık Farkı (Tv - T):</strong></td>
                            <td id="hc-vt-diff-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
