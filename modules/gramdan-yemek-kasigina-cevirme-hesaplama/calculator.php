<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gramdan_yemek_kasigina_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-g-to-tbsp',
        HC_PLUGIN_URL . 'modules/gramdan-yemek-kasigina-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-g-to-tbsp-calc">
        <h3>Gramdan Yemek Kaşığına Çevirme</h3>
        <div class="hc-form-group">
            <label for="hc-tb-material">Malzeme Türü:</label>
            <select id="hc-tb-material">
                <option value="12.5">Toz Şeker</option>
                <option value="8.0">Un</option>
                <option value="15.0">Sıvı Yağ / Su</option>
                <option value="18.0">Tuz</option>
                <option value="14.0">Yoğurt</option>
                <option value="20.0">Bal / Pekmez</option>
            </select>
        </div>
        <div class="hc-form-group">
            <label for="hc-tb-grams">Miktar (gram):</label>
            <input type="number" id="hc-tb-grams" placeholder="Örn: 50" step="0.1">
        </div>
        <button class="hc-btn" onclick="hcGramYemekKasigiHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-g-to-tbsp-result">
            <strong>Sonuç:</strong>
            <div id="hc-tbsp-val" class="hc-result-value">-</div>
            <p id="hc-tbsp-info"></p>
        </div>
    </div>
    <?php
}
