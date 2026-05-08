<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vardiya_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vardiya-hesaplama',
        HC_PLUGIN_URL . 'modules/vardiya-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vardiya-calc">
        <h3>Vardiya Hesaplama</h3>
        <div class="hc-form-group">
            <label>Vardiya Tipi</label>
            <select id="hc-vh-type" onchange="hcVardiyaUpdate()">
                <option value="8">8 Saatlik Vardiya (3lü)</option>
                <option value="12">12 Saatlik Vardiya (2li)</option>
                <option value="custom">Özel Vardiya</option>
            </select>
        </div>
        <div id="hc-vh-custom-fields" style="display: none;">
            <div class="hc-form-group">
                <label>Başlangıç Saati</label>
                <input type="time" id="hc-vh-start" value="08:00">
            </div>
            <div class="hc-form-group">
                <label>Süre (Saat)</label>
                <input type="number" id="hc-vh-duration" value="8">
            </div>
        </div>
        <button class="hc-btn" onclick="hcVardiyaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vh-result">
            <div class="hc-result-title">Vardiya Saatleri:</div>
            <div id="hc-vh-val" style="font-size: 14px; line-height: 1.6;">-</div>
        </div>
    </div>
    <?php
}
