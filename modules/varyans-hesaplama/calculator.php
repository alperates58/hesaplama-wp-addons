<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_varyans_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-variance',
        HC_PLUGIN_URL . 'modules/varyans-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-var">
        <h3>Varyans Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-v-input">Sayılar (Virgülle ayırın):</label>
            <textarea id="hc-v-input" placeholder="10, 12, 23, 23, 16, 23, 21, 16" rows="3"></textarea>
        </div>
        <div class="hc-form-group">
            <label>Tür:</label>
            <select id="hc-v-type">
                <option value="sample">Örneklem Varyansı (s²)</option>
                <option value="population">Popülasyon Varyansı (σ²)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcVarianceHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-varyans-result">
            <strong>Varyans:</strong>
            <div id="hc-v-res-val" class="hc-result-value">-</div>
            <p id="hc-v-sd" style="margin-top:10px; font-size:0.9rem;"></p>
        </div>
    </div>
    <?php
}
