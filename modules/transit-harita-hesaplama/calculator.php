<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_transit_harita_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-trans-calc',
        HC_PLUGIN_URL . 'modules/transit-harita-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-trans-calc-css',
        HC_PLUGIN_URL . 'modules/transit-harita-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-transit-harita-hesaplama">
        <div class="hc-header">
            <h3>Transit Harita ve Güncel Gezegen Etkileri Hesaplama</h3>
            <p class="hc-subtitle">Doğum haritanız ile gökyüzündeki güncel transit gezegenlerin temaslarını, dönüm noktası açılarını ve tetiklenen yaşam temalarını analiz edin.</p>
        </div>

        <div class="hc-form-grid-2">
            <div class="hc-form-group">
                <label for="hc-trans-birth">Doğum Tarihiniz *</label>
                <input type="date" id="hc-trans-birth" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-trans-target">Transit Tarihi (Hedef Gün) *</label>
                <input type="date" id="hc-trans-target" value="<?php echo date('Y-m-d'); ?>" class="hc-input" required>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcTransitHesapla()">⚡ Transitleri ve Aktif Açıları Hesapla</button>

        <div class="hc-result" id="hc-trans-result">
            <div class="hc-trans-highlight-card" id="hc-trans-highlights"></div>

            <div class="hc-trans-section">
                <h4 class="hc-trans-sec-title">🪐 Natal vs Transit Gezegen Konumları</h4>
                <div id="hc-trans-table" class="hc-table-container"></div>
            </div>

            <div class="hc-trans-section">
                <h4 class="hc-trans-sec-title">🎯 Aktif Majör Transit Açıları ve Etkileri</h4>
                <div id="hc-trans-aspects-list"></div>
            </div>
        </div>
    </div>
    <?php
}
