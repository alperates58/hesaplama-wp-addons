<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_yumurta_haslama_suresi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-egg-boil-js',
        HC_PLUGIN_URL . 'modules/yumurta-haslama-suresi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-egg-boil-css',
        HC_PLUGIN_URL . 'modules/yumurta-haslama-suresi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-egg-boil">
        <h3>Yumurta Haşlama Süreleri</h3>
        
        <div class="hc-form-group">
            <label for="hc-eb-style">İstediğiniz Kıvam</label>
            <select id="hc-eb-style" onchange="hcYumurtaSuresiGoster()">
                <option value="">Seçiniz...</option>
                <option value="3">Rafadan (Çok Yumuşak - 3 dk)</option>
                <option value="5">Kayısı (Orta - 5-6 dk)</option>
                <option value="8">Tam Pişmiş (8 dk)</option>
                <option value="12">Katı (12 dk)</option>
            </select>
        </div>

        <div class="hc-result" id="hc-egg-boil-result">
            <div id="hc-eb-res-list">
                <!-- JS populated -->
            </div>
            <div class="hc-result-note">
                <strong>Önemli:</strong> Süreler su kaynamaya başladıktan sonra tutulmalıdır. Yumurtaları oda sıcaklığında kullanmak çatlamayı önler.
            </div>
        </div>
    </div>
    <?php
}
