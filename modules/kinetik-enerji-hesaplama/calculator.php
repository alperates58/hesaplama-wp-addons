<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kinetik_enerji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kinetik-enerji-hesaplama',
        HC_PLUGIN_URL . 'modules/kinetik-enerji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kinetik-enerji-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kinetik-enerji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kinetik-enerji">
        <h3>Kinetik Enerji Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ke-mass">Cismin Kütlesi (kg)</label>
            <input type="number" id="hc-ke-mass" placeholder="Örn: 80" value="80">
        </div>

        <div class="hc-form-group">
            <label for="hc-ke-velocity">Cismin Hızı</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-ke-velocity" placeholder="Örn: 20" value="20" style="flex: 2;">
                <select id="hc-ke-v-unit" style="flex: 1;">
                    <option value="ms">m/s (Metre/Saniye)</option>
                    <option value="kms">km/sa (Kilometre/Saat)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcKinetikEnerjiHesapla()">Kinetik Enerjiyi Hesapla</button>

        <div class="hc-result" id="hc-kinetik-enerji-result">
            <div class="hc-result-label">Kinetik Enerji (Ek):</div>
            <div class="hc-result-value" id="hc-ke-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>KiloJoule (kJ):</strong></td>
                            <td id="hc-ke-kj-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>MegaJoule (MJ):</strong></td>
                            <td id="hc-ke-mj-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Watt-saat (Wh):</strong></td>
                            <td id="hc-ke-wh-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
