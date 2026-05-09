<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_para_sayma_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-money-count',
        HC_PLUGIN_URL . 'modules/para-sayma-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-money-count-css',
        HC_PLUGIN_URL . 'modules/para-sayma-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-money-count">
        <h3>Para Sayma</h3>
        <div class="hc-money-grid">
            <div class="hc-money-row"> <label>200 ₺</label> <input type="number" class="hc-m-input" data-val="200" value="0" min="0"> </div>
            <div class="hc-money-row"> <label>100 ₺</label> <input type="number" class="hc-m-input" data-val="100" value="0" min="0"> </div>
            <div class="hc-money-row"> <label>50 ₺</label> <input type="number" class="hc-m-input" data-val="50" value="0" min="0"> </div>
            <div class="hc-money-row"> <label>20 ₺</label> <input type="number" class="hc-m-input" data-val="20" value="0" min="0"> </div>
            <div class="hc-money-row"> <label>10 ₺</label> <input type="number" class="hc-m-input" data-val="10" value="0" min="0"> </div>
            <div class="hc-money-row"> <label>5 ₺</label> <input type="number" class="hc-m-input" data-val="5" value="0" min="0"> </div>
            <div class="hc-money-row"> <label>1 ₺</label> <input type="number" class="hc-m-input" data-val="1" value="0" min="0"> </div>
        </div>
        <button class="hc-btn" onclick="hcMoneyCountHesapla()">Toplamı Hesapla</button>
        <div class="hc-result" id="hc-money-count-result">
            <div class="hc-result-item">
                <span>Toplam Tutar:</span>
                <span class="hc-result-value" id="hc-res-money-total">0 TL</span>
            </div>
        </div>
    </div>
    <?php
}
