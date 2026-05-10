<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yemek_servis_sicakligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-serve-temp',
        HC_PLUGIN_URL . 'modules/yemek-servis-sicakligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-serve-temp-calc">
        <h3>İdeal Servis Sıcaklıkları</h3>
        <div class="hc-form-group">
            <label for="hc-st-type">Yemek / İçecek:</label>
            <select id="hc-st-type">
                <option value="soup">Sıcak Çorba</option>
                <option value="roast">Izgara Etler</option>
                <option value="white-wine">Beyaz Şarap</option>
                <option value="red-wine">Kırmızı Şarap</option>
                <option value="coffee">Kahve / Çay</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcServeTempHesapla()">Sıcaklığı Gör</button>
        <div class="hc-result" id="hc-serve-temp-result">
            <strong>Önerilen Sıcaklık:</strong>
            <div id="hc-st-val" class="hc-result-value">-</div>
            <p id="hc-st-info"></p>
        </div>
    </div>
    <?php
}
