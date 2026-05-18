<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lc_rezonans_frekansi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lc-rezonans-frekansi-hesaplama',
        HC_PLUGIN_URL . 'modules/lc-rezonans-frekansi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lc-rezonans-frekansi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/lc-rezonans-frekansi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lc-resonant">
        <h3>LC Rezonans Frekansı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-lc-l">İndüktans (L)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-lc-l" placeholder="Örn: 10" value="10" style="flex: 2;">
                <select id="hc-lc-l-unit" style="flex: 1;">
                    <option value="1">&mu;H (Mikrohenry)</option>
                    <option value="1000">mH (Milihenry)</option>
                    <option value="1000000">H (Henry)</option>
                </select>
            </div>
        </div>

        <div class="hc-form-group">
            <label for="hc-lc-c">Kapasitans (C)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-lc-c" placeholder="Örn: 100" value="100" style="flex: 2;">
                <select id="hc-lc-c-unit" style="flex: 1;">
                    <option value="1e-12">pF (Pikofarad)</option>
                    <option value="1e-9">nF (Nanofarad)</option>
                    <option value="1e-6">uF (Mikrofarad)</option>
                    <option value="1">F (Farad)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcLcRezonansFrekansıHesapla()">Rezonans Frekansını Hesapla</button>

        <div class="hc-result" id="hc-lc-rezonans-frekansi-result">
            <div class="hc-result-label">Rezonans Frekansı (f₀):</div>
            <div class="hc-result-value" id="hc-lc-f-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Açısal Frekans (&omega;₀):</strong></td>
                            <td id="hc-lc-w-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Periyot (T):</strong></td>
                            <td id="hc-lc-t-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
