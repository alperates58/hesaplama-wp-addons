<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yuzdenin_yuzdesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pct-of-pct',
        HC_PLUGIN_URL . 'modules/yuzdenin-yuzdesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-pop">
        <h3>Yüzdenin Yüzdesi</h3>
        <div class="hc-form-group">
            <label>Başlangıç Sayısı:</label><input type="number" id="hc-pop-val" placeholder="1000">
        </div>
        <div class="hc-form-group">
            <label>1. Yüzde (%):</label><input type="number" id="hc-pop-p1" placeholder="10">
        </div>
        <div class="hc-form-group">
            <label>2. Yüzde (%):</label><input type="number" id="hc-pop-p2" placeholder="50">
        </div>
        <button class="hc-btn" onclick="hcPctOfPctHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-yuzdenin-yuzdesi-result">
            <strong>Sonuç:</strong>
            <div id="hc-pop-res-val" class="hc-result-value">-</div>
            <p id="hc-pop-desc" style="margin-top:10px;"></p>
        </div>
    </div>
    <?php
}
