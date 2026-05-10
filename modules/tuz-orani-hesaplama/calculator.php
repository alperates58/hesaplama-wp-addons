<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tuz_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-salt-ratio',
        HC_PLUGIN_URL . 'modules/tuz-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-salt-ratio-calc">
        <h3>İdeal Tuz Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-sr-total">Toplam Ağırlık (g):</label>
            <input type="number" id="hc-sr-total" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-sr-type">Gıda Türü:</label>
            <select id="hc-sr-type">
                <option value="2">Ekmek / Hamur İşi (%2)</option>
                <option value="1.5">Yemek / Çorba (%1.5)</option>
                <option value="1">Az Tuzlu (%1)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcSaltRatioHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-salt-ratio-result">
            <strong>Gereken Tuz:</strong>
            <div id="hc-sr-val" class="hc-result-value">-</div>
            <p id="hc-sr-info"></p>
        </div>
    </div>
    <?php
}
