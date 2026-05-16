<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_cakra_denge_puani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-chakra-balance',
        HC_PLUGIN_URL . 'modules/cakra-denge-puani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-chakra-balance-css',
        HC_PLUGIN_URL . 'modules/cakra-denge-puani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-chakra-calc">
        <h3>Çakra Denge Puanı Analizi</h3>
        <p>Aşağıdaki alanlarda kendinizi 1 ile 10 arasında puanlayın (1: Çok Düşük, 10: Çok Güçlü)</p>
        
        <div class="hc-form-group">
            <label>1. Kök Çakra (Güven, Aidiyet, Fiziksel Enerji)</label>
            <input type="range" id="hc-c1" min="1" max="10" value="5" class="hc-range">
        </div>
        <div class="hc-form-group">
            <label>2. Sakral Çakra (Yaratıcılık, Duygular, Cinsellik)</label>
            <input type="range" id="hc-c2" min="1" max="10" value="5" class="hc-range">
        </div>
        <div class="hc-form-group">
            <label>3. Solar Pleksus (Özgüven, İrade, Kişisel Güç)</label>
            <input type="range" id="hc-c3" min="1" max="10" value="5" class="hc-range">
        </div>
        <div class="hc-form-group">
            <label>4. Kalp Çakrası (Sevgi, Şefkat, Kabul)</label>
            <input type="range" id="hc-c4" min="1" max="10" value="5" class="hc-range">
        </div>
        <div class="hc-form-group">
            <label>5. Boğaz Çakrası (İletişim, Kendini İfade Etme)</label>
            <input type="range" id="hc-c5" min="1" max="10" value="5" class="hc-range">
        </div>
        <div class="hc-form-group">
            <label>6. Üçüncü Göz (Sezgi, Farkındalık, Odaklanma)</label>
            <input type="range" id="hc-c6" min="1" max="10" value="5" class="hc-range">
        </div>
        <div class="hc-form-group">
            <label>7. Tepe Çakrası (Ruhanilik, Aydınlanma, Bağlantı)</label>
            <input type="range" id="hc-c7" min="1" max="10" value="5" class="hc-range">
        </div>

        <button class="hc-btn" onclick="hcCakraAnalizEt()">Analizi Tamamla</button>
        
        <div class="hc-result" id="hc-cakra-denge-puani-result">
            <div class="hc-result-header">Genel Enerji Puanınız: <span id="hc-chakra-total" class="hc-result-value"></span></div>
            <div id="hc-chakra-report" class="hc-result-content"></div>
        </div>
    </div>
    <?php
}
