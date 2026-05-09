<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_diskriminant_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-diskriminant-hesaplama', HC_PLUGIN_URL . 'modules/diskriminant-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-diskriminant-hesaplama-css', HC_PLUGIN_URL . 'modules/diskriminant-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-diskriminant-hesaplama">
        <h3>Diskriminant Hesaplama</h3>
        <p style="font-size:13px;color:#666;">ax² + bx + c = 0 denklemi için Δ = b² − 4ac</p>
        <div class="hc-form-group"><label for="hc-dis-a">Katsayı a</label><input type="number" id="hc-dis-a" placeholder="örn. 2" step="any" /></div>
        <div class="hc-form-group"><label for="hc-dis-b">Katsayı b</label><input type="number" id="hc-dis-b" placeholder="örn. -3" step="any" /></div>
        <div class="hc-form-group"><label for="hc-dis-c">Katsayı c</label><input type="number" id="hc-dis-c" placeholder="örn. 1" step="any" /></div>
        <button class="hc-btn" onclick="hcDiskriminantHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-diskriminant-hesaplama-result"></div>
    </div>
    <?php
}
