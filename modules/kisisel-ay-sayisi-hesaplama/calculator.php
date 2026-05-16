<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisisel_ay_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kisisel-ay-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kisisel-ay-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kisisel-ay-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kisisel-ay-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-personal-month">
        <h3>Kişisel Ay Sayısı Hesaplama</h3>
        <div class="hc-form-row" style="display:flex; gap:10px; margin-bottom:15px;">
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-pm-birth">Doğum Tarihi:</label>
                <input type="date" id="hc-pm-birth" class="hc-input" value="1990-01-01">
            </div>
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-pm-target">Hesaplanacak Ay/Yıl:</label>
                <input type="month" id="hc-pm-target" class="hc-input" value="<?php echo date('Y-m'); ?>">
            </div>
        </div>
        <button class="hc-btn" onclick="hcKisiselAyHesapla()">Kişisel Ayı Hesapla</button>
        <div class="hc-result" id="hc-personal-month-result">
            <div class="hc-pm-val" id="hc-pm-val">-</div>
            <div id="hc-pm-desc" class="hc-pm-desc"></div>
        </div>
    </div>
    <?php
}
