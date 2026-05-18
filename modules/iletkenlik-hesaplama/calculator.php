<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_iletkenlik_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-iletkenlik-hesaplama',
        HC_PLUGIN_URL . 'modules/iletkenlik-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-iletkenlik-hesaplama-css',
        HC_PLUGIN_URL . 'modules/iletkenlik-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-iletkenlik-hesaplama">
        <h3>İletkenlik Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ih-tip">Hesaplama Türü</label>
            <select id="hc-ih-tip" onchange="hcIhTipDegisti()">
                <option value="direnc" selected>Dirençten İletkenlik (G = 1 / R)</option>
                <option value="malzeme">Boyut ve Malzemeden İletkenlik (G = σ · A / L)</option>
            </select>
        </div>
        
        <div id="hc-ih-girdiler">
            <!-- Dinamik girdiler JS ile yerleşecek -->
        </div>
        
        <button class="hc-btn" onclick="hcIletkenlikHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-iletkenlik-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof hcIhTipDegisti === 'function') {
                hcIhTipDegisti();
            }
        });
    </script>
    <?php
}
