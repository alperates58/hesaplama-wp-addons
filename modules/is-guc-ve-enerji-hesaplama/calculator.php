<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_is_guc_ve_enerji_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-is-guc-ve-enerji-hesaplama',
        HC_PLUGIN_URL . 'modules/is-guc-ve-enerji-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-is-guc-ve-enerji-hesaplama-css',
        HC_PLUGIN_URL . 'modules/is-guc-ve-enerji-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-is-guc-ve-enerji-hesaplama">
        <h3>İş, Güç ve Enerji Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-ige-tip">Hesaplama Kategorisi</label>
            <select id="hc-ige-tip" onchange="hcIgeTipDegisti()">
                <option value="is-guc" selected>Yapılan İş ve Güç (W = F · d , P = W / t)</option>
                <option value="potansiyel">Çekim Potansiyel Enerjisi (PE = m · g · h)</option>
                <option value="kinetik">Kinetik Enerji (KE = 0.5 · m · v²)</option>
            </select>
        </div>
        
        <div id="hc-ige-girdiler">
            <!-- Dinamik girdiler JS ile yerleşecek -->
        </div>
        
        <button class="hc-btn" onclick="hcIsGucVeEnerjiHesapla()">Hesapla</button>
        
        <div class="hc-result" id="hc-is-guc-ve-enerji-hesaplama-result">
            <!-- Sonuçlar buraya -->
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (typeof hcIgeTipDegisti === 'function') {
                hcIgeTipDegisti();
            }
        });
    </script>
    <?php
}
