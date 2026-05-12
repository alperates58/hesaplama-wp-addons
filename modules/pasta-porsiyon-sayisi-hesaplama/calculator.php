<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_pasta_porsiyon_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-cake-planner-js',
        HC_PLUGIN_URL . 'modules/pasta-porsiyon-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-cake-planner-css',
        HC_PLUGIN_URL . 'modules/pasta-porsiyon-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-cake-planner">
        <h3>Pasta Boyutu Planlayıcı</h3>
        
        <div class="hc-form-group">
            <label for="hc-cpp-count">Hedef Kişi Sayısı</label>
            <input type="number" id="hc-cpp-count" value="20" min="5">
        </div>

        <button class="hc-btn" onclick="hcPastaPlanla()">Hesapla</button>

        <div class="hc-result" id="hc-cake-planner-result">
            <div id="hc-cpp-res-list">
                <!-- JS populated -->
            </div>
            <div class="hc-result-note">Öneriler, standart party porsiyonları baz alınarak tek katlı veya çok katlı alternatifler sunar.</div>
        </div>
    </div>
    <?php
}
