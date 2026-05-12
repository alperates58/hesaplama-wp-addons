<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gramdan_yemek_kasigina_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-g-to-tbsp-js',
        HC_PLUGIN_URL . 'modules/gramdan-yemek-kasigina-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-g-to-tbsp-css',
        HC_PLUGIN_URL . 'modules/gramdan-yemek-kasigina-cevirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-g-to-tbsp">
        <h3>Gramdan Yemek Kaşığına Çevirme</h3>
        
        <div class="hc-form-group">
            <label for="hc-material-tbsp">Malzeme</label>
            <select id="hc-material-tbsp">
                <option value="12.5">Toz Şeker</option>
                <option value="18.0">Tuz</option>
                <option value="9.0">Un (Elenmiş)</option>
                <option value="15.0">Sıvı Yağ / Su</option>
                <option value="20.0">Yoğurt</option>
                <option value="25.0">Tereyağı (Yumuşak)</option>
                <option value="10.0">Kakao</option>
                <option value="15.0">Bal</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-grams-tbsp">Miktar (Gram)</label>
            <input type="number" id="hc-grams-tbsp" placeholder="g" step="1">
        </div>

        <button class="hc-btn" onclick="hcGramYemekKasigiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-g-to-tbsp-result">
            <div class="hc-result-item">
                <span>Tahmini Miktar:</span>
                <strong class="hc-result-value" id="hc-tbsp-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-tbsp-info"></div>
        </div>
    </div>
    <?php
}
