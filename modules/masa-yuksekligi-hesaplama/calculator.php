<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_masa_yuksekligi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-desk-height',
        HC_PLUGIN_URL . 'modules/masa-yuksekligi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-desk-height-css',
        HC_PLUGIN_URL . 'modules/masa-yuksekligi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-desk-height">
        <h3>Ergonomik Masa Yüksekliği</h3>
        <div class="hc-form-group">
            <label for="hc-user-h">Boyunuz (cm)</label>
            <input type="number" id="hc-user-h" placeholder="Örn: 175" min="100">
        </div>
        <button class="hc-btn" onclick="hcDeskHeightHesapla()">İdeal Ölçüleri Gör</button>
        <div class="hc-result" id="hc-desk-height-result">
            <div class="hc-result-item">
                <span>İdeal Masa Yüksekliği:</span>
                <span class="hc-result-value" id="hc-res-desk-h">0 cm</span>
            </div>
            <div class="hc-result-item">
                <span>İdeal Sandalye Yüksekliği:</span>
                <span id="hc-res-chair-h">0 cm</span>
            </div>
            <p class="hc-desk-info">Not: Otururken dirseklerinizin 90 derece açıda olması ve ayaklarınızın yere tam basması esastır.</p>
        </div>
    </div>
    <?php
}
