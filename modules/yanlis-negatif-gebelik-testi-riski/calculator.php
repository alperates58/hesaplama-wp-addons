<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yanlis_negatif_gebelik_testi_riski( $atts ) {
    wp_enqueue_script(
        'hc-fn-risk',
        HC_PLUGIN_URL . 'modules/yanlis-negatif-gebelik-testi-riski/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-yanlis-negatif-gebelik-testi-riski">
        <h3>Yanlış Negatif Gebelik Testi Riski Hesaplama</h3>
        <div class="hc-form-group">
            <label>Yumurtlamadan Sonra Kaçıncı Gün? (DPO)</label>
            <input type="number" id="hc-fn-dpo" placeholder="Örn: 10">
        </div>
        <button class="hc-btn" onclick="hcFnRiskHesapla()">Riski Hesapla</button>
        <div class="hc-result" id="hc-fn-result">
            <div class="hc-result-value" id="hc-fn-status">-</div>
            <p id="hc-fn-yorum"></p>
        </div>
    </div>
    <?php
}
