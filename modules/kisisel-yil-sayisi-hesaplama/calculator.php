<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function hc_render_kisisel_yil_sayisi_hesaplama( $atts ) {
    wp_enqueue_script(
        'hc-kisisel-yil-sayisi-hesaplama',
        HC_PLUGIN_URL . 'modules/kisisel-yil-sayisi-hesaplama/calculator.js',
        [], HC_VERSION, true
    );
    wp_enqueue_style(
        'hc-kisisel-yil-sayisi-hesaplama-css',
        HC_PLUGIN_URL . 'modules/kisisel-yil-sayisi-hesaplama/calculator.css',
        [ 'hesaplama-suite' ], HC_VERSION
    );
    ?>
    <div class="hc-calculator" id="hc-personal-year">
        <h3>Kişisel Yıl Sayısı Hesaplama</h3>
        <div class="hc-form-row" style="display:flex; gap:10px; margin-bottom:15px;">
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-py-birth">Doğum Tarihi:</label>
                <input type="date" id="hc-py-birth" class="hc-input" value="1990-01-01">
            </div>
            <div class="hc-form-group" style="flex:1;">
                <label for="hc-py-year">Hesaplanacak Yıl:</label>
                <input type="number" id="hc-py-year" class="hc-input" value="<?php echo date('Y'); ?>">
            </div>
        </div>
        <button class="hc-btn" onclick="hcKisiselYilHesapla()">Kişisel Yılı Hesapla</button>
        <div class="hc-result" id="hc-personal-year-result">
            <div class="hc-py-val" id="hc-py-val">-</div>
            <div id="hc-py-desc" class="hc-py-desc"></div>
        </div>
    </div>
    <?php
}
