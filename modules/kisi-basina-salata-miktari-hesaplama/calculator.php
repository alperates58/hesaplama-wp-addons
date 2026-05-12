<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisi_basina_salata_miktari_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-salad-per-person-js',
        HC_PLUGIN_URL . 'modules/kisi-basina-salata-miktari-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-salad-per-person-css',
        HC_PLUGIN_URL . 'modules/kisi-basina-salata-miktari-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-salad-per-person">
        <h3>Kişi Başına Salata Miktarı</h3>
        
        <div class="hc-form-group">
            <label for="hc-slp-count">Kişi Sayısı</label>
            <input type="number" id="hc-slp-count" value="4" min="1">
        </div>

        <div class="hc-form-group">
            <label for="hc-slp-type">Salata Türü</label>
            <select id="hc-slp-type">
                <option value="125">Yeşil Salata (Yan Yemek) - 125g</option>
                <option value="200">Yeşil Salata (Ana Öğün) - 200g</option>
                <option value="250">Patates / Makarna / Kısır - 250g</option>
                <option value="150">Meyve Salatası - 150g</option>
            </select>
        </div>

        <button class="hc-btn" onclick="hcSalataMiktariHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-salad-per-person-result">
            <div class="hc-result-item">
                <span>Gereken Toplam Malzeme:</span>
                <strong class="hc-result-value" id="hc-slp-res-val">-</strong>
            </div>
            <div class="hc-result-note">Hesaplama yetişkin porsiyonları baz alınarak yapılmıştır.</div>
        </div>
    </div>
    <?php
}
