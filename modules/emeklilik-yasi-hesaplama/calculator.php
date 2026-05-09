<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_emeklilik_yasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-emeklilik-yasi',
        HC_PLUGIN_URL . 'modules/emeklilik-yasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-ey-calc">
        <h3>Emeklilik Yaşı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Cinsiyet</label>
            <select id="hc-ey-gender">
                <option value="female">Kadın</option>
                <option value="male">Erkek</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Doğum Tarihi</label>
            <input type="date" id="hc-ey-birth" value="1990-01-01">
        </div>
        <div class="hc-form-group">
            <label>Sigorta Başlangıç Yılı</label>
            <input type="number" id="hc-ey-entry" value="2010">
        </div>
        <button class="hc-btn" onclick="hcEmeklilikHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ey-result">
            <div class="hc-form-group">
                <label>Emeklilik Yaşınız:</label>
                <div class="hc-result-value" id="hc-ey-val">-</div>
            </div>
            <div id="hc-ey-info" style="font-size: 13px; color: var(--hc-front-muted); margin-top: 10px;"></div>
        </div>
    </div>
    <?php
}
