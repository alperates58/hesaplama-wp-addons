<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gramdan_cay_kasigina_cevirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-g-to-tsp-js',
        HC_PLUGIN_URL . 'modules/gramdan-cay-kasigina-cevirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-g-to-tsp-css',
        HC_PLUGIN_URL . 'modules/gramdan-cay-kasigina-cevirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-g-to-tsp">
        <h3>Gramdan Çay Kaşığına Çevirme</h3>
        
        <div class="hc-form-group">
            <label for="hc-material">Malzeme</label>
            <select id="hc-material">
                <option value="4.2">Toz Şeker</option>
                <option value="6.0">Tuz (İnce)</option>
                <option value="3.0">Un (Elenmiş)</option>
                <option value="4.5">Pudra Şekeri</option>
                <option value="2.8">Kakao</option>
                <option value="5.0">Sıvı Yağ / Su</option>
                <option value="2.0">Maya (Kuru)</option>
            </select>
        </div>

        <div class="hc-form-group">
            <label for="hc-grams">Miktar (Gram)</label>
            <input type="number" id="hc-grams" placeholder="g" step="1">
        </div>

        <button class="hc-btn" onclick="hcGramCayKasigiHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-g-to-tsp-result">
            <div class="hc-result-item">
                <span>Tahmini Miktar:</span>
                <strong class="hc-result-value" id="hc-tsp-val">-</strong>
            </div>
            <div class="hc-result-note" id="hc-tsp-info"></div>
        </div>
    </div>
    <?php
}
