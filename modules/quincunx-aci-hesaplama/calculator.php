<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_quincunx_aci_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-quincunx',
        HC_PLUGIN_URL . 'modules/quincunx-aci-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-quincunx-css',
        HC_PLUGIN_URL . 'modules/quincunx-aci-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-quincunx">
        <div class="hc-header">
            <h3>Quincunx (150°) Açı Analizi</h3>
            <p>Birbiriyle konuşamayan iki gezegenin yarattığı 'ayarsızlık' hissini ve çözüm yollarını keşfedin.</p>
        </div>
        
        <div class="hc-form-row">
            <div class="hc-form-group">
                <label for="hc-q-p1">1. Gezegen</label>
                <select id="hc-q-p1" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
            <div class="hc-form-group">
                <label for="hc-q-p2">2. Gezegen</label>
                <select id="hc-q-p2" class="hc-input">
                    <option value="gunes">Güneş</option><option value="ay">Ay</option>
                    <option value="merkur">Merkür</option><option value="venus">Venüs</option>
                    <option value="mars">Mars</option><option value="jupiter">Jüpiter</option>
                    <option value="saturn">Satürn</option>
                </select>
            </div>
        </div>

        <button class="hc-btn" onclick="hcQuincunxHesapla()">Açıyı Analiz Et</button>

        <div class="hc-result" id="hc-q-result">
            <div class="hc-result-header">
                <span class="hc-result-label">Açı Teması:</span>
                <span class="hc-result-value" id="hc-q-value">Ayarlama ve Esneklik</span>
            </div>
            <div class="hc-result-content" id="hc-q-desc">
                <!-- Detaylı yorum buraya gelecek -->
            </div>
        </div>
    </div>
    <?php
}
