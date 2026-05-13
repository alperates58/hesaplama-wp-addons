<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_biquintile_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-biquintile',
        HC_PLUGIN_URL . 'modules/biquintile-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-biquintile-css',
        HC_PLUGIN_URL . 'modules/biquintile-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-biquintile">
        <div class="hc-header">
            <h3>Biquintile (144°) Açı Analizi</h3>
            <p>Ustalık gerektiren gizli yeteneklerinizi ve özgün başarı potansiyelinizi keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-bq-p1">1. Gezegen</label>
                <select id="hc-bq-p1" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-bq-p2">2. Gezegen</label>
                <select id="hc-bq-p2" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcBiquintileHesapla()">Ustalık Analizini Yap</button>

        <div class="hc-result" id="hc-bq-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Ustalık Alanı:</span>
                <span class="hc-result-value" id="hc-bq-value">Teknik Deha</span>
            </div>
            <div class="hc-result-content" id="hc-bq-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
