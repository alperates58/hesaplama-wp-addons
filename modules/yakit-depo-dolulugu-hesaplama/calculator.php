<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yakit_depo_dolulugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fuel-level',
        HC_PLUGIN_URL . 'modules/yakit-depo-dolulugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fl-box">
        <h3>Yakıt Depo Doluluğu Hesaplama</h3>
        <div class="hc-form-group">
            <label>Depo Kapasitesi (Litre)</label>
            <input type="number" id="hc-fl-cap" value="50">
        </div>
        <div class="hc-form-group">
            <label>Gösterge Seviyesi</label>
            <select id="hc-fl-level">
                <option value="1">Tam Dolu (1/1)</option>
                <option value="0.75">Dörtte Üç (3/4)</option>
                <option value="0.5">Yarım (1/2)</option>
                <option value="0.25">Dörtte Bir (1/4)</option>
                <option value="0.125">Çeyrek Altı (1/8)</option>
                <option value="0.05">Rezerv (%5)</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcFlHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-fl-result">
            <div class="hc-result-title">Kalan Yakıt Miktarı:</div>
            <div class="hc-result-value" id="hc-fl-val">-</div>
        </div>
    </div>
    <?php
}
