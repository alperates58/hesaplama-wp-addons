<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_denklem_koku_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-denklem-koku-hesaplama', HC_PLUGIN_URL . 'modules/denklem-koku-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-denklem-koku-hesaplama-css', HC_PLUGIN_URL . 'modules/denklem-koku-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-denklem-koku-hesaplama">
        <h3>Denklem Kökü Hesaplama</h3>
        <p style="font-size:13px;color:#666;">İkinci dereceden denklem: ax² + bx + c = 0</p>
        <div class="hc-form-group">
            <label for="hc-dkk-a">Katsayı a</label>
            <input type="number" id="hc-dkk-a" placeholder="örn. 1" step="any" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dkk-b">Katsayı b</label>
            <input type="number" id="hc-dkk-b" placeholder="örn. -5" step="any" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dkk-c">Katsayı c</label>
            <input type="number" id="hc-dkk-c" placeholder="örn. 6" step="any" />
        </div>
        <button class="hc-btn" onclick="hcDenklemKokuHesapla()">Kökleri Bul</button>
        <div class="hc-result" id="hc-denklem-koku-hesaplama-result"></div>
    </div>
    <?php
}
