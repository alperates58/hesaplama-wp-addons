<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_tiras_kopugu_formul_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-tiras-kopugu-formul-orani-hesaplama',
        HC_PLUGIN_URL . 'modules/tiras-kopugu-formul-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-tiras-kopugu-formul-orani-hesaplama-css',
        HC_PLUGIN_URL . 'modules/tiras-kopugu-formul-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-shaving-foam">
        <h3>Tıraş Köpüğü Formül Analizi</h3>
        <div class="hc-form-group">
            <label for="hc-sf-total">Toplam Üretim (gram)</label>
            <input type="number" id="hc-sf-total" value="1000">
        </div>
        <div class="hc-form-group">
            <label for="hc-sf-oil">Stearik Asit / Yağ Fazı (%)</label>
            <input type="number" id="hc-sf-oil" value="10">
        </div>
        <div class="hc-form-group">
            <label for="hc-sf-alkali">Alkali (KOH/NaOH) (%)</label>
            <input type="number" id="hc-sf-alkali" value="5">
        </div>
        <button class="hc-btn" onclick="hcTıraşKöpüğüFormülOranıHesapla()">Formül Çıkar</button>
        <div class="hc-result" id="hc-sf-result">
            <div id="hc-sf-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
