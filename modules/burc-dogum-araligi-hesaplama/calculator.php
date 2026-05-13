<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_dogum_araligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-dogum-aralik',
        HC_PLUGIN_URL . 'modules/burc-dogum-araligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-dogum-aralik-css',
        HC_PLUGIN_URL . 'modules/burc-dogum-araligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-dogum-aralik">
        <div class="hc-header">
            <h3>Burç Doğum Aralığı Hesaplama</h3>
            <p>Doğum tarihinizin hangi burç aralığına girdiğini ve sınırda doğanların özelliklerini keşfedin.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-bda-birthdate">Doğum Tarihiniz</label>
            <input type="date" id="hc-bda-birthdate" class="hc-input" required>
        </div>

        <button class="hc-btn" onclick="hcBurcDogumAralikHesapla()">Aralığımı Hesapla</button>

        <div class="hc-result" id="hc-bda-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Doğum Aralığınız:</span>
                <span class="hc-result-value" id="hc-bda-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-bda-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
