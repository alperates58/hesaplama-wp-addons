<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yumurta_haslama_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-egg-boil',
        HC_PLUGIN_URL . 'modules/yumurta-haslama-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-egg-boil-calc">
        <h3>Mükemmel Yumurta Zamanlayıcı</h3>
        <div class="hc-form-group">
            <label for="hc-eb-style">İstediğiniz Kıvam:</label>
            <select id="hc-eb-style">
                <option value="4">Rafadan (Akı pişmiş, sarısı sıvı - 4 dk)</option>
                <option value="6">Kayısı (Sarısı kremsi - 6 dk)</option>
                <option value="10">Katı (Tam pişmiş - 10 dk)</option>
                <option value="12">Çok Katı (12 dk)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcEggBoilHesapla()">Süreyi Gör</button>
        <div class="hc-result" id="hc-egg-boil-result">
            <strong>İdeal Süre:</strong>
            <div id="hc-eb-val" class="hc-result-value">-</div>
            <p id="hc-eb-info"></p>
        </div>
    </div>
    <?php
}
