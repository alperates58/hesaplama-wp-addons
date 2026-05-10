<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_takdir_tesekkur_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-certificate',
        HC_PLUGIN_URL . 'modules/takdir-tesekkur-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-cert">
        <h3>Takdir Teşekkür Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-c-avg">Dönem Sonu Not Ortalaması:</label>
            <input type="number" id="hc-c-avg" step="0.01" min="0" max="100" placeholder="82.50">
        </div>
        <div class="hc-form-group">
            <label>Tüm derslerin zayıfsız mı?</label>
            <select id="hc-c-fail">
                <option value="no">Evet, zayıfım yok</option>
                <option value="yes">Hayır, zayıfım var</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcCertHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-takdir-tesekkur-result">
            <strong>Belge Durumu:</strong>
            <div id="hc-c-res-val" class="hc-result-value">-</div>
            <p id="hc-c-desc" style="margin-top:10px; font-weight:bold;"></p>
        </div>
    </div>
    <?php
}
