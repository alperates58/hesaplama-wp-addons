<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hamur_yag_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dough-fat',
        HC_PLUGIN_URL . 'modules/hamur-yag-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dough-fat-calc">
        <h3>Hamur Yağ Oranı</h3>
        <div class="hc-form-group">
            <label for="hc-fat-flour">Un Miktarı (g):</label>
            <input type="number" id="hc-fat-flour" placeholder="500">
        </div>
        <div class="hc-form-group">
            <label for="hc-fat-pct">Yağ Oranı (%):</label>
            <input type="number" id="hc-fat-pct" placeholder="20">
            <small>Fırıncı yüzdesi (Unun ağırlığına göre yağ %'si)</small>
        </div>
        <button class="hc-btn" onclick="hcDoughFatHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dough-fat-result">
            <strong>Gereken Yağ:</strong>
            <div id="hc-fat-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
