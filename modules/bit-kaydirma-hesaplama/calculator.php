<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bit_kaydirma_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-bit-kaydirma-hesaplama', HC_PLUGIN_URL . 'modules/bit-kaydirma-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-bit-kaydirma-hesaplama-css', HC_PLUGIN_URL . 'modules/bit-kaydirma-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-bit-kaydirma-hesaplama">
        <h3>Bit Kaydırma Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bka-sayi">Sayı (Onluk)</label>
            <input type="number" id="hc-bka-sayi" placeholder="örn. 12" step="1" />
        </div>
        <div class="hc-form-group">
            <label for="hc-bka-yon">Kaydırma Yönü</label>
            <select id="hc-bka-yon">
                <option value="left">Sola Kaydırma (&lt;&lt;)</option>
                <option value="right">Sağa Kaydırma (&gt;&gt;)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-bka-miktar">Kaydırma Miktarı (bit)</label>
            <input type="number" id="hc-bka-miktar" placeholder="örn. 2" min="1" max="31" step="1" value="1" />
        </div>
        <button class="hc-btn" onclick="hcBitKaydirmaHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bit-kaydirma-hesaplama-result"></div>
    </div>
    <?php
}
