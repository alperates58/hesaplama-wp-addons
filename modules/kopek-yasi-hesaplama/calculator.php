<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kopek_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kopek-yasi',
        HC_PLUGIN_URL . 'modules/kopek-yasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ky-calc">
        <h3>Köpek Yaşı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Köpek Boyutu</label>
            <select id="hc-ky-size">
                <option value="small">Küçük (10 kg altı)</option>
                <option value="medium">Orta (10-25 kg)</option>
                <option value="large">Büyük (25 kg üstü)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Köpek Yaşı</label>
            <input type="number" id="hc-ky-age" value="3">
        </div>
        <button class="hc-btn" onclick="hcKopekYaşıHesapla()">İnsan Yaşına Çevir</button>
        <div class="hc-result" id="hc-ky-result">
            <div class="hc-result-title">Köpeğinizin İnsan Yaşı:</div>
            <div class="hc-result-value" id="hc-ky-val">-</div>
        </div>
    </div>
    <?php
}
