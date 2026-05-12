<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_pirinc_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-rice-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-basina-pirinc-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-rice-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-basina-pirinc-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-rice-per-person">
        <h3>Kişi Başına Pirinç Miktarı</h3>
        
        <div class="hc-form-group">
            <label for="hc-rpp-count">Kişi Sayısı</label>
            <input type="number" id="hc-rpp-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-rpp-type">Öğün Türü</label>
            <select id="hc-rpp-type">
                <option value="65">Yan Yemek (Sade Pilav) - 65g</option>
                <option value="110">Ana Öğün (Sebzeli/Etli Pilav) - 110g</option>
                <option value="35">Sütlaç / Çorba İçi - 35g</option>
                <option value="50">Dolma / Sarma İçi - 50g</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcPirincMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-rice-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Pirinç:</span>
                <strong class="hc-result-value" id="hc-rpp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama kuru pirinç ağırlığı baz alınarak yapılmıştır. 1 su bardağı pirinç yaklaşık 180-200 gramdır.</div>
        </div>
    </div>
    <?php
}
