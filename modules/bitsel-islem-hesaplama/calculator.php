<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bitsel_islem_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-bitsel-islem-hesaplama', HC_PLUGIN_URL . 'modules/bitsel-islem-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-bitsel-islem-hesaplama-css', HC_PLUGIN_URL . 'modules/bitsel-islem-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-bitsel-islem-hesaplama">
        <h3>Bitsel İşlem Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-bis-a">Sayı A (Onluk)</label>
            <input type="number" id="hc-bis-a" placeholder="örn. 60" step="1" />
        </div>
        <div class="hc-form-group">
            <label for="hc-bis-b">Sayı B (Onluk) — NOT için kullanılmaz</label>
            <input type="number" id="hc-bis-b" placeholder="örn. 13" step="1" />
        </div>
        <div class="hc-form-group">
            <label for="hc-bis-islem">İşlem</label>
            <select id="hc-bis-islem">
                <option value="and">AND (&amp;)</option>
                <option value="or">OR (|)</option>
                <option value="xor">XOR (^)</option>
                <option value="not">NOT (~A)</option>
                <option value="nand">NAND</option>
                <option value="nor">NOR</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBitselIslemHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-bitsel-islem-hesaplama-result"></div>
    </div>
    <?php
}
