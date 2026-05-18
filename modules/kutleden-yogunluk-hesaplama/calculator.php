<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kutleden_yogunluk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kutleden-yogunluk-hesaplama',
        HC_PLUGIN_URL . 'modules/kutleden-yogunluk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kutleden-yogunluk-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kutleden-yogunluk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-m-to-rho">
        <h3>Kütleden Yoğunluk Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-mtr-mass">Kütle (m)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-mtr-mass" placeholder="Örn: 10" value="10" style="flex: 2;">
                <select id="hc-mtr-mass-unit" style="flex: 1;">
                    <option value="kg">Kilogram (kg)</option>
                    <option value="g">Gram (g)</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-mtr-vol">Hacim (V)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-mtr-vol" placeholder="Örn: 5" value="5" style="flex: 2;">
                <select id="hc-mtr-vol-unit" style="flex: 1;">
                    <option value="l">Litre (L)</option>
                    <option value="m3">Metreküp (m³)</option>
                    <option value="cm3">Santimetreküp (cm³)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcKütledenYoğunlukHesapla()">Yoğunluğu Hesapla</button>

        <div class="hc-result" id="hc-kutleden-yogunluk-result">
            <div class="hc-result-label">Hesaplanan Yoğunluk (&rho;):</div>
            <div class="hc-result-value" id="hc-mtr-rho-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Yoğunluk (g/cm³):</strong></td>
                            <td id="hc-mtr-rho-gcm-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Yoğunluk (g/L):</strong></td>
                            <td id="hc-mtr-rho-gl-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
