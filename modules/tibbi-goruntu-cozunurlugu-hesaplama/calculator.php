<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tibbi_goruntu_cozunurlugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-medical-res',
        HC_PLUGIN_URL . 'modules/tibbi-goruntu-cozunurlugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-medical-res-css',
        HC_PLUGIN_URL . 'modules/tibbi-goruntu-cozunurlugu-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-medical-res">
        <h3>Görüntü Çözünürlüğü (Piksel)</h3>
        <div class="hc-form-group">
            <label for="hc-mr-fov">Görüş Alanı (FOV) [mm]</label>
            <input type="number" id="hc-mr-fov" value="250">
        </div>
        <div class="hc-form-group">
            <label for="hc-mr-matrix">Matris Boyutu (N)</label>
            <select id="hc-mr-matrix">
                <option value="256">256 x 256</option>
                <option value="512" selected>512 x 512</option>
                <option value="1024">1024 x 1024</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcMedicalResHesapla()">Piksel Boyutunu Hesapla</button>
        <div class="hc-result" id="hc-medical-res-result">
            <div class="hc-result-item">
                <span>Piksel Büyüklüğü:</span>
                <span class="hc-result-value" id="hc-res-mr-val">0 mm</span>
            </div>
            <p class="hc-mr-note">Çözünürlük = FOV / Matris</p>
        </div>
    </div>
    <?php
}
