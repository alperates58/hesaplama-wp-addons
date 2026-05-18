<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sarkac_frekansi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sarkac-frekansi-hesaplama',
        HC_PLUGIN_URL . 'modules/sarkac-frekansi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sarkac-frekansi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/sarkac-frekansi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pend-freq">
        <h3>Sarkaç Frekansı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pf-length">Sarkaç İp Uzunluğu (L - cm)</label>
            <input type="number" id="hc-pf-length" placeholder="Örn: 100" value="100">
        </div>

        <div class="hc-form-group">
            <label for="hc-pf-planet">Bulunulan Gök Cismi (Yerçekimi)</label>
            <select id="hc-pf-planet">
                <option value="9.80665">Dünya (g = 9.81 m/s²)</option>
                <option value="1.62">Ay (g = 1.62 m/s²)</option>
                <option value="3.71">Mars (g = 3.71 m/s²)</option>
                <option value="24.79">Jüpiter (g = 24.79 m/s²)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSarkaçFrekansıHesapla()">Sarkaç Frekansını Hesapla</button>

        <div class="hc-result" id="hc-sarkac-frekansi-result">
            <div class="hc-result-label">Salınım Frekansı (f):</div>
            <div class="hc-result-value" id="hc-pf-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Açısal Frekans (&omega;):</strong></td>
                            <td id="hc-pf-angular-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Sarkaç Periyodu (T):</strong></td>
                            <td id="hc-pf-period-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
