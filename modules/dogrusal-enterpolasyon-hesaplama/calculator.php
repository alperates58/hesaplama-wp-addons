<?php
if ( ! defined( 'ABSPATH' ) ) exit;
function hc_render_dogrusal_enterpolasyon_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-dogrusal-enterpolasyon-hesaplama', HC_PLUGIN_URL . 'modules/dogrusal-enterpolasyon-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-dogrusal-enterpolasyon-hesaplama-css', HC_PLUGIN_URL . 'modules/dogrusal-enterpolasyon-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-dogrusal-enterpolasyon-hesaplama">
        <h3>Doğrusal Enterpolasyon Hesaplama</h3>
        <p style="font-size:13px;color:#666;">y = y₁ + (x − x₁) × (y₂ − y₁) / (x₂ − x₁)</p>
        <div class="hc-form-group"><label for="hc-dent-x1">x₁ (Bilinen nokta 1)</label><input type="number" id="hc-dent-x1" placeholder="örn. 2" step="any" /></div>
        <div class="hc-form-group"><label for="hc-dent-y1">y₁ (Bilinen değer 1)</label><input type="number" id="hc-dent-y1" placeholder="örn. 10" step="any" /></div>
        <div class="hc-form-group"><label for="hc-dent-x2">x₂ (Bilinen nokta 2)</label><input type="number" id="hc-dent-x2" placeholder="örn. 6" step="any" /></div>
        <div class="hc-form-group"><label for="hc-dent-y2">y₂ (Bilinen değer 2)</label><input type="number" id="hc-dent-y2" placeholder="örn. 30" step="any" /></div>
        <div class="hc-form-group"><label for="hc-dent-x">x (Bilinmeyen nokta)</label><input type="number" id="hc-dent-x" placeholder="örn. 4" step="any" /></div>
        <button class="hc-btn" onclick="hcDogrusalEnterpolasyonHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-dogrusal-enterpolasyon-hesaplama-result"></div>
    </div>
    <?php
}
