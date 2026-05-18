<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_merkezkac_kuvvet_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-merkezkac-kuvvet-hesaplama',
        HC_PLUGIN_URL . 'modules/merkezkac-kuvvet-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-merkezkac-kuvvet-hesaplama-css',
        HC_PLUGIN_URL . 'modules/merkezkac-kuvvet-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-centrifugal">
        <h3>Merkezkaç Kuvvet Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-cf-mass">Cismin Kütlesi (m - kg)</label>
            <input type="number" id="hc-cf-mass" placeholder="Örn: 5" value="5">
        </div>

        <div class="hc-form-group">
            <label for="hc-cf-r">Dönüş Yarıçapı (r - metre)</label>
            <input type="number" id="hc-cf-r" placeholder="Örn: 2" value="2">
        </div>

        <div class="hc-form-group">
            <label for="hc-cf-speed-type">Hız Giriş Tipi</label>
            <select id="hc-cf-speed-type" onchange="hcCentrifugalSpeedTypeChange()">
                <option value="linear">Çizgisel Hız (v - m/s)</option>
                <option value="angular">Açısal Hız (&omega; - rad/s veya rpm)</option>
            </select>
        </div>

        <div class="hc-form-group" id="hc-cf-linear-group">
            <label for="hc-cf-v">Çizgisel Hız (v - m/s)</label>
            <input type="number" id="hc-cf-v" placeholder="Örn: 15" value="15">
        </div>

        <div class="hc-form-group" id="hc-cf-angular-group" style="display: none;">
            <label for="hc-cf-w">Açısal Hız (&omega;)</label>
            <div style="display: flex; gap: 10px;">
                <input type="number" id="hc-cf-w" placeholder="Örn: 5" value="5" style="flex: 2;">
                <select id="hc-cf-w-unit" style="flex: 1;">
                    <option value="rad">rad/s</option>
                    <option value="rpm">RPM</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcMerkezkaçKuvvetHesapla()">Kuvveti Hesapla</button>

        <div class="hc-result" id="hc-merkezkac-kuvvet-result">
            <div class="hc-result-label">Merkezkaç Kuvveti (Ff):</div>
            <div class="hc-result-value" id="hc-cf-val">-</div>
            
            <div style="margin-top: 15px;">
                <table class="hc-result-table">
                    <tbody>
                        <tr>
                            <td><strong>Merkezkaç İvmesi (af):</strong></td>
                            <td id="hc-cf-accel-val">-</td>
                        </tr>
                        <tr>
                            <td><strong>G-Kuvveti Karşılığı:</strong></td>
                            <td id="hc-cf-g-val">-</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
}
