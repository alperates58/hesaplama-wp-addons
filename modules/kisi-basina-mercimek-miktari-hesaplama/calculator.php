<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_mercimek_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lentil-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-basina-mercimek-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lentil-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-basina-mercimek-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lentil-per-person">
        <h3>Kişi Başına Mercimek Miktarı</h3>
        
        <div class="hc-form-group">
            <label for="hc-lpp-count">Kişi Sayısı</label>
            <input type="number" id="hc-lpp-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-lpp-type">Yemek Türü</label>
            <select id="hc-lpp-type">
                <option value="55">Mercimek Çorbası (55g)</option>
                <option value="80">Mercimek Köftesi (80g)</option>
                <option value="75">Yeşil Mercimek Yemeği (75g)</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcMercimekMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-lentil-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Mercimek:</span>
                <strong class="hc-result-value" id="hc-lpp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama kuru ağırlık baz alınarak yapılmıştır.</div>
        </div>
    </div>
    <?php
}
