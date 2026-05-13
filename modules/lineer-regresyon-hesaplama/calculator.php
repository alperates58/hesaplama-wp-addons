<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lineer_regresyon_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lineer-regresyon-hesaplama',
        HC_PLUGIN_URL . 'modules/lineer-regresyon-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lineer-regresyon-hesaplama-css',
        HC_PLUGIN_URL . 'modules/lineer-regresyon-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lineer-regresyon-hesaplama">
        <h3>Basit Doğrusal Regresyon</h3>
        <p>X ve Y değerlerini virgül veya boşluk ile ayırarak giriniz.</p>
        <div class="hc-form-group">
            <label for="hc-lin-x">X Değerleri (Bağımsız)</label>
            <textarea id="hc-lin-x" rows="3" placeholder="1, 2, 3, 4, 5"></textarea>
        </div>
        <div class="hc-form-group">
            <label for="hc-lin-y">Y Değerleri (Bağımlı)</label>
            <textarea id="hc-lin-y" rows="3" placeholder="2, 4, 5, 4, 5"></textarea>
        </div>
        <button class="hc-btn" onclick="hcLineerRegHesapla()">Hesapla</button>
        <div class="hc-result" id="hc-lineer-regresyon-hesaplama-result">
            <span class="hc-label">Regresyon Denklemi:</span>
            <div class="hc-result-value" id="hc-lin-res-eq">y = a + bx</div>
            <div id="hc-lin-res-params" style="margin-top:10px;"></div>
            <div id="hc-lin-res-r2" style="margin-top:5px; font-weight:bold; color:#2980b9;"></div>
        </div>
    </div>
    <?php
}
