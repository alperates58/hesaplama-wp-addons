<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_elektronik_atik_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-ewaste',
        HC_PLUGIN_URL . 'modules/elektronik-atik-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-ewaste-css',
        HC_PLUGIN_URL . 'modules/elektronik-atik-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-ewaste">
        <h3>Elektronik Atık Miktarı Hesaplama</h3>
        <div class="hc-form-group">
            <label>Cihaz Sayısı</label>
            <div class="hc-ewaste-item">
                <span>Akıllı Telefon / Tablet:</span>
                <input type="number" id="hc-ew-phones" value="2" min="0">
            </div>
            <div class="hc-ewaste-item">
                <span>Bilgisayar / Laptop:</span>
                <input type="number" id="hc-ew-laptops" value="1" min="0">
            </div>
            <div class="hc-ewaste-item">
                <span>Televizyon / Monitör:</span>
                <input type="number" id="hc-ew-tvs" value="1" min="0">
            </div>
        </div>
        <button class="hc-btn" onclick="hcEwasteHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-ewaste-result">
            <div class="hc-result-item">
                <span>Yıllık E-Atık Üretimi:</span>
                <span class="hc-result-value" id="hc-res-ew-kg">0 kg</span>
            </div>
            <p id="hc-res-ew-desc">Elektronik atıklar kurşun, cıva ve kadmiyum gibi tehlikeli maddeler içerir.</p>
        </div>
    </div>
    <?php
}
