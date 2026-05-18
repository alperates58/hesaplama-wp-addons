<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_potansiyel_enerji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-potansiyel-enerji-hesaplama',
        HC_PLUGIN_URL . 'modules/potansiyel-enerji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-potansiyel-enerji-hesaplama-css',
        HC_PLUGIN_URL . 'modules/potansiyel-enerji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pot-energy">
        <h3>Potansiyel Enerji Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pe-type">Potansiyel Enerji Türü</label>
            <select id="hc-pe-type" onchange="hcPeTypeChange()">
                <option value="grav">Yerçekimi Potansiyel Enerjisi (m·g·h)</option>
                <option value="elastic">Esneklik Potansiyel Enerjisi (½·k·x²)</option>
            </select>
        </div>

        <!-- Yerçekimi Potansiyeli için -->
        <div id="hc-pe-grav-fields">
            <div class="hc-form-group">
                <label for="hc-pe-mass">Cismin Kütlesi (m - kg)</label>
                <input type="number" id="hc-pe-mass" placeholder="Örn: 5" value="5">
            </div>
            <div class="hc-form-group">
                <label for="hc-pe-height">Yükseklik (h - metre)</label>
                <input type="number" id="hc-pe-height" placeholder="Örn: 10" value="10">
            </div>
            <div class="hc-form-group">
                <label for="hc-pe-planet">Gök Cismi (Yerçekimi İvmesi)</label>
                <select id="hc-pe-planet">
                    <option value="9.80665">Dünya (9.81 m/s²)</option>
                    <option value="1.62">Ay (1.62 m/s²)</option>
                    <option value="3.71">Mars (3.71 m/s²)</option>
                    <option value="24.79">Jüpiter (24.79 m/s²)</option>
                </select>
            </div>
        </div>

        <!-- Esneklik Potansiyeli için -->
        <div id="hc-pe-elastic-fields" style="display: none;">
            <div class="hc-form-group">
                <label for="hc-pe-k">Yay Sabiti (k - N/m)</label>
                <input type="number" id="hc-pe-k" placeholder="Örn: 200" value="200">
            </div>
            <div class="hc-form-group">
                <label for="hc-pe-x">Sıkışma / Gerilme Miktarı (x - cm)</label>
                <input type="number" id="hc-pe-x" placeholder="Örn: 10" value="10">
            </div>
        </div>

        <button class="hc-btn" onclick="hcPotansiyelEnerjiHesapla()">Enerjiyi Hesapla</button>

        <div class="hc-result" id="hc-potansiyel-enerji-result">
            <div class="hc-result-label">Hesaplanan Potansiyel Enerji (Ep):</div>
            <div class="hc-result-value" id="hc-pe-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Kilojoule (kJ) Karşılığı:</strong></td>
                            <td id="hc-pe-kj-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Kalori (cal) Karşılığı:</strong></td>
                            <td id="hc-pe-cal-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
