<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kirilma_indisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kirilma-indisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kirilma-indisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kirilma-indisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kirilma-indisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-refractive-index">
        <h3>Kırılma İndisi Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ri-type">Hesaplama Yöntemi</label>
            <select id="hc-ri-method" onchange="hcRefractiveMethodChange()">
                <option value="velocity">Işık Hızı (v)</option>
                <option value="snell">Snell Yasası (Açı)</option>
            </select>
        </div>

        <div id="hc-ri-velocity-fields">
            <div class="hc-form-group">
                <label for="hc-ri-v">Ortamdaki Işık Hızı (10^8 m/s)</label>
                <input type="number" id="hc-ri-v" placeholder="Örn: 2.25">
            </div>
        </div>

        <div id="hc-ri-snell-fields" style="display:none;">
            <div class="hc-form-group">
                <label for="hc-ri-angle1">Geliş Açısı (Derece)</label>
                <input type="number" id="hc-ri-angle1" placeholder="Örn: 45">
            </div>
            <div class="hc-form-group">
                <label for="hc-ri-angle2">Kırılma Açısı (Derece)</label>
                <input type="number" id="hc-ri-angle2" placeholder="Örn: 30">
            </div>
            <div class="hc-form-group">
                <label for="hc-ri-n1">Birinci Ortam İndisi (n1)</label>
                <input type="number" id="hc-ri-n1" value="1.0003" placeholder="Hava ~1.0">
            </div>
        </div>

        <button class="hc-btn" onclick="hcKırılmaİndisiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ri-result">
            <div class="hc-result-label">Kırılma İndisi (n):</div>
            <div class="hc-result-value" id="hc-ri-val">-</div>
        </div>
    </div>
    <?php
}
