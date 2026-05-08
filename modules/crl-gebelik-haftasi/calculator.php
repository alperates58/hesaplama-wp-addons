<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_crl_gebelik_haftasi( $atts ) {
    wp_enqueue_script(
        'hc-crl-ga',
        HC_PLUGIN_URL . 'modules/crl-gebelik-haftasi/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-crl-box">
        <h3>CRL'den Gebelik Haftası Hesaplama</h3>
        
        <div class="hc-form-group">
            <label for="hc-crl-mm">CRL Ölçüsü (mm)</label>
            <input type="number" id="hc-crl-mm" step="0.1" placeholder="Örn: 25">
        </div>

        <button class="hc-btn" onclick="hcCRLHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-crl-ga-result">
            <div class="hc-result-item">
                <span>Tahmini Gebelik Süresi:</span>
                <div class="hc-result-value" id="hc-crl-value">-</div>
            </div>
            <p style="font-size: 0.85em; color: #666; margin-top: 15px;">
                *CRL (Crown-Rump Length), hamileliğin ilk 12 haftasında en güvenilir hafta belirleme yöntemidir.
            </p>
        </div>
    </div>
    <?php
}
