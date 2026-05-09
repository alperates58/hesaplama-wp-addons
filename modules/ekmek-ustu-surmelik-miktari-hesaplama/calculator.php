<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_ekmek_ustu_surmelik_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-spread-qty',
        HC_PLUGIN_URL . 'modules/ekmek-ustu-surmelik-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-spread-qty-css',
        HC_PLUGIN_URL . 'modules/ekmek-ustu-surmelik-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-spread-qty">
        <h3>Ekmek Üstü Miktarı</h3>
        <div class="hc-form-group">
            <label for="hc-sq-people">Kişi Sayısı</label>
            <input type="number" id="hc-sq-people" value="4" min="1">
        </div>
        <div class="hc-form-group">
            <label for="hc-sq-slices">Kişi Başı Dilim</label>
            <input type="number" id="hc-sq-slices" value="2" min="1">
        </div>
        <button class="hc-btn" onclick="hcSpreadQtyHesapla()">Miktarı Gör</button>
        <div class="hc-result" id="hc-spread-qty-result">
            <div class="hc-result-item">
                <span>Tahmini Toplam İhtiyaç:</span>
                <span class="hc-result-value" id="hc-res-sq-total">0 gr</span>
            </div>
            <p class="hc-sq-note">Bir dilim ekmek için ortalama 15-20 gr sürmelik malzeme hesaplanmıştır.</p>
        </div>
    </div>
    <?php
}
