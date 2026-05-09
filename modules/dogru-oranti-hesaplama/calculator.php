<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_dogru_oranti_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-dogru-oranti-hesaplama', HC_PLUGIN_URL . 'modules/dogru-oranti-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-dogru-oranti-hesaplama-css', HC_PLUGIN_URL . 'modules/dogru-oranti-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-dogru-oranti-hesaplama">
        <h3>Doğru Orantı Hesaplama</h3>
        <p style="font-size:13px;color:#666;">a / b = c / x &nbsp;→&nbsp; x = ?</p>
        <div class="hc-form-group"><label for="hc-doa-a">a</label><input type="number" id="hc-doa-a" placeholder="örn. 3" step="any" /></div>
        <div class="hc-form-group"><label for="hc-doa-b">b</label><input type="number" id="hc-doa-b" placeholder="örn. 9" step="any" /></div>
        <div class="hc-form-group"><label for="hc-doa-c">c</label><input type="number" id="hc-doa-c" placeholder="örn. 5" step="any" /></div>
        <button class="hc-btn" onclick="hcDogrusOrantiHesapla()">x'i Bul</button>
        <div class="hc-result" id="hc-dogru-oranti-hesaplama-result"></div>
    </div>
    <?php
}
