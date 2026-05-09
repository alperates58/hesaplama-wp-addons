<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_doppler_etkisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-doppler-etkisi-hesaplama',
        HC_PLUGIN_URL . 'modules/doppler-etkisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-doppler-etkisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/doppler-etkisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-doppler-etkisi-hesaplama">
        <h3>Doppler Etkisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-de-fs">Kaynak Frekansı (Hz)</label>
            <input type="number" id="hc-de-fs" placeholder="Örn: 440" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-de-v">Ses Hızı (m/s - Havada ≈343)</label>
            <input type="number" id="hc-de-v" value="343" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-de-vo">Gözlemci Hızı (m/s - Kaynağa doğru +)</label>
            <input type="number" id="hc-de-vo" value="0" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-de-vs">Kaynak Hızı (m/s - Gözlemciye doğru +)</label>
            <input type="number" id="hc-de-vs" value="0" step="any">
        </div>
        <button class="hc-btn" onclick="hcDEHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-de-result">
            <div class="hc-result-label">Algılanan Frekans (f_obs):</div>
            <div class="hc-result-value" id="hc-de-val">-</div>
            <div class="hc-result-note">f_obs = f_s * (v + v_obs) / (v - v_s)</div>
        </div>
    </div>
    <?php
}
