<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_merdiven_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-merdiven',
        HC_PLUGIN_URL . 'modules/merdiven-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    ?>
    <div class="hc-calculator" id="hc-merdiven">
        <h3>Merdiven Tasarım Hesaplama</h3>
        <p class="hc-desc">Toplam yükseklik ve basamak sayısına göre ölçüleri belirleyin.</p>
        
        <div class="hc-form-group">
            <label for="hc-st-height">Toplam Kat Yüksekliği (cm)</label>
            <input type="number" id="hc-st-height" placeholder="cm" step="any">
        </div>

        <div class="hc-form-group">
            <label for="hc-st-steps">Hedef Basamak Sayısı</label>
            <input type="number" id="hc-st-steps" placeholder="Örn: 16" step="1">
        </div>

        <button class="hc-btn" onclick="hcMerdivenHesapla()">Hesapla</button>

        <div class="hc-result" id="hc-st-result">
            <div class="hc-result-grid">
                <div class="hc-result-card">
                    <span class="hc-result-label">Rıht Yüksekliği (h)</span>
                    <span class="hc-result-value" id="hc-st-res-riser">--</span>
                    <span class="hc-result-unit">cm</span>
                </div>
                <div class="hc-result-card">
                    <span class="hc-result-label">Basamak Genişliği (b)</span>
                    <span class="hc-result-value" id="hc-st-res-tread">--</span>
                    <span class="hc-result-unit">cm</span>
                </div>
            </div>
            <p id="hc-st-blondel" style="text-align:center; font-size:0.9rem; margin-top:15px;"></p>
        </div>
    </div>
    <?php
}
