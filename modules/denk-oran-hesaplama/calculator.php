<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_denk_oran_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-denk-oran-hesaplama', HC_PLUGIN_URL . 'modules/denk-oran-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-denk-oran-hesaplama-css', HC_PLUGIN_URL . 'modules/denk-oran-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-denk-oran-hesaplama">
        <h3>Denk Oran Hesaplama</h3>
        <p style="font-size:13px;color:#666;">a : b = c : d — Bilinmeyen terimi bulmak için "?" yerine boş bırakın.</p>
        <div class="hc-form-group">
            <label for="hc-dor-a">a</label>
            <input type="number" id="hc-dor-a" placeholder="örn. 3" step="any" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dor-b">b</label>
            <input type="number" id="hc-dor-b" placeholder="örn. 4" step="any" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dor-c">c</label>
            <input type="number" id="hc-dor-c" placeholder="örn. 9" step="any" />
        </div>
        <div class="hc-form-group">
            <label for="hc-dor-d">d (boş bırakın = bilinmeyen)</label>
            <input type="number" id="hc-dor-d" placeholder="?" step="any" />
        </div>
        <button class="hc-btn" onclick="hcDenkOranHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-denk-oran-hesaplama-result"></div>
    </div>
    <?php
}
