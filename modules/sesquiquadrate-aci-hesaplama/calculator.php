<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_sesquiquadrate_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-sesquiquadrate',
        HC_PLUGIN_URL . 'modules/sesquiquadrate-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-sesquiquadrate-css',
        HC_PLUGIN_URL . 'modules/sesquiquadrate-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-sesquiquadrate">
        <div class="hc-header">
            <h3>Sesquiquadrate (135°) Açı Analizi</h3>
            <p>Dış dünyadan gelen ve sabrınızı sınayan engellerin kadersel nedenlerini keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-ssq-p1">1. Gezegen</label>
                <select id="hc-ssq-p1" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-ssq-p2">2. Gezegen</label>
                <select id="hc-ssq-p2" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcSesquiquadrateHesapla()">Açıyı Analiz Et</button>

        <div class="hc-result" id="hc-ssq-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Açı Teması:</span>
                <span class="hc-result-value" id="hc-ssq-value">Dışsal Direnç</span>
            </div>
            <div class="hc-result-content" id="hc-ssq-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
