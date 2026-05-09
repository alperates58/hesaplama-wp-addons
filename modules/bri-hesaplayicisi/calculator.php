<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_bri_hesaplayicisi( $atts ) {
    wp_enqueue_script(
        'hc-bri-hesaplayicisi',
        HC_PLUGIN_URL . 'modules/bri-hesaplayicisi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-bri-hesaplayicisi-css',
        HC_PLUGIN_URL . 'modules/bri-hesaplayicisi/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-bri-hesaplayicisi">
        <div class="hc-header">
            <h3>BRI (Vücut Yuvarlaklık İndeksi)</h3>
            <p>Vücut kompozisyonunuzun yuvarlaklık derecesini ve risk seviyesini ölçün.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Boy (cm)</label>
                <input type="number" id="hc-bri-boy" placeholder="175">
            </div>
            <div class="hc-form-group">
                <label>Bel Çevresi (cm)</label>
                <input type="number" id="hc-bri-bel" placeholder="90">
            </div>
        </div>

        <button class="hc-btn" onclick="hcBriHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-bri-result">
            <div class="hc-res-gauge">
                <div class="hc-res-label">BRI SKORU</div>
                <div class="hc-res-main" id="hc-res-bri-val">0</div>
            </div>
            <div class="hc-res-info" id="hc-res-bri-info"></div>
        </div>
    </div>
    <?php
}
