<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_burc_derecesi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-burc-derece',
        HC_PLUGIN_URL . 'modules/burc-derecesi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-burc-derece-css',
        HC_PLUGIN_URL . 'modules/burc-derecesi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-burc-derece">
        <div class="hc-header">
            <h3>Burç Derecesi Hesaplama</h3>
            <p>Zodyak'ta her burç 30 derecedir. Güneşinizin tam derecesi, karakterinizin tonunu ve Sabit Yıldızlarla olan etkileşiminizi belirler.</p>
        </div>
        
        <div class="hc-form-group">
            <label for="hc-bder-birthdate">Doğum Tarihiniz</label>
            <input type="date" id="hc-bder-birthdate" class="hc-input" required>
        </div>

        <button class="hc-btn" onclick="hcBurcDereceHesapla()">Derecemi Hesapla</button>

        <div class="hc-result" id="hc-bder-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Güneş Dereceniz:</span>
                <span class="hc-result-value" id="hc-bder-value">-</span>
            </div>
            <div class="hc-result-content" id="hc-bder-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
