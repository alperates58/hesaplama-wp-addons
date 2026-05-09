<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_dogum_saati_analizi( $atts ) {
    wp_enqueue_script(
        'hc-time-analiz',
        HC_PLUGIN_URL . 'modules/dogum-saati-analizi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-time-analiz-css',
        HC_PLUGIN_URL . 'modules/dogum-saati-analizi/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-dogum-saati-analizi">
        <h3>Doğum Saati Analizi</h3>
        <p>Tam doğum saatinizi girerek doğduğunuz vaktin enerjisini öğrenin.</p>
        <div class="hc-form-group">
            <label for="hc-time-input">Doğum Saati</label>
            <input type="time" id="hc-time-input">
        </div>
        <button class="hc-btn" onclick="hcTimeAnalizHesapla()">Vakti Analiz Et</button>
        <div class="hc-result" id="hc-time-result">
            <div class="hc-result-desc" id="hc-time-desc"></div>
            <p class="hc-note">* Doğum saati, yükselen burcunuzun ve ev konumlarınızın belirlenmesi için hayati önem taşır.</p>
        </div>
    </div>
    <?php
}
