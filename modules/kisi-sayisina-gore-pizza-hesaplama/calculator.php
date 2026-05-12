<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_sayisina_gore_pizza_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pizza-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-pizza-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pizza-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-sayisina-gore-pizza-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pizza-per-person">
        <h3>Pizza Sayısı Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-pzz-count">Kişi Sayısı</label>
            <input type="number" id="hc-pzz-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-pzz-hunger">Açlık Durumu</label>
            <select id="hc-pzz-hunger">
                <option value="3">Normal (Kişi başı 3 dilim)</option>
                <option value="4">Çok Aç (Kişi başı 4 dilim)</option>
                <option value="2">Az Aç (Kişi başı 2 dilim)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-pzz-size">Pizza Boyutu (Dilim Sayısı)</label>
            <select id="hc-pzz-size">
                <option value="8">Büyük Boy (8 Dilim)</option>
                <option value="6">Orta Boy (6 Dilim)</option>
                <option value="4">Küçük Boy (4 Dilim)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcPizzaHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pizza-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Pizza:</span>
                <strong class="hc-result-value" id="hc-pzz-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama: Toplam dilim ihtiyacı / seçilen pizza boyutu.</div>
        </div>
    </div>
    <?php
}
