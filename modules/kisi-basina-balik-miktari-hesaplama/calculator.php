<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_balik_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fish-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-basina-balik-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-fish-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-basina-balik-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-fish-per-person">
        <h3>Kişi Başına Balık Miktarı</h3>
        
        <div class="hc-form-group">
            <label for="hc-fpp-count">Kişi Sayısı</label>
            <input type="number" id="hc-fpp-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-fpp-type">Balık Sunum Şekli</label>
            <select id="hc-fpp-type">
                <option value="175">Fileto (Kemiksiz/Derisiz) - 175g</option>
                <option value="450">Bütün Balık (Temizlenmemiş) - 450g</option>
                <option value="300">Bütün Balık (Temizlenmiş) - 300g</option>
                <option value="250">Karides / Kalamar - 250g</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcBalikMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-fish-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Balık:</span>
                <strong class="hc-result-value" id="hc-fpp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama yetişkin porsiyonları baz alınarak yapılmıştır.</div>
        </div>
    </div>
    <?php
}
