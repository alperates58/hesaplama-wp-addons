<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gut_hastaligi_risk_degerlendirme_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gut-hastaligi-risk-degerlendirme-hesaplama',
        HC_PLUGIN_URL . 'modules/gut-hastaligi-risk-degerlendirme-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-gut-hastaligi-risk-degerlendirme-hesaplama-css',
        HC_PLUGIN_URL . 'modules/gut-hastaligi-risk-degerlendirme-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-gout">
        <h3>Gut Hastalığı Risk Analizi</h3>
        <div class="hc-form-group">
            <label>Semptomlar</label>
            <div class="hc-checkbox-group">
                <label><input type="checkbox" id="hc-g-joint"> Eklemde ani şişme ve şiddetli ağrı (+2)</label>
                <label><input type="checkbox" id="hc-g-toe"> Baş parmak eklemi ağrısı (Podagra) (+2)</label>
                <label><input type="checkbox" id="hc-g-red"> Eklemde kızarıklık (+1)</label>
                <label><input type="checkbox" id="hc-g-male"> Cinsiyet: Erkek (+2)</label>
            </div>
        </div>
        <div class="hc-form-group">
            <label for="hc-g-ua">Ürik Asit Seviyesi (mg/dL)</label>
            <input type="number" id="hc-g-ua" placeholder="Örn: 7.5">
        </div>
        <button class="hc-btn" onclick="hcGutHesapla()">Değerlendir</button>
        <div class="hc-result" id="hc-g-result">
            <div id="hc-g-stats" style="text-align:left; font-size:1em; line-height:1.6;"></div>
        </div>
    </div>
    <?php
}
