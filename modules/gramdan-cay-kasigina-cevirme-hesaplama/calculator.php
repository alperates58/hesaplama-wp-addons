<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gramdan_cay_kasigina_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-g-to-tsp',
        HC_PLUGIN_URL . 'modules/gramdan-cay-kasigina-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-g-to-tsp-calc">
        <h3>Gramdan Çay Kaşığına Çevirme</h3>
        <div class="hc-form-group">
            <label for="hc-material">Malzeme Türü:</label>
            <select id="hc-material">
                <option value="4.2">Şeker (Toz)</option>
                <option value="5.9">Tuz (İnce)</option>
                <option value="2.6">Un (Genel)</option>
                <option value="3.0">Pudra Şekeri</option>
                <option value="4.8">Pirinç</option>
                <option value="5.0">Su / Sıvı</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-grams">Miktar (gram):</label>
            <input type="number" id="hc-grams" placeholder="Örn: 10" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcGramCayKasigiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-g-to-tsp-result">
            <strong>Sonuç:</strong>
            <div id="hc-tsp-val" class="hc-result-value">-</div>
            <p id="hc-tsp-info"></p>
        </div>
    </div>
    <?php
}
