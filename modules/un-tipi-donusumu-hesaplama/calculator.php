<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_un_tipi_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-flour-conv',
        HC_PLUGIN_URL . 'modules/un-tipi-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-flour-conv-calc">
        <h3>Un Tipi ve Su Kaldırma</h3>
        <div class="hc-form-group">
            <label for="hc-fc-type">Hedef Un Tipi:</label>
            <select id="hc-fc-type">
                <option value="white">Beyaz Un (Standart)</option>
                <option value="whole">Tam Buğday Unu</option>
                <option value="rye">Çavdar Unu</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-fc-water">Orijinal Su Miktarı (ml):</label>
            <input type="number" id="hc-fc-water" placeholder="350">
        </div>
        <button class="hc-btn" onclick="hcFlourConvHesapla()">Yeni Su Miktarını Bul</button>
        <div class="hc-result" id="hc-flour-conv-result">
            <strong>Gereken Yeni Su:</strong>
            <div id="hc-fc-res" class="hc-result-value">-</div>
            <p id="hc-fc-info"></p>
        </div>
    </div>
    <?php
}
