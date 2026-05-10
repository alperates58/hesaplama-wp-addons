<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kopek_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kopek-yasi',
        HC_PLUGIN_URL . 'modules/kopek-yasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kopek-yasi-css',
        HC_PLUGIN_URL . 'modules/kopek-yasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-kopek-yasi">
        <h3>Köpek Yaşı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ky-dog-age">Köpek Yaşı (Yıl):</label>
            <input type="number" id="hc-ky-dog-age" min="1" max="25" placeholder="5">
        </div>
        <div class="hc-form-group">
            <label for="hc-ky-dog-size">Irk Boyutu:</label>
            <select id="hc-ky-dog-size">
                <option value="small">Küçük (0-10 kg)</option>
                <option value="medium">Orta (10-25 kg)</option>
                <option value="large">Büyük (25-45 kg)</option>
                <option value="giant">Dev (45+ kg)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcKopekYasiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-kopek-yasi-result">
            <strong>İnsan Yaşı Karşılığı:</strong>
            <div id="hc-ky-res-val" class="hc-result-value">-</div>
            <span>Yaş</span>
        </div>
    </div>
    <?php
}
