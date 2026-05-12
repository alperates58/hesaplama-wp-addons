<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_makarna_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-pasta-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-basina-makarna-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-pasta-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-basina-makarna-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-pasta-per-person">
        <h3>Kişi Başına Makarna Miktarı</h3>
        
        <div class="hc-form-group">
            <label for="hc-ppp-count">Kişi Sayısı</label>
            <input type="number" id="hc-ppp-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-ppp-type">Makarna Türü</label>
            <select id="hc-ppp-type">
                <option value="100">Kuru Makarna (Ana Öğün) - 100g</option>
                <option value="60">Kuru Makarna (Yan Yemek) - 60g</option>
                <option value="150">Taze Makarna - 150g</option>
                <option value="125">Dolu Makarna (Mantı, Tortellini) - 125g</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcMakarnaMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-pasta-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Makarna:</span>
                <strong class="hc-result-value" id="hc-ppp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama kuru ağırlık baz alınarak yapılmıştır. Makarna piştiğinde ağırlığı yaklaşık 2-2.5 katına çıkar.</div>
        </div>
    </div>
    <?php
}
