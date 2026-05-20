<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gimbal_titresim_frekansı_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gimbal-titresim-frekansı-hesaplama',
        HC_PLUGIN_URL . 'modules/gimbal-titresim-frekansı-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gimbal-titresim-frekansı-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gimbal-titresim-frekansı-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gimbal-titresim-frekansı-hesaplama">
        <h3>Gimbal Titreşim Frekansı Hesaplama</h3>

        <div class="hc-form-group">
            <label for="hc-gimbal-moment">Moment (kg·m)</label>
            <input type="number" id="hc-gimbal-moment" class="hc-input" placeholder="Örn: 0.5" value="0.5" min="0.1" step="0.1">
        </div>

        <div class="hc-form-group">
            <label for="hc-gimbal-damping">Sönümleme Katsayısı (N·s/m)</label>
            <input type="number" id="hc-gimbal-damping" class="hc-input" placeholder="Örn: 0.1" value="0.1" min="0.01" step="0.01">
        </div>

        <div class="hc-form-group">
            <label for="hc-gimbal-source">Titreşim Kaynağı</label>
            <select id="hc-gimbal-source" class="hc-select">
                <option value="drone">Drone (20-50 Hz)</option>
                <option value="vehicle">Araç (10-30 Hz)</option>
                <option value="handheld" selected>El Kamerası (1-10 Hz)</option>
                <option value="structural">Yapısal (5-100 Hz)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcGimbalTitresimFrekansıHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gimbal-titresim-frekansı-hesaplama-result">
            <div class="hc-result-item">
                <span>Doğal Frekans:</span>
                <strong id="hc-gimbal-natural-freq-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Sönümleme Oranı:</span>
                <strong id="hc-gimbal-damping-ratio-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Rezonans Frekansı:</span>
                <strong id="hc-gimbal-resonance-val">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Tavsiye:</span>
                <strong id="hc-gimbal-recommendation-val">-</strong>
            </div>
        </div>
    </div>
    <?php
}
