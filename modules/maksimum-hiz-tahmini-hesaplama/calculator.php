<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_maksimum_hiz_tahmini_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-top-speed-calc',
        HC_PLUGIN_URL . 'modules/maksimum-hiz-tahmini-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-msh-box">
        <h3>Maksimum Hız Tahmini</h3>
        <div class="hc-form-group">
            <label>Motor Gücü (HP)</label>
            <input type="number" id="hc-msh-hp" placeholder="Örn: 150">
        </div>
        <div class="hc-form-group">
            <label>Aerodinamik Sürtünme (Cd)</label>
            <input type="number" step="0.01" id="hc-msh-cd" value="0.30">
        </div>
        <div class="hc-form-group">
            <label>Ön Alan (m²)</label>
            <input type="number" step="0.1" id="hc-msh-area" value="2.2">
        </div>
        <button class="hc-btn" onclick="hcMshHesapla()">Hızı Hesapla</button>
        <div class="hc-result" id="hc-msh-result">
            <div class="hc-result-title">Tahmini Maksimum Hız:</div>
            <div class="hc-result-value" id="hc-msh-val">-</div>
        </div>
    </div>
    <?php
}
