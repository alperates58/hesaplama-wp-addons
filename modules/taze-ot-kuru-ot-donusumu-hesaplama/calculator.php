<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_taze_ot_kuru_ot_donusumu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-herb-conv',
        HC_PLUGIN_URL . 'modules/taze-ot-kuru-ot-donusumu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-herb-conv-calc">
        <h3>Baharat Dönüşümü (Taze-Kuru)</h3>
        <div class="hc-form-group">
            <label for="hc-hc-type">Dönüşüm:</label>
            <select id="hc-hc-type">
                <option value="taze-to-kuru">Taze Ot -> Kuru Ot</option>
                <option value="kuru-to-taze">Kuru Ot -> Taze Ot</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-hc-val">Miktar (Yemek Kaşığı):</label>
            <input type="number" id="hc-hc-val" placeholder="3" step="0.5">
        </div>
        <button class="hc-btn" onclick="hcHerbConvHesapla()">Dönüştür</button>
        <div class="hc-result" id="hc-herb-conv-result">
            <strong>Eşdeğer Ölçü:</strong>
            <div id="hc-hc-res" class="hc-result-value">-</div>
            <p id="hc-hc-info"></p>
        </div>
    </div>
    <?php
}
