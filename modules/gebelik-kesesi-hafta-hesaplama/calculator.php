<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_gebelik_kesesi_hafta_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-gsd-ga',
        HC_PLUGIN_URL . 'modules/gebelik-kesesi-hafta-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-gsd-box">
        <h3>Gebelik Kesesi (MSD) - Hafta Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-gs-mm">Kese Ölçüsü (MSD - mm)</label>
            <input type="number" id="hc-gs-mm" step="0.1" placeholder="Örn: 10">
        </div>

        <button class="hc-btn" onclick="hcGSDHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-gsd-ga-result">
            <div class="hc-result-item">
                <span>Tahmini Gebelik Süresi:</span>
                <div class="hc-result-value" id="hc-gs-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *MSD (Mean Sac Diameter), embriyo henüz görünür olmadan önceki aşamada haftayı belirlemek için kullanılır.
            </p>
        </div>
    </div>
    <?php
}
