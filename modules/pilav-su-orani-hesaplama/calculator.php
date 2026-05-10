<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pilav_su_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rice-water',
        HC_PLUGIN_URL . 'modules/pilav-su-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-rice-water-calc">
        <h3>Pilav Su Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-rw-type">Tahıl Türü:</label>
            <select id="hc-rw-type">
                <option value="1.5">Osmancık Pirinç (1:1.5)</option>
                <option value="2">Basmati / Yasemin Pirinç (1:2)</option>
                <option value="1.7">Baldo Pirinç (1:1.7)</option>
                <option value="2">Pilavlık Bulgur (1:2)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-rw-amount">Ölçü (Su Bardağı):</label>
            <input type="number" id="hc-rw-amount" placeholder="2">
        </div>
        <button class="hc-btn" onclick="hcRiceWaterHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-pilav-su-orani-result">
            <strong>Gereken Su Miktarı:</strong>
            <div id="hc-rw-res" class="hc-result-value">-</div>
            <p id="hc-rw-info"></p>
        </div>
    </div>
    <?php
}
