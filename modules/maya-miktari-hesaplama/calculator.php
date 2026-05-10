<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maya_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yeast-amount',
        HC_PLUGIN_URL . 'modules/maya-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yeast-calc">
        <h3>Maya Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yeast-flour">Un Miktarı (g):</label>
            <input type="number" id="hc-yeast-flour" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-yeast-type">Maya Türü:</label>
            <select id="hc-yeast-type">
                <option value="1">Instant Maya (%1)</option>
                <option value="1.5">Aktif Kuru Maya (%1.5)</option>
                <option value="3">Yaş Maya (%3)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcYeastAmountHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yeast-result">
            <strong>Gereken Maya:</strong>
            <div id="hc-yeast-val" class="hc-result-value">-</div>
            <p id="hc-yeast-info"></p>
        </div>
    </div>
    <?php
}
