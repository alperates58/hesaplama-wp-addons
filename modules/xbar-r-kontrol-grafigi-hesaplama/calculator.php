<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_xbar_r_kontrol_grafigi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-xbar-r',
        HC_PLUGIN_URL . 'modules/xbar-r-kontrol-grafigi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-xbar-r-css',
        HC_PLUGIN_URL . 'modules/xbar-r-kontrol-grafigi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-xbar-r">
        <h3>Xbar-R Kontrol Limitleri</h3>
        <div class="hc-form-group">
            <label for="hc-xr-xdouble">Toplam Ortalama (X̄̄)</label>
            <input type="number" id="hc-xr-xdouble" value="10.5" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-xr-rbar">Ortalama Açıklık (R̄)</label>
            <input type="number" id="hc-xr-rbar" value="0.8" step="0.01">
        </div>
        <div class="hc-form-group">
            <label for="hc-xr-n">Alt Grup Boyutu (n)</label>
            <select id="hc-xr-n">
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5" selected>5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcXbarRHesapla()">Limitleri Hesapla</button>
        <div class="hc-result" id="hc-xbar-r-result">
            <div class="hc-xr-grid">
                <div class="hc-xr-header">X-Bar Limitleri</div>
                <div class="hc-result-item"> <span>UCL:</span> <b id="hc-res-xr-xucl">0</b> </div>
                <div class="hc-result-item"> <span>LCL:</span> <b id="hc-res-xr-xlcl">0</b> </div>
                <div class="hc-xr-header">R Limitleri</div>
                <div class="hc-result-item"> <span>UCL:</span> <b id="hc-res-xr-rucl">0</b> </div>
                <div class="hc-result-item"> <span>LCL:</span> <b id="hc-res-xr-rlcl">0</b> </div>
            </div>
        </div>
    </div>
    <?php
}
