<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_karburator_debisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-carb-flow',
        HC_PLUGIN_URL . 'modules/karburator-debisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cfm-box">
        <h3>Karbüratör Debisi (CFM) Hesaplama</h3>
        <div class="hc-form-group">
            <label>Motor Hacmi (Cubic Inch - CID)</label>
            <input type="number" id="hc-cfm-cid" placeholder="350">
        </div>
        <div class="hc-form-group">
            <label>Maksimum Devir (RPM)</label>
            <input type="number" id="hc-cfm-rpm" placeholder="6000">
        </div>
        <div class="hc-form-group">
            <label>Volumetrik Verim (VE %)</label>
            <input type="number" id="hc-cfm-ve" value="85">
        </div>
        <button class="hc-btn" onclick="hcCfmHesapla()">CFM Hesapla</button>
        <div class="hc-result" id="hc-cfm-result">
            <div class="hc-result-title">İdeal Karbüratör Kapasitesi:</div>
            <div class="hc-result-value" id="hc-cfm-val">-</div>
            <p style="font-size: 0.8em; color: #888; margin-top: 15px;">* Standart yol araçları için %80-85, performanslı araçlar için %90+ VE seçilmelidir.</p>
        </div>
    </div>
    <?php
}
