<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yakit_verimliligi_puani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-efficiency-score',
        HC_PLUGIN_URL . 'modules/yakit-verimliligi-puani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fep-box">
        <h3>Yakıt Verimliliği Sınıfı</h3>
        <div class="hc-form-group">
            <label>Ortalama Tüketim (L/100km)</label>
            <input type="number" step="0.1" id="hc-fep-cons" placeholder="Örn: 6.5">
        </div>
        <button class="hc-btn" onclick="hcFepHesapla()">Sınıfı Belirle</button>
        <div class="hc-result" id="hc-fep-result">
            <div style="text-align: center;">
                <div style="font-size: 14px; color: #666;">Verimlilik Sınıfı:</div>
                <div id="hc-fep-class" style="font-size: 48px; font-weight: bold;">-</div>
            </div>
            <div id="hc-fep-desc" style="margin-top: 15px; text-align: center; font-weight: bold;"></div>
        </div>
    </div>
    <?php
}
