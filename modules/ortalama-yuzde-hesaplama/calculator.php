<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ortalama_yuzde_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-avg-percent',
        HC_PLUGIN_URL . 'modules/ortalama-yuzde-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-avg-percent">
        <h3>Ortalama Yüzde Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ap-input">Yüzdeleri Girin (Virgülle ayırın, % işareti koymayın):</label>
            <input type="text" id="hc-ap-input" placeholder="10, 20, 50">
        </div>
        <button class="hc-btn" onclick="hcAvgPercentHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-avg-percent-result">
            <strong>Ortalama:</strong>
            <div id="hc-ap-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
