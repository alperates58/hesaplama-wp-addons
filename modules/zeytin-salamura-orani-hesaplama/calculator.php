<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_zeytin_salamura_orani_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-olive-brine-js',
        HC_PLUGIN_URL . 'modules/zeytin-salamura-orani-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-olive-brine-css',
        HC_PLUGIN_URL . 'modules/zeytin-salamura-orani-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-olive-brine">
        <h3>Zeytin Salamura Hesaplayıcı</h3>
        
        <div class="hc-form-group">
            <label for="hc-ob-water">Kullanılacak Su (Litre)</label>
            <input type="number" id="hc-ob-water" value="10" min="1">
        </div>

        <button class="hc-btn" onclick="hcZeytinOraniHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-olive-brine-result">
            <div id="hc-ob-res-list">
                <!-- JS populated -->
            </div>
            <div class="hc-result-note">
                <strong>İpucu:</strong> Zeytinlerin üzerine ağırlık koyarak suyun altında kalmalarını sağlayın. Taze yumurta testi ile tuz oranını kontrol edebilirsiniz (yumurta suyun yüzeyine çıkmalı).
            </div>
        </div>
    </div>
    <?php
}
