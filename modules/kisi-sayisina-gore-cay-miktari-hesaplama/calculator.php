<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_cay_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tea-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-cay-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tea-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-cay-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-tea-per-person">
        <h3>Çay Miktarı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-tpp-count">Kişi Sayısı</label>
            <input type="number" id="hc-tpp-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-tpp-rounds">Kişi Başı Ortalama Bardak</label>
            <input type="number" id="hc-tpp-rounds" value="3" min="1">
        </div>

        <button class="hc-btn" onclick="hcCayMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-tea-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Kuru Çay:</span>
                <strong id="hc-tpp-res-tea">-</strong>
            </div>
            <div class="hc-result-item">
                <span>Gereken Su (Demlik):</span>
                <strong id="hc-tpp-res-water">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama: 1 litre demlenmiş çay için yaklaşık 28g (yaklaşık 5-6 yemek kaşığı) kuru çay baz alınmıştır.</div>
        </div>
    </div>
    <?php
}
