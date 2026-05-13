<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_nokta_grafigi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-nokta-grafigi-hesaplama',
        HC_PLUGIN_URL . 'modules/nokta-grafigi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-nokta-grafigi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/nokta-grafigi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-nokta-grafigi-hesaplama">
        <h3>Nokta Grafiği (Dot Plot) Oluşturucu</h3>
        <p>Verileri virgül veya boşluk ile ayırarak giriniz (Tam sayılar önerilir).</p>
        <div class="hc-form-group">
            <label for="hc-dp-data">Veri Seti</label>
            <textarea id="hc-dp-data" rows="4" placeholder="1, 2, 2, 3, 3, 3, 4, 4, 5"></textarea>
        </div>
        <button class="hc-btn" onclick="hcNoktaGrafigiOlustur()">Grafik Oluştur</button>
        <div class="hc-result" id="hc-nokta-grafigi-hesaplama-result">
            <div id="hc-dp-container" class="hc-dp-plot"></div>
            <div id="hc-dp-axis" class="hc-dp-axis"></div>
        </div>
    </div>
    <?php
}
