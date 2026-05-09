<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_fundus_yuksekligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-fundal-height',
        HC_PLUGIN_URL . 'modules/fundus-yuksekligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-fundus-box">
        <h3>Fundus Yüksekliği Değerlendirme</h3>
        
        <div class="hc-form-group">
            <label for="hc-fh-cm">Fundus Yüksekliği (cm)</label>
            <input type="number" id="hc-fh-cm" placeholder="cm">
        </div>

        <div class="hc-form-group">
            <label for="hc-fh-week">Mevcut Gebelik Haftası</label>
            <input type="number" id="hc-fh-week" placeholder="Hafta">
        </div>

        <button class="hc-btn" onclick="hcFundusHesapla()">Değerlendir</button>

        <div class="hc-result" id="hc-fundus-result">
            <div id="hc-fh-status" style="padding: 15px; border-radius: 8px; text-align: center; font-weight: bold;">
                <!-- Durum -->
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *20. haftadan sonra fundus yüksekliği genellikle gebelik haftasıyla (cm cinsinden) paralellik gösterir (örn: 24 cm = 24. hafta).
            </p>
        </div>
    </div>
    <?php
}
