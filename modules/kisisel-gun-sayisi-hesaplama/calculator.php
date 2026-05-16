<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisisel_gun_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kisisel-gun-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kisisel-gun-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kisisel-gun-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kisisel-gun-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-personal-day">
        <h3>Kişisel Gün Sayısı Hesaplama</h3>
        <div class="hc-form-row" style="display:flex; gap:10px; margin-bottom:15px;">
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-pd-birth">Doğum Tarihi:</label>
                <input type="date" id="hc-pd-birth" class="hc-input" value="1990-01-01">
            </div>
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-pd-target">Hesaplanacak Gün:</label>
                <input type="date" id="hc-pd-target" class="hc-input" value="<?php echo date('Y-m-d'); ?>">
            </div>
        </div>
        <button class="hc-btn" onclick="hcKisiselGunHesapla()">Kişisel Günü Hesapla</button>
        <div class="hc-result" id="hc-personal-day-result">
            <div class="hc-pd-val" id="hc-pd-val">-</div>
            <div id="hc-pd-desc" class="hc-pd-desc"></div>
        </div>
    </div>
    <?php
}
