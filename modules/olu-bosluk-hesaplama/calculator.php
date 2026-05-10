<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_olu_bosluk_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-olu-bosluk',
        HC_PLUGIN_URL . 'modules/olu-bosluk-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-olu-bosluk-css',
        HC_PLUGIN_URL . 'modules/olu-bosluk-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-olu-bosluk">
        <h3>Ölü Boşluk (Vd/Vt) Oranı Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-ob-paco2">PaCO2 (mmHg):</label>
            <input type="number" id="hc-ob-paco2" placeholder="Arteriyel CO2">
        </div>
        <div class="hc-form-group">
            <label for="hc-ob-peco2">PECO2 (mmHg):</label>
            <input type="number" id="hc-ob-peco2" placeholder="Ekspirasyon havası CO2">
        </div>
        <button class="hc-btn" onclick="hcOluBoslukHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-olu-bosluk-result">
            <strong>Ölü Boşluk Oranı (Vd/Vt):</strong>
            <div id="hc-ob-res-val" class="hc-result-value">-</div>
            <div id="hc-ob-res-desc" style="margin-top:10px;"></div>
        </div>
    </div>
    <?php
}
