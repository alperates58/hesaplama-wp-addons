<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yks_net_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-yks-pct',
        HC_PLUGIN_URL . 'modules/yks-net-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yks-p">
        <h3>YKS Net Yüzdesi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-yp-net">Yaptığınız Toplam Net:</label>
            <input type="number" id="hc-yp-net" step="0.25" placeholder="85.5">
        </div>
        <div class="hc-form-group">
            <label for="hc-yp-total">Toplam Soru Sayısı:</label>
            <select id="hc-yp-total">
                <option value="120">TYT (120 Soru)</option>
                <option value="80">AYT (80 Soru)</option>
                <option value="200">Toplam (200 Soru)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcYksPctHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yks-net-result">
            <strong>Net Yüzdesi:</strong>
            <div id="hc-yp-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
