<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cozunmus_oksijen_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-do',
        HC_PLUGIN_URL . 'modules/cozunmus-oksijen-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-do-css',
        HC_PLUGIN_URL . 'modules/cozunmus-oksijen-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-do">
        <h3>Çözünmüş Oksijen (Winkler)</h3>
        <div class="hc-form-group">
            <label for="hc-do-v-tit">Tiyosülfat Sarfiyatı (ml)</label>
            <input type="number" id="hc-do-v-tit" placeholder="Örn: 5.2" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-do-n-tit">Tiyosülfat Normalitesi (N)</label>
            <input type="number" id="hc-do-n-tit" placeholder="Örn: 0.025" value="0.025" step="any">
        </div>
        <div class="hc-form-group">
            <label for="hc-do-v-sam">Numune Hacmi (ml)</label>
            <input type="number" id="hc-do-v-sam" placeholder="Örn: 200" value="200" step="any">
        </div>
        <button class="hc-btn" onclick="hcDOHesapla()">DO Hesapla</button>
        <div class="hc-result" id="hc-do-result">
            <div class="hc-result-label">Çözünmüş Oksijen:</div>
            <div class="hc-result-value" id="hc-do-val">-</div>
            <div class="hc-result-note">mg/L DO = (V * N * 8000) / V_numune</div>
        </div>
    </div>
    <?php
}
