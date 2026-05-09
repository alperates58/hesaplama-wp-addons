<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_hedefe_ulasma_yuzdesi( $atts ) {
    wp_enqueue_script(
        'hc-hedefe-ulasma-yuzdesi',
        HC_PLUGIN_URL . 'modules/hedefe-ulasma-yuzdesi/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-hedefe-ulasma-yuzdesi-css',
        HC_PLUGIN_URL . 'modules/hedefe-ulasma-yuzdesi/calculator.css',
        [], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-hedefe-ulasma-yuzdesi">
        <div class="hc-header">
            <h3>Hedefe Ulaşma Yüzdesi</h3>
            <p>Hedefinizi ve gerçekleşen değeri girerek başarı oranınızı ölçün.</p>
        </div>
        
        <div class="hc-form-grid">
            <div class="hc-form-group">
                <label>Hedeflenen Değer</label>
                <input type="number" id="hc-target-val" placeholder="Örn: 1000" step="any">
            </div>
            <div class="hc-form-group">
                <label>Gerçekleşen Değer</label>
                <input type="number" id="hc-actual-val" placeholder="Örn: 750" step="any">
            </div>
        </div>

        <button class="hc-btn" onclick="hcHedefHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-target-result">
            <div class="hc-res-title">BAŞARI ORANI</div>
            <div class="hc-res-main">
                <span id="hc-res-target-perc">0</span>%
            </div>
            <div class="hc-progress-container">
                <div class="hc-progress-bar" id="hc-target-progress"></div>
            </div>
            <div class="hc-res-status" id="hc-target-status"></div>
        </div>
    </div>
    <?php
}
