<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iv_akis_hizi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iv-flow',
        HC_PLUGIN_URL . 'modules/iv-akis-hizi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-iv-flow">
        <h3>İV Akış Hızı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label>Toplam Hacim (ml)</label>
            <input type="number" id="hc-iv-vol" placeholder="ml" step="10">
        </div>
        
        <div class="hc-form-group">
            <label>Uygulama Süresi (Saat)</label>
            <input type="number" id="hc-iv-hours" placeholder="Saat" step="0.5">
        </div>
        
        <div class="hc-form-group">
            <label>Damla Faktörü (gtt/ml)</label>
            <select id="hc-iv-factor">
                <option value="10">10 (Makroset)</option>
                <option value="15">15 (Standart)</option>
                <option value="20" selected>20 (Standart)</option>
                <option value="60">60 (Mikroset)</option>
            </select>
        </div>
        
        <button class="hc-btn" onclick="hcIvFlowHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-iv-result">
            <div style="padding: 5px 0;">
                <span>Akış Hızı:</span>
                <strong id="hc-iv-res-gtt" style="float:right;">0 damla/dak</strong>
            </div>
            <div style="padding: 5px 0; border-top: 1px solid #eee;">
                <span>İnfüzyon Hızı:</span>
                <strong id="hc-iv-res-mlhr" style="float:right;">0 ml/saat</strong>
            </div>
        </div>
    </div>
    <?php
}
