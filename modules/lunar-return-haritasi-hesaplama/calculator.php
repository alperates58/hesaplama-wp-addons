<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_lunar_return_haritasi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-lunar-return',
        HC_PLUGIN_URL . 'modules/lunar-return-haritasi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-lunar-return-css',
        HC_PLUGIN_URL . 'modules/lunar-return-haritasi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-lunar-return">
        <div class="hc-header">
            <h3>Lunar Return (Ay Dönüşü 28 Günlük Harita) Hesaplama</h3>
            <p class="hc-subtitle">Ayınızın doğum anındaki konumuna döndüğü anı hesaplayarak önünüzdeki 28 günlük dönemin duygusal atmosferini, içsel ihtiyaçlarını ve odak alanlarını keşfedin.</p>
        </div>

        <div class="hc-form-grid-2">
            <div class="hc-form-group">
                <label for="hc-lr-birth">Doğum Tarihiniz *</label>
                <input type="date" id="hc-lr-birth" value="1995-05-15" class="hc-input" required>
            </div>
            <div class="hc-form-group">
                <label for="hc-lr-month">Hedef Ay ve Yıl *</label>
                <input type="month" id="hc-lr-month" class="hc-input" value="<?php echo date('Y-m'); ?>" required>
            </div>
        </div>

        <button type="button" class="hc-btn" onclick="hcLunarReturnHesapla()">🌙 28 Günlük Ay Dönüşü Haritasını Hesapla</button>

        <div class="hc-result" id="hc-lunar-return-result">
            <div class="hc-lr-hero" id="hc-lr-hero"></div>

            <div class="hc-lr-section">
                <h4 class="hc-lr-sec-title">🪐 Lunar Return Anındaki Gezegen Konumları</h4>
                <div id="hc-lr-table-container"></div>
            </div>

            <div class="hc-lr-section">
                <h4 class="hc-lr-sec-title">🌊 28 Günlük Duygusal İklim ve Rehberlik</h4>
                <div id="hc-lr-details" class="hc-lr-details"></div>
            </div>
        </div>
    </div>
    <?php
}
