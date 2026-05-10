<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zar_olasiligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-dice-prob',
        HC_PLUGIN_URL . 'modules/zar-olasiligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-dice">
        <h3>Zar Olasılığı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Zar Sayısı:</label>
            <select id="hc-dp-count">
                <option value="1">1 Zar</option>
                <option value="2">2 Zar</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label>Hedeflenen Sayı/Toplam:</label>
            <input type="number" id="hc-dp-target" placeholder="6">
        </div>
        <button class="hc-btn" onclick="hcDiceProbHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-zar-olasiligi-result">
            <strong>Olasılık:</strong>
            <div id="hc-dp-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
