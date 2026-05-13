<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_semi_sextile_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-semi-sextile',
        HC_PLUGIN_URL . 'modules/semi-sextile-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-semi-sextile-css',
        HC_PLUGIN_URL . 'modules/semi-sextile-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-semi-sextile">
        <div class="hc-header">
            <h3>Semi-Sextile (30°) Açı Analizi</h3>
            <p>Birbirine komşu burçların yarattığı ince uyumu ve gelişim basamaklarını keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-ss-p1">1. Gezegen</label>
                <select id="hc-ss-p1" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-ss-p2">2. Gezegen</label>
                <select id="hc-ss-p2" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcSemiSextileHesapla()">Açıyı Analiz Et</button>

        <div class="hc-result" id="hc-ss-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Açı Teması:</span>
                <span class="hc-result-value" id="hc-ss-value">Gelişim ve Destek</span>
            </div>
            <div class="hc-result-content" id="hc-ss-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
