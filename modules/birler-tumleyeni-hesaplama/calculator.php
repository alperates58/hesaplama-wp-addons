<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_birler_tumleyeni_hesaplama( $atts ) {
    wp_enqueue_script( 'hc-birler-tumleyeni-hesaplama', HC_PLUGIN_URL . 'modules/birler-tumleyeni-hesaplama/calculator.js', [], HC_VERSION, true );
    wp_enqueue_style( 'hc-birler-tumleyeni-hesaplama-css', HC_PLUGIN_URL . 'modules/birler-tumleyeni-hesaplama/calculator.css', [ 'hesaplama-suite' ], HC_VERSION );
    ?>
    <div class="hc-calculator" id="hc-birler-tumleyeni-hesaplama">
        <h3>Birler Tümleyeni Hesaplama</h3>
        <div class="hc-form-group">
            <label for="hc-btu-giris">İkili Sayı veya Onluk Tam Sayı</label>
            <input type="text" id="hc-btu-giris" placeholder="örn. 1010 veya 42" />
        </div>
        <div class="hc-form-group">
            <label for="hc-btu-mod">Giriş Formatı</label>
            <select id="hc-btu-mod">
                <option value="binary">İkili (Binary)</option>
                <option value="decimal">Onluk (Decimal)</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-btu-bit">Bit Sayısı</label>
            <select id="hc-btu-bit">
                <option value="8">8 bit</option>
                <option value="16">16 bit</option>
                <option value="32">32 bit</option>
            </select>
        </div>
        <button class="hc-btn" onclick="hcBirlerTumleyeniHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-birler-tumleyeni-hesaplama-result"></div>
    </div>
    <?php
}
