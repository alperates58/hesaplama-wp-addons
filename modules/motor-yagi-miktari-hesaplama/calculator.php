<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_motor_yagi_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-oil-capacity',
        HC_PLUGIN_URL . 'modules/motor-yagi-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-oc-box">
        <h3>Motor Yağı Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Motor Hacmi (cc)</label>
            <input type="number" id="hc-oc-cc" placeholder="1600">
        </div>
        <div class="hc-form-group">
            <label>Silindir Sayısı</label>
            <select id="hc-oc-cyl">
                <option value="3">3 Silindir</option>
                <option value="4" selected>4 Silindir</option>
                <option value="6">6 Silindir</option>
                <option value="8">8 Silindir</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcOcHesapla()">Kapasiteyi Hesapla</button>
        <div class="hc-result" id="hc-oc-result">
            <div class="hc-result-title">Tahmini Yağ Kapasitesi:</div>
            <div class="hc-result-value" id="hc-oc-val">-</div>
            <p style="font-size: 0.8em; color: #888;">* Bu değer bir tahmindir. Kesin miktar için araç kullanım kılavuzuna bakın.</p>
        </div>
    </div>
    <?php
}
