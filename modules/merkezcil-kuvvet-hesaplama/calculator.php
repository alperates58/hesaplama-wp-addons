<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_merkezcil_kuvvet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-merkezcil-kuvvet-hesaplama',
        HC_PLUGIN_URL . 'modules/merkezcil-kuvvet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-merkezcil-kuvvet-hesaplama-css',
        HC_PLUGIN_URL . 'modules/merkezcil-kuvvet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-centripetal">
        <h3>Merkezcil Kuvvet Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-c-mass">Cismin Kütlesi (m - kg)</label>
            <input type="number" id="hc-c-mass" placeholder="Örn: 2" value="2">
        </div>

        <div class="hc-form-group">
            <label for="hc-c-r">Dairesel Yörünge Yarıçapı (r - metre)</label>
            <input type="number" id="hc-c-r" placeholder="Örn: 5" value="5">
        </div>

        <div class="hc-form-group">
            <label for="hc-c-speed-type">Hız Giriş Tipi</label>
            <select id="hc-c-speed-type" onchange="hcCentripetalSpeedTypeChange()">
                <option value="linear">Çizgisel Hız (v - m/s)</option>
                <option value="angular">Açısal Hız (&omega; - rad/s veya rpm)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-c-linear-group">
            <label for="hc-c-v">Çizgisel Hız (v - m/s)</label>
            <input type="number" id="hc-c-v" placeholder="Örn: 10" value="10">
        </div>

        <div class="hc-form-group" id="hc-c-angular-group" style="display: none;">
            <label for="hc-c-w">Açısal Hız (&omega;)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-c-w" placeholder="Örn: 2" value="2" style="flex: 2;">
                <select id="hc-c-w-unit" style="flex: 1;">
                    <option value="rad">rad/s (Radyan/Saniye)</option>
                    <option value="rpm">RPM (Devir/Dakika)</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcMerkezcilKuvvetHesapla()">Kuvveti Hesapla</button>

        <div class="hc-result" id="hc-merkezcil-kuvvet-result">
            <div class="hc-result-label">Merkezcil Kuvvet (Fc):</div>
            <div class="hc-result-value" id="hc-c-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Merkezcil İvme (ac):</strong></td>
                            <td id="hc-c-accel-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>Hız Karşılığı:</strong></td>
                            <td id="hc-c-speed-equivalent-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
