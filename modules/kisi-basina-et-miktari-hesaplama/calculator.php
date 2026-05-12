<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_et_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-meat-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-basina-et-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-meat-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-basina-et-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-meat-per-person">
        <h3>Kişi Başına Et Miktarı</h3>
        
        <div class="hc-form-group">
            <label for="hc-mpp-count">Kişi Sayısı</label>
            <input type="number" id="hc-mpp-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-mpp-type">Et / Yemek Türü</label>
            <select id="hc-mpp-type">
                <option value="200">Kemiksiz Et (Bonfile, Biftek) - 200g</option>
                <option value="350">Kemikli Et (Pirzola, Kaburga) - 350g</option>
                <option value="125">Kıyma / Kuşbaşı (Sulu Yemek İçi) - 125g</option>
                <option value="180">Köfte / Kebap - 180g</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcEtMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-meat-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Et:</span>
                <strong class="hc-result-value" id="hc-mpp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama çiğ et ağırlığı baz alınarak yapılmıştır. Pişince ağırlık yaklaşık %25-30 azalır.</div>
        </div>
    </div>
    <?php
}
