<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_vektor_buyuklugu_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-vec-mag',
        HC_PLUGIN_URL . 'modules/vektor-buyuklugu-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-vm">
        <h3>Vektör Büyüklüğü |V|</h3>
        <div class="hc-form-group"><label>x Bileşeni:</label><input type="number" id="hc-vm-x" placeholder="3"></div>
        <div class="hc-form-group"><label>y Bileşeni:</label><input type="number" id="hc-vm-y" placeholder="4"></div>
        <div class="hc-form-group"><label>z Bileşeni (Opsiyonel):</label><input type="number" id="hc-vm-z" placeholder="0"></div>
        <button class="hc-btn" onclick="hcVecMagHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-vektor-buyuklugu-result">
            <strong>Büyüklük:</strong>
            <div id="hc-vm-res-val" class="hc-result-value">-</div>
        </div>
    </div>
    <?php
}
